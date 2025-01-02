<?php

namespace App\Http\Controllers;

use App\Models\PostinganRelation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PostinganUserLike;
use Illuminate\Support\Facades\Storage;

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
    // public function update(Request $request, $id)
    // {
    //     $postingan = PostinganRelation::find($id);

    //     if (!$postingan) {
    //         return response()->json(['message' => 'Postingan tidak ditemukan'], 404);
    //     }

    //     try {
    //         $validatedData = $request->validate([
    //             'kontenPostingan' => 'nullable|string',
    //             'likes' => 'nullable|integer',
    //             'comments' => 'nullable|integer',
    //             'image' => 'nullable|string|max:2048',
    //             'username' => 'nullable|string|max:2048',
    //         ]);

    //         // if ($request->hasFile('image') && $request->file('image')->isValid()) {
    //         //     $path = $request->file('image')->store('post-images', 'public');

    //         //     if ($postingan->image) {
    //         //         \Storage::disk('public')->delete($postingan->image);
    //         //     }

    //         //     $validatedData['image'] = $path;
    //         // }

    //         $postingan->update($validatedData);

    //         return response()->json([
    //             'message' => 'Postingan berhasil diperbarui',
    //             'data' => $postingan->refresh(),
    //         ]);
    //     } catch (\Illuminate\Validation\ValidationException $e) {
    //         return response()->json(['errors' => $e->errors()], 422);
    //     }
    // }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'kontenPostingan' => 'required|string|max:1000',
        ]);

        try {
            // Cari postingan berdasarkan ID
            $postingan = PostinganRelation::findOrFail($id);

            // Update konten postingan
            $postingan->kontenPostingan = $validatedData['kontenPostingan'];
            $postingan->save();

            // Response sukses
            return response()->json([
                'message' => 'Postingan berhasil diperbarui.',
                'data' => $postingan
            ], 200);
        } catch (\Exception $e) {
            // Response jika terjadi error
            return response()->json([
                'message' => 'Terjadi kesalahan saat memperbarui postingan.',
                'error' => $e->getMessage()
            ], 500);
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
        // Cari postingan berdasarkan ID
        $postingan = PostinganRelation::find($id);

        // Jika postingan tidak ditemukan, kembalikan respons 404
        if (!$postingan) {
            return response()->json(['message' => 'Postingan tidak ditemukan'], 404);
        }

        // Hapus gambar jika ada
        if ($postingan->image) {
            Storage::delete('public/' . $postingan->image);
        }

        // Hapus postingan dari database
        $postingan->delete();

        // Kembalikan respons sukses
        return response()->json(['message' => 'Postingan berhasil dihapus'], 200);
    }

    /**
     * Menambah jumlah likes pada postingan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function likePost($id)
    {
        $postingan = PostinganRelation::find($id);

        if (!$postingan) {
            return response()->json(['message' => 'Postingan tidak ditemukan'], 404);
        }

        $postingan->increment('likes'); // Menambah jumlah likes +1
        $postingan->save();

        return response()->json([
            'message' => 'Post liked successfully',
            'likes' => $postingan->likes,
        ]);
    }

    /**
     * Fungsi untuk toggle like/unlike pada postingan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function toggleLike(Request $request, $id)
    {
        // Validasi input dari frontend
        $request->validate([
            'userId' => 'required|integer', // Pastikan userId adalah angka
        ]);

        $userId = $request->input('userId'); // Ambil userId dari request

        // Cek apakah user sudah memberikan like pada postingan ini
        $like = PostinganUserLike::where('ttl_id', $userId)
            ->where('postingan_id', $id)
            ->first();

        // Cari postingan terkait
        $postingan = PostinganRelation::findOrFail($id);

        if ($like) {
            // Jika sudah di-like, maka hapus (unlike)
            $like->delete();

            // Kurangi jumlah likes di tabel postingan_relations
            $postingan->decrement('likes');

            return response()->json([
                'status' => 'unliked',
                'message' => 'Unlike successful',
                'likes' => $postingan->likes // Kirim jumlah likes terbaru
            ]);
        }

        // Jika belum di-like, tambahkan like
        PostinganUserLike::create([
            'ttl_id' => $userId,
            'postingan_id' => $id,
        ]);

        // Tambah jumlah likes di tabel postingan_relations
        $postingan->increment('likes');

        return response()->json([
            'status' => 'liked',
            'message' => 'Like successful',
            'likes' => $postingan->likes // Kirim jumlah likes terbaru
        ]);
    }
}
