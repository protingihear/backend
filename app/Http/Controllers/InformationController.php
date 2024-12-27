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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'source' => 'nullable|string',
            'upload_date' => 'nullable|date',
            'upload_time' => 'nullable|date_format:H:i:s',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

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
        ]);

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
