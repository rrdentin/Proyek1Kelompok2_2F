<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumuman';

    protected $fillable = [
        'tgl_pengumuman',
        'judul_pengumuman',
        'desc_pengumuman',
        'gambar_pengumuman',
    ];
}
