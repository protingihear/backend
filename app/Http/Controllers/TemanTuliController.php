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
            // Log the incoming request data
            \Log::info('Incoming Request Data:', $request->all());
            $validatedData = $request->validate([
                'email' => 'required|email|unique:teman_tuli,email',
                'firstName' => 'required|string|max:256',
                'lastName' => 'required|string|max:256',
                'username' => 'required|string|max:255|unique:teman_tuli,username',
                'password' => 'required|string|min:8',
                'picture' => 'nullable|image|max:2048',
                'gender' => 'required|in:P,L',
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


     // Fetch Profile (Show)
     public function show($id)
     {
         $temanTuli = TemanTuli::findOrFail($id);
 
         return response()->json([
             'id' => $temanTuli->idTemanTuli,
             'firstName' => $temanTuli->firstName,
             'lastName' => $temanTuli->lastName,
             'email' => $temanTuli->email,
             'bio' => $temanTuli->bio,
             'gender' => $temanTuli->gender,
             'picture' => $temanTuli->picture ? asset('storage/' . $temanTuli->picture) : null,
             'password' => $temanTuli->password
         ]);
     }

    // Update Profile
    public function update(Request $request, $id)
    {
        \Log::info('Incoming Request Data:', $request->all());

        $temanTuli = TemanTuli::find($id);

        if (!$temanTuli) {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }

        try {
            $validatedData = $request->validate([
                'email' => 'nullable|email|unique:teman_tuli,email,' . $id . ',idTemanTuli',
                'firstName' => 'nullable|string|max:256',
                'lastName' => 'nullable|string|max:256',
                'username' => 'nullable|string|max:255|unique:teman_tuli,username,' . $id . ',idTemanTuli',
                'password' => 'nullable|string|min:8',
                'picture' => 'nullable|image|max:2048',
                'bio' => 'nullable|string|max:1024',
                'gender' => 'nullable|in:L,P',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error($e->errors());
            return response()->json(['errors' => $e->errors()], 422);
        }

        if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
            $path = $request->file('picture')->store('profile-pictures', 'public');

            if ($temanTuli->picture) {
                \Storage::disk('public')->delete($temanTuli->picture);
            }

            $validatedData['picture'] = $path;
        }

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        try {
            $temanTuli->fill($validatedData);
            $temanTuli->save();

            return response()->json([
                'message' => 'Profile updated successfully',
                'data' => $temanTuli->refresh(),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update profile',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    

    public function destroy($id)
    {
        TemanTuli::destroy($id);
        return response()->json(['message' => 'TemanTuli deleted successfully']);
    }

    // Authentication (Login)
    public function authenticate(Request $request)
    {
        $email = $request->query('email');
        $password = $request->query('password');

        $user = TemanTuli::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            return response()->json([
                'message' => 'Login berhasil!',
                'user' => [
                    'id' => $user->idTemanTuli,
                    'firstName' => $user->firstName,
                    'lastName' => $user->lastName,
                ]
            ], 200);
        }

        return response()->json([
            'message' => 'Email atau password salah.',
        ], 401);
    }

    
}
