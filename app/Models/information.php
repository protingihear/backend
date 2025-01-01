<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//3. tambahin nama image disini
class information extends Model
{
        protected $fillable = [
        'source',
        'upload_date',
        'upload_time',
        'title',
        'content',
        'image', // Tambahkan kolom image
    ];
}
