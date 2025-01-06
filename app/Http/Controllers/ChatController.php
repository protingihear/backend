<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemanTuli;
use App\Models\Chat;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function index()
    {
        return Chat::all();
    }

    public function show($id)
    {
        return Chat::with('messages')->findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user1_id' => 'required|exists:teman_tuli,idTemanTuli',
            'user2_id' => 'required|exists:teman_tuli,idTemanTuli',
        ]);

        $chat = Chat::firstOrCreate($data);

        return $chat;
    }

    public function destroy($id)
    {
        $chat = Chat::findOrFail($id);
        $chat->delete();

        return response(null, 204);
    }
}
