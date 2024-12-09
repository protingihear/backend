<?php

namespace App\Http\Controllers;

use App\Models\TemanTuli;
use Illuminate\Http\Request;

class TemanTuliController extends Controller
{
    public function index()
    {
        return TemanTuli::all();
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'email' => 'required|email|unique:teman_tuli,email',
                'firstName' => 'required|string|max:256',
                'lastName' => 'required|string|max:256',
                'username' => 'required|string|max:255|unique:teman_tuli,username',
                'password' => 'required|string|min:8',
                'gender' => 'required|in:P,L', // Validasi gender hanya menerima 'P' atau 'L'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error($e->errors()); // Log detail error ke file log
            return response()->json(['errors' => $e->errors()], 422);
        }

        // Simpan data ke database tanpa hashing password
        $temanTuli = TemanTuli::create($validatedData);

        return response()->json([
            'message' => 'Data berhasil disimpan',
            'data' => $temanTuli
        ], 201);
    }


    public function show($id)
    {
        return TemanTuli::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $temanTuli = TemanTuli::findOrFail($id);
        $temanTuli->update($request->all());
        return $temanTuli;
    }

    public function destroy($id)
    {
        TemanTuli::destroy($id);
        return response()->json(['message' => 'TemanTuli deleted successfully']);
    }

    public function authenticate(Request $request)
    {
        $email = $request->query('email');
        $password = $request->query('password');

        // Cek data di database
        $user = TemanTuli::where('email', $email)->first();

        if ($user && $user->password === $password) { // Cocokkan password secara langsung (tidak disarankan tanpa hashing)
            return response()->json([
                'message' => 'Login berhasil!',
                'user' => $user,
            ], 200);
        }

        return response()->json([
            'message' => 'Email atau password salah.',
        ], 401);
    }
    
}
