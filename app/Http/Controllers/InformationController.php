<?php

namespace App\Http\Controllers;

use App\Models\information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
      public function index()
    {
        $information = Information::all();
        return response()->json($information);
    }

    //2. nanti nambahhin di sini buat imagenya
    public function store(Request $request)
    {
        // dd($request);

        $validated = $request->validate([
            'source' => 'nullable|string',
            'upload_date' => 'nullable|date',
            'upload_time' => 'nullable|date_format:H:i:s',
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        
        
        // Jika ada file gambar, simpan ke direktori dan ambil nama file
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            
            $validated['image'] = $imagePath;
        }

        // Simpan data ke database
        $information = Information::create($validated);

        return response()->json($information, 201);
    }

    public function show($id)
    {
        $information = Information::findOrFail($id);
        return response()->json($information);
    }

    public function update(Request $request, $id)
    {
        $information = Information::findOrFail($id);
        $validated = $request->validate([
            'source' => 'nullable|string',
            'upload_date' => 'nullable|date',
            'upload_time' => 'nullable|date_format:H:i:s',
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|file|image|mimes:jpeg,png,jpg|max:10240', // Validasi gambar
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }

        // Update data
        $information->update($validated);

        return response()->json($information);
    }

    public function destroy($id)
    {
        $information = Information::findOrFail($id);
        $information->delete();

        return response()->json(['message' => 'Information deleted successfully']);
    } 
}
