<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Str;

class PerhutananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perhutanan_categories')->insert([
            'uuid' => Str::uuid(),
            'name' => 'HKm', 
            'slug' => 'hkm'
        ]);

        DB::table('perhutanan_categories')->insert([
            'uuid' => Str::uuid(),
            'name' => 'HD', 
            'slug' => 'hd'
        ]);

        DB::table('perhutanan_categories')->insert([
            'uuid' => Str::uuid(),
            'name' => 'HTR', 
            'slug' => 'htr'
        ]);

        DB::table('perhutanan_categories')->insert([
            'uuid' => Str::uuid(),
            'name' => 'Pengamanan dan Perlindungan Hutan', 
            'slug' => 'pengamanan-dan-perlindungan-hutan'
        ]);
    }
}
