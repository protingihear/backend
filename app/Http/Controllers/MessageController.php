<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\MessageStatus;
use App\Models\Chat;

class MessageController extends Controller
{
    public function index(Request $request)
{
    $chatId = $request->query('chat_id');

    if (!$chatId) {
        return response()->json([
            'error' => 'chat_id parameter is required'
        ], 400);
    }

    // Mengambil pesan berdasarkan chat_id
    return Message::where('chat_id', $chatId)->get();
}

    public function store(Request $request)
    {
        $data = $request->validate([
            'chat_id' => 'required|exists:chats,id',
            'sender_id' => 'required|exists:teman_tuli,idTemanTuli',
            'content' => 'required|string',
            'message_type' => 'in:text,image,video,file',
        ]);

        $message = Message::create($data);

        // Automatically create a status for each user in the chat
        $chat = Chat::findOrFail($data['chat_id']);
        foreach ([$chat->user1_id, $chat->user2_id] as $userId) {
            if ($userId != $data['sender_id']) {
                MessageStatus::create([
                    'message_id' => $message->id,
                    'user_id' => $userId,
                    'status' => 'sent'
                ]);
            }
        }

        return $message;
    }
}
