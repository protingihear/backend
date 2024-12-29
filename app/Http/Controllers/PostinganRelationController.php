<?php

namespace App\Http\Controllers;

use App\Models\PostinganRelation;
use Illuminate\Http\Request;

class PostinganRelationController extends Controller
{
    /**
     * Menampilkan semua postingan.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(PostinganRelation::all());
    }

    /**
     * Menyimpan postingan baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'kontenPostingan' => 'required|string',
                'likes' => 'nullable|integer',
                'comments' => 'nullable|integer',
                'image' => 'nullable|image|max:2048', // Validasi file gambar
                'username' => 'required|string|max:2048',
            ]);

            // Upload gambar jika ada
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $path = $request->file('image')->store('post-images', 'public'); // Simpan di folder "post-images" dalam storage/public
                $validatedData['image'] = $path;
            }

            $postingan = PostinganRelation::create($validatedData);

            return response()->json([
                'message' => 'Postingan berhasil dibuat',
                'data' => $postingan,
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }


    /**
     * Menampilkan detail postingan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $postingan = PostinganRelation::find($id);

        if (!$postingan) {
            return response()->json(['message' => 'Postingan tidak ditemukan'], 404);
        }

        return response()->json($postingan);
    }

    /**
     * Mengupdate postingan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $postingan = PostinganRelation::find($id);

        if (!$postingan) {
            return response()->json(['message' => 'Postingan tidak ditemukan'], 404);
        }

        try {
            $validatedData = $request->validate([
                'kontenPostingan' => 'nullable|string',
                'likes' => 'nullable|integer',
                'comments' => 'nullable|integer',
                'image' => 'nullable|string|max:2048',
                'username' => 'nullable|string|max:2048',
            ]);

            // if ($request->hasFile('image') && $request->file('image')->isValid()) {
            //     $path = $request->file('image')->store('post-images', 'public');

            //     if ($postingan->image) {
            //         \Storage::disk('public')->delete($postingan->image);
            //     }

            //     $validatedData['image'] = $path;
            // }

            $postingan->update($validatedData);

            return response()->json([
                'message' => 'Postingan berhasil diperbarui',
                'data' => $postingan->refresh(),
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    /**
     * Menghapus postingan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $postingan = PostinganRelation::find($id);

        if (!$postingan) {
            return response()->json(['message' => 'Postingan tidak ditemukan'], 404);
        }

        $postingan->delete();

        return response()->json(['message' => 'Postingan berhasil dihapus']);
    }
}
