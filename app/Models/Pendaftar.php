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

    protected $fillable = [
        'user_id',
        'name',
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
        'pembayaran_id',
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

    public function isEditable()
    {
        // Only allow editing if the status is 'pending' and there is no associated siswa
        return $this->status === 'pending' && !$this->siswa;
    }

    public static function boot()
{
    parent::boot();

    // Unique validation for name, tempatLahir, tglLahir combination
    static::saving(function ($model) {
        $validationRules = [
            'name' => [
                'required',
                Rule::unique('pendaftars')->where(function ($query) use ($model) {
                    return $query->where(function ($query) use ($model) {
                        $query->where('tempatLahir', $model->tempatLahir)
                            ->orWhere('tglLahir', $model->tglLahir);
                    })->orWhere('name', $model->name);
                }),
            ],
            'nik' => [
                'required',
                Rule::unique('pendaftars')->ignore($model->id),
            ],
        ];

        $validator = Validator::make($model->attributesToArray(), $validationRules);

        if ($validator->fails()) {
            throw new \Illuminate\Validation\ValidationException($validator);
        }
    });
}
}
