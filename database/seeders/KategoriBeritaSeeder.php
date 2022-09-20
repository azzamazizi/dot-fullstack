<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriBeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ms_kategoriberita')->insert([
            'namakategori' => 'Pengumuman',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('ms_kategoriberita')->insert([
            'namakategori' => 'Informasi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('ms_kategoriberita')->insert([
            'namakategori' => 'Umum',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
