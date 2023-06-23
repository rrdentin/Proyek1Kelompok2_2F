<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Panitia extends Seeder
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
                'username' => 'AndikaPanitia',
                'name' => 'Andika Ainur WibowoePanitia',
                'email' => 'AndikaPanitia@gmail.com',
                'password' => Hash::make('12345678'),
                'level' => 'panitia',
            ],
            [
                'username' => 'FaizPanitia',
                'name' => 'Faiz Atta Raditya Panitia',
                'email' => 'FaizPanitia@gmail.com',
                'password' => Hash::make(12345678),
                'level' => 'panitia',
            ],
            [
                'username' => 'IbnuPanitia',
                'name' => 'Ibnu Hajar A Panitia',
                'email' => 'IbnuPanitia@gmail.com',
                'password' => Hash::make(12345678),
                'level' => 'panitia',
            ],
            [
                'username' => 'KafabiPanitia',
                'name' => 'Abdullah Kafabi Panitia',
                'email' => 'KafabiPanitia@gmail.com',
                'password' => Hash::make(12345678),
                'level' => 'panitia',
            ],
            [
                'username' => 'AkbarPanitia',
                'name' => 'Maulana Akbar Panitia',
                'email' => 'AkbarPanitia@gmail.com',
                'password' => Hash::make(12345678),
                'level' => 'panitia',
            ],
            [
                'username' => 'BimaPanitia',
                'name' => 'Ahmad Bima Panitia',
                'email' => 'BimaPanitia@gmail.com',
                'password' => Hash::make(12345678),
                'level' => 'panitia',
            ],
            [
                'username' => 'SyahlaPanitia',
                'name' => 'Syahla S Panitia',
                'email' => 'SyahlaPanitia@gmail.com',
                'password' => Hash::make(12345678),
                'level' => 'panitia',
            ],
            [
                'username' => 'DidinPanitia',
                'name' => 'Iemadudin Panitia',
                'email' => 'DidinPanitia@gmail.com',
                'password' => Hash::make(12345678),
                'level' => 'panitia',
            ],
            [
                'username' => 'YasminePanitia',
                'name' => 'Yasmin Panitia',
                'email' => 'YasminePanitia@gmail.com',
                'password' => Hash::make(12345678),
                'level' => 'panitia',
            ],
            [
                'username' => 'RioPanitia',
                'name' => 'Rio Panitia',
                'email' => 'RioPanitia@gmail.com',
                'password' => Hash::make(12345678),
                'level' => 'panitia',
            ],
        ];
        DB::table('users')->insert($data);  
        }
}
