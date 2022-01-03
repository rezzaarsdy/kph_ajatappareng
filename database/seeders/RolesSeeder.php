<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Str;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'uuid' => Str::uuid(),
            'nama' => 'superadmin', 
        ]);

        DB::table('roles')->insert([
            'uuid' => Str::uuid(),
            'nama' => 'admin', 
        ]);
    }
}
