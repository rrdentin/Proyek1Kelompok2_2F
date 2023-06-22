<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Gallery extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'kategori_galeri' => 'Paud',
            'keterangan_galeri' => 'Peringatan Hari Pendidikan Nasional PAUD Terpadu Anak Saleh',
            'gambar_galeri' => 'galleryPaud1.png',
        ],
        [
            'kategori_galeri' => 'Paud',
            'keterangan_galeri' => 'Shalat adalah tiang agama. Shalat adalah media untuk membangun hubungan erat dengan Sang Pencipta yaitu Allah Subhanahu wa Ta’ala. Shalat adalah amalan yang akan dihisab pada hari kiamat',
            'gambar_galeri' => 'galleryPaud2.png',
        ],
        [
            'kategori_galeri' => 'Paud',
            'keterangan_galeri' => 'Pekerjaan dibidang pertanian merupakan pekerjaan manusia yang paling berguna dan paling mulia. Namun saat ini masih belum banyak pengenalan pertanian kepada anak-anak terutama Paud Anak Saleh',
            'gambar_galeri' => 'galleryPaud3.png',
        ],
        [
            'kategori_galeri' => 'TK',
            'keterangan_galeri' => 'Pembelajaran diluar ruangan sangatlah asik untuk dilakukan oleh TK Anak Saleh Malang Terlihat anak anak sangat',
            'gambar_galeri' => 'galleryTK1.png',
        ],
        [
            'kategori_galeri' => 'TK',
            'keterangan_galeri' => 'Bermain dikelas sangatlah asik untuk dilakukan oleh TK Anak Saleh Malang Terlihat anak anak sangat',
            'gambar_galeri' => 'galleryTK2.png',
        ],
        [
            'kategori_galeri' => 'TK',
            'keterangan_galeri' => 'TK Anak Saleh Dituntut untuk memakan makanan yang bergizi untuk memenuhi kebutuhan gizi mereka untuk dapat berkembang dan bertumbuh',
            'gambar_galeri' => 'galleryTK3.png',
        ]
        ];
        DB::table('gallery')->insert($data);
    }
}
