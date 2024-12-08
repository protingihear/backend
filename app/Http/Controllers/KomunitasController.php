<?php

namespace App\Http\Controllers;

use App\Models\Komunitas;
use Illuminate\Http\Request;

class KomunitasController extends Controller
{
    public function index()
    {
        return Komunitas::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaKomunitas' => 'required|string|max:256',
            'idTemanTuli' => 'required|exists:teman_tuli,idTemanTuli',
            'idTemanDengar' => 'required|exists:teman_dengar,idTemanDengar',
        ]);
        return Komunitas::create($request->all());
    }

    public function show($id)
    {
        return Komunitas::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $komunitas = Komunitas::findOrFail($id);
        $komunitas->update($request->all());
        return $komunitas;
    }

    public function destroy($id)
    {
        Komunitas::destroy($id);
        return response()->json(['message' => 'Komunitas deleted successfully']);
    }
}
