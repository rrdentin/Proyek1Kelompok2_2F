<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class Pendaftar extends Model
{
    use HasFactory;

    protected $table = 'pendaftars';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'name',
        'name_wali',
        'jenKel',
        'alamat',
        'tglLahir',
        'foto',
        'kk',
        'akte',
        'jenjangPend',
        'nik',
        'tempatLahir',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }

    public function isEditable()
    {
        // Only allow editing if the status is 'pending' and there is no associated siswa
        return $this->status === 'pending' && !$this->siswa|| 'rejected' && !$this->siswa;
    }
}
