<?php

namespace App\Http\Controllers;

use App\Models\Transkrip;
use Illuminate\Http\Request;

class TranskripController extends Controller
{
    // Menampilkan semua transkrip
    public function index()
    {
        $transkrips = Transkrip::all();
        return response()->json($transkrips);
    }

    // Menambahkan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nomer' => 'required', // Nomor tidak perlu unik
            'transkrip' => 'required',
        ]);

        $transkrip = Transkrip::create($request->all());
        return response()->json($transkrip, 201);
    }

    // Menampilkan detail transkrip berdasarkan ID
    public function show($id)
    {
        $transkrip = Transkrip::find($id);

        if (!$transkrip) {
            return response()->json(['message' => 'Transkrip tidak ditemukan'], 404);
        }

        return response()->json($transkrip);
    }

    // Mencari transkrip berdasarkan nomor tertentu
    public function searchByNomer($nomer)
    {
        $transkrips = Transkrip::where('nomer', $nomer)->get();

        if ($transkrips->isEmpty()) {
            return response()->json(['message' => 'Transkrip tidak ditemukan'], 404);
        }

        return response()->json($transkrips);
    }

    // Memperbarui data
    public function update(Request $request, $id)
    {
        $transkrip = Transkrip::find($id);

        if (!$transkrip) {
            return response()->json(['message' => 'Transkrip tidak ditemukan'], 404);
        }

        $request->validate([
            'nomer' => 'required',
            'transkrip' => 'required',
        ]);

        $transkrip->update($request->all());
        return response()->json($transkrip);
    }

    // Menghapus data
    public function destroy($id)
    {
        $transkrip = Transkrip::find($id);

        if (!$transkrip) {
            return response()->json(['message' => 'Transkrip tidak ditemukan'], 404);
        }

        $transkrip->delete();
        return response()->json(['message' => 'Transkrip berhasil dihapus']);
    }
}
