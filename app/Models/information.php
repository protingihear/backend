<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class information extends Model
{
        protected $fillable = [
        'source',
        'upload_date',
        'upload_time',
        'title',
        'content',
        'image', 
    ];
}
