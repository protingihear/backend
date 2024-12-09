<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemanTuli extends Model
{
    use HasFactory;

    protected $table = 'teman_tuli';
    protected $primaryKey = 'idTemanTuli';
    protected $fillable = ['email', 'firstName', 'lastName', 'username', 'password', 'bio', 'gender']; // Tambahkan 'gender' ke dalam $fillable
}
