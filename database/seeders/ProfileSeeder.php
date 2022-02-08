<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Str;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profile_categories')->insert([
            'uuid' => Str::uuid(),
            'name' => 'Visi dan Misi', 
            'slug' => 'visi-dan-misi'
        ]);

        DB::table('profile_categories')->insert([
            'uuid' => Str::uuid(),
            'name' => 'Sejarah', 
            'slug' => 'sejarah'
        ]);
    }
}
