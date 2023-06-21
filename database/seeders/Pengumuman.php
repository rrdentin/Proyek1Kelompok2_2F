<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Pengumuman extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'tgl_pengumuman' => '2023-06-21',
            'judul_pengumuman' => 'Pembukaan PPDB TK/PAUD Anak Shaleh',
            'desc_pengumuman' => 'Ayah...Bunda, segera daftarkan putra-putri Ayah Bunda di TK/PAUD Terpadu Anak Saleh..!! bersama TK Saheleh Be Peusly Great',
            'gambar_pengumuman' => 'pengppdb.png',

        ],
        [
            'tgl_pengumuman' => '2023-06-21',
            'judul_pengumuman' => 'Berkas Yang Harus Disiapkan !',
            'desc_pengumuman' => 'Ayah...Bunda, berikut berkas yang harus disipakan untuk mendaftarkan buah hatinya  di TK/PAUD Terpadu Anak Saleh..!! bersama TK Saheleh Be Peusly Great',
            'gambar_pengumuman' => 'pengberkas.png',

        ],
        [
            'tgl_pengumuman' => '2023-06-21',
            'judul_pengumuman' => 'Waspada Penipuan !',
            'desc_pengumuman' => 'Ayah...Bunda, pastikan nomor rekening TK/PAUD Terpadu Anak Saleh only BSI (Bank Syariah Indonesia)..!! bersama TK Saheleh Be Peusly Great',
            'gambar_pengumuman' => 'pengpenipuan.png',
        ]
        ];
        DB::table('pengumuman')->insert($data);
    }
}
