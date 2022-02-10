<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Str;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
            'jabatan' => 'Kepala UPT KPH Ajatappareng',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Kasi Perlindungan Hutan dan Pemberdayaan Masyarakat',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Kasi Perencanaan dan Pemanfaatan Hutan',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Kepala Sub Bagian Tata Usaha',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Penyusun Program Anggaran dan Pelaporan',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Analisis Pasar Hasil Hutan',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Pengadministrasi Keuangan',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Analis Informasi Sumber Daya Hutan',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Penyusun Program Anggaran dan Pelaporan',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Analisis Perencanaan dan Kerjasama',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Polisi Kehutanan Ahli Utama',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Polisi Kehutanan Ahli Madya',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Polisi Kehutanan Ahli Muda',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Polisi Kehutanan Ahli Pertama',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Polisi Kehutanan Penyelia',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Polisi Kehutanan Mahir',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Polisi Kehutanan Terampil',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Polisi Kehutanan Pemula',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Penyuluh Kehutanan Ahli Utama',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Penyuluh Kehutanan Ahli Madya',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Penyuluh Kehutanan Ahli Muda',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Penyuluh Kehutanan Ahli Pertama',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Penyuluh Kehutanan Penyelia',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Penyuluh Kehutanan Mahir',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Penyuluh Kehutanan Terampil',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Penyuluh Kehutanan Pemula',
        ]);
        DB::table('levels')->insert([
            'jabatan' => 'Pengelola Perlindungan Tanaman dan Pengelolaan Hasil Perkebunan dan Kehutanan',
        ]);
    }
}
