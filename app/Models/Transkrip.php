<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transkrip extends Model
{
    use HasFactory;
      protected $fillable = [
        'nomer',
        'transkrip',
    ];
}
