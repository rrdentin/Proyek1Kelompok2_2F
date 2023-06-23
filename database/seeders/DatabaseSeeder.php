<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Pengumuman::class);
        $this->call(Gallery::class);
        $this->call(Admin::class);
        $this->call(Panitia::class);
    }
}
