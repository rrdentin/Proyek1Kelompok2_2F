<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'username' => 'AbdullahAzzamAdmin',
                'name' => 'Abdullah Azzam Admin',
                'email' => 'AbdullahAdmin@gmail.com',
                'password' => Hash::make('12345678'),
                'level' => 'admin',
            ],
            [
                'username' => 'AlvianNurFirdausAdmin',
                'name' => 'Alvian Nur Firdaus Admin',
                'email' => 'AlviannAdmin@gmail.com',
                'password' => Hash::make(12345678),
                'level' => 'admin',
            ],
            [
                'username' => 'ElangPutraAdmin',
                'name' => 'Elang Putra Adam Admin',
                'email' => 'ElangAdmin@gmail.com',
                'password' => Hash::make(12345678),
                'level' => 'admin',
            ],
            [
                'username' => 'MEgaRamaFernandaAdmin',
                'name' => 'M Ega Rama Fernanda Admin',
                'email' => 'EgaAdmin@gmail.com',
                'password' => Hash::make(12345678),
                'level' => 'admin',
            ],
            [
                'username' => 'RrDentiNAdmin',
                'name' => 'Rr Denti Nurramadhona Admin',
                'email' => 'DentiAdmin@gmail.com',
                'password' => Hash::make(12345678),
                'level' => 'admin',
            ],
            [
                'username' => 'AlfiSuryaAdmin',
                'name' => 'Alfi Surya Pratama Admin',
                'email' => 'AlfiSuryaAdmin@gmail.com',
                'password' => Hash::make(12345678),
                'level' => 'admin',
            ],
            [
                'username' => 'DimitriAdmin',
                'name' => 'Dimitri Abdullah Admin',
                'email' => 'DimitriAdmin@gmail.com',
                'password' => Hash::make(12345678),
                'level' => 'admin',
            ],
            [
                'username' => 'ZahraAdmin',
                'name' => 'Zahra Anisa Wahono Admin',
                'email' => 'ZahraAdmin@gmail.com',
                'password' => Hash::make(12345678),
                'level' => 'admin',
            ],
            [
                'username' => 'RahmaAdmin',
                'name' => 'Yuliyana Rahmawati Admin',
                'email' => 'RahmaAdmin@gmail.com',
                'password' => Hash::make(12345678),
                'level' => 'admin',
            ],
            [
                'username' => 'HakanAlifAdmin',
                'name' => 'Hakan Alif Admin',
                'email' => 'HakanAdmin@gmail.com',
                'password' => Hash::make(12345678),
                'level' => 'admin',
            ],
        ];
        DB::table('users')->insert($data);  
        }
    }
