<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelurahan')->insert([
            'nama_kelurahan' => Str::random(10),
            'nama_kecamatan' => Str::random(10),
            'nama_kota' => Str::random(10),
        ]);

        DB::table('kelurahan')->insert([
            'nama_kelurahan' => Str::random(10),
            'nama_kecamatan' => Str::random(10),
            'nama_kota' => Str::random(10),
        ]);
    }
}
