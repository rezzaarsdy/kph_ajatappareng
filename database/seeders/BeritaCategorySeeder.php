<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Str;

class BeritaCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('berita_categories')->insert([
            'uuid' => Str::uuid(),
            'name' => 'Berita', 
        ]);

        DB::table('berita_categories')->insert([
            'uuid' => Str::uuid(),
            'name' => 'Pengumuman',
        ]);

        DB::table('berita_categories')->insert([
            'uuid' => Str::uuid(),
            'name' => 'Artikel',
        ]);

        DB::table('berita_categories')->insert([
            'uuid' => Str::uuid(),
            'name' => 'Agenda',
        ]);
    }
}
