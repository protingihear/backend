<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MessageStatus;

class MessageStatusController extends Controller
{
    public function update(Request $request, $messageId, $userId)
    {
        $status = MessageStatus::where('message_id', $messageId)
            ->where('user_id', $userId)
            ->firstOrFail();

        $data = $request->validate([
            'status' => 'required|in:sent,delivered,read',
        ]);

        $status->update($data);

        return $status;
    }
}
