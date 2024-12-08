<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function index()
    {
        return Komentar::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'isiKomentar' => 'required|string|max:255',
            'idKomunitas' => 'required|exists:komunitas,idKomunitas',
            'idTemanTuli' => 'required|exists:teman_tuli,idTemanTuli',
            'idTemanDengar' => 'required|exists:teman_dengar,idTemanDengar',
        ]);
        return Komentar::create($request->all());
    }

    public function show($id)
    {
        return Komentar::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $komentar = Komentar::findOrFail($id);
        $komentar->update($request->all());
        return $komentar;
    }

    public function destroy($id)
    {
        Komentar::destroy($id);
        return response()->json(['message' => 'Komentar deleted successfully']);
    }
}
