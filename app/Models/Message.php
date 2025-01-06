<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_id',
        'sender_id',
        'content',
        'message_type',
    ];

    // Relasi: Pesan milik satu chat
    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }

    // Relasi: Pesan dikirim oleh satu pengguna
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // Relasi: Pesan memiliki banyak status
    public function messageStatus()
    {
        return $this->hasMany(MessageStatus::class);
    }
}
