<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Siswa extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'siswas';

    protected $fillable = [
        'pendaftar_id',
        'nis',

    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }
}
