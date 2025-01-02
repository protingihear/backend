<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user1_id',
        'user2_id',
    ];

    // Relasi: Chat memiliki dua pengguna (user1 dan user2)
    public function user1()
    {
        return $this->belongsTo(User::class, 'user1_id');
    }

    public function user2()
    {
        return $this->belongsTo(User::class, 'user2_id');
    }

    // Relasi: Chat memiliki banyak pesan
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
