<?php

namespace App\Http\Controllers;

use App\Models\AhliBahasa;
use Illuminate\Http\Request;

class AhliBahasaController extends Controller
{
    public function index()
    {
        return AhliBahasa::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:256',
            'lastName' => 'required|string|max:256',
            'username' => 'required|string|max:255|unique:ahli_bahasa,username',
            'password' => 'required|string|min:8',
             'picture' => 'nullable|image|max:2048',
        ]);
        return AhliBahasa::create($request->all());
    }

    public function show($id)
    {
        return AhliBahasa::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $ahliBahasa = AhliBahasa::findOrFail($id);
        $ahliBahasa->update($request->all());
        return $ahliBahasa;
    }

    public function destroy($id)
    {
        AhliBahasa::destroy($id);
        return response()->json(['message' => 'AhliBahasa deleted successfully']);
    }
}
