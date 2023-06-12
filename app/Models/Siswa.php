<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';

    protected $fillable = [
        'pendaftar_id', 
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
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $validationRules = [
                'name' => [
                    'required',
                    Rule::unique('siswas')->where(function ($query) use ($model) {
                        return $query->where(function ($query) use ($model) {
                            $query->where('tempatLahir', $model->tempatLahir)
                                ->orWhere('tglLahir', $model->tglLahir);
                        })->orWhere('name', $model->name);
                    }),
                ],
            ];

            $validator = Validator::make($model->attributesToArray(), $validationRules);

            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }
        });
    }
}
