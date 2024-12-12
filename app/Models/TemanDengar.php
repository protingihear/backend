<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemanDengar extends Model
{
    use HasFactory;

    protected $table = 'teman_dengar';
    protected $primaryKey = 'idTemanDengar';
    protected $fillable = ['email', 'firstName', 'lastName', 'username', 'password', 'bio','picture'];
}
