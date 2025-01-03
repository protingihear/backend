<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komunitas extends Model
{
    use HasFactory;

    protected $table = 'komunitas';
    protected $primaryKey = 'idKomunitas';
    protected $fillable = ['namaKomunitas', 'idTemanTuli', 'idTemanDengar'];
}
