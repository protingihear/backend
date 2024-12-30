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
}
