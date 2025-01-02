<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'message_id',
        'user_id',
        'status',
    ];

    // Relasi: Status milik satu pesan
    public function message()
    {
        return $this->belongsTo(Message::class);
    }

    // Relasi: Status terkait dengan satu pengguna
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
