<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemanTuli extends Model
{
    use HasFactory;

    protected $table = 'teman_tuli';
    protected $primaryKey = 'idTemanTuli';
    protected $fillable = ['email', 'firstName', 'lastName', 'username', 'password', 'bio', 'picture', 'gender'];

    public function likedPosts()
    {
        return $this->belongsToMany(PostinganRelation::class, 'postingan_user_likes', 'ttl_id', 'postingan_id');
    }

    // Relasi: User memiliki banyak chat sebagai user1 atau user2
    public function chats()
    {
        return $this->hasMany(Chat::class, 'user1_id')
            ->orWhere('user2_id', $this->id);
    }

    // Relasi: User memiliki banyak pesan
    public function messages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }
}
