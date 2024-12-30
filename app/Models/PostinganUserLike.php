<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostinganUserLike extends Model
{
    use HasFactory;

    protected $fillable = ['ttl_id', 'postingan_id'];

    public function user()
    {
        return $this->belongsTo(TemanTuli::class);
    }

    public function postingan()
    {
        return $this->belongsTo(PostinganRelation::class, 'postingan_id');
    }
}
