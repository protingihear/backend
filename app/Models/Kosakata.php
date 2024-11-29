<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kosakata extends Model
{
    use HasFactory;

    protected $table = 'kosakata';
    protected $primaryKey = 'idKata';
    protected $fillable = ['kata', 'artiKata', 'idAhliBahasa'];
}
