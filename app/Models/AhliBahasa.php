<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AhliBahasa extends Model
{
    use HasFactory;

    protected $table = 'ahli_bahasa';
    protected $primaryKey = 'idAhliBahasa';
    protected $fillable = ['firstName', 'lastName', 'username', 'password'];
}
