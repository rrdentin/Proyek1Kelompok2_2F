<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $table = 'pendaftars';

    protected $fillable = [
        'user_id', 
        'name', 
        'jenKel', 
        'alamat', 
        'tglLahir', 
        'foto', 
        'kk', 
        'akte', 
        'status', 
        'pembayaran_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class);
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }
}
