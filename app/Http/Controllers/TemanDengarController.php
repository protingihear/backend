<?php

namespace App\Http\Controllers;

use App\Models\TemanDengar;
use Illuminate\Http\Request;

class TemanDengarController extends Controller
{
    public function index()
    {
        return TemanDengar::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:teman_dengar,email',
            'firstName' => 'required|string|max:256',
            'lastName' => 'required|string|max:256',
            'username' => 'required|string|max:255|unique:teman_dengar,username',
            'password' => 'required|string|min:8',
             'picture' => 'nullable|image|max:2048',
        ]);
        return TemanDengar::create($request->all());
    }

    public function show($id)
    {
        return TemanDengar::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $temanDengar = TemanDengar::findOrFail($id);
        $temanDengar->update($request->all());
        return $temanDengar;
    }

    public function destroy($id)
    {
        TemanDengar::destroy($id);
        return response()->json(['message' => 'TemanDengar deleted successfully']);
    }
}
