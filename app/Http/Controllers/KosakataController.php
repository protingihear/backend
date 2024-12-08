<?php

namespace App\Http\Controllers;

use App\Models\Kosakata;
use Illuminate\Http\Request;

class KosakataController extends Controller
{
    public function index()
    {
        return Kosakata::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'kata' => 'required|string|max:256',
            'artiKata' => 'required|string|max:256',
            'idAhliBahasa' => 'required|exists:ahli_bahasa,idAhliBahasa',
        ]);
        return Kosakata::create($request->all());
    }

    public function show($id)
    {
        return Kosakata::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $kosakata = Kosakata::findOrFail($id);
        $kosakata->update($request->all());
        return $kosakata;
    }

    public function destroy($id)
    {
        Kosakata::destroy($id);
        return response()->json(['message' => 'Kosakata deleted successfully']);
    }
}
