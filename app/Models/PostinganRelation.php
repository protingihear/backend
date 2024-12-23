<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostinganRelation extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Nama tabel yang terkait dengan model ini.
     *
     * @var string
     */
    protected $table = 'postingan_relations';

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array
     */
    protected $fillable = [
        'kontenPostingan',
        'likes',
        'comments',
        'image',
        'username',
    ];

    /**
     * Atribut yang harus di-cast ke tipe data tertentu.
     *
     * @var array
     */
    protected $casts = [
        'likes' => 'integer',
        'comments' => 'integer',
    ];

    /**
     * Relasi dengan model `TemanTuli` (opsional, jika Anda ingin mengaktifkan relasi foreign key).
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function temanTuli()
    {
        return $this->belongsTo(TemanTuli::class, 'username', 'username');
    }
}
