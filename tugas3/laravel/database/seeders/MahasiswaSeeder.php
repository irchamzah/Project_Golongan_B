<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswas')->insert([
            'name' => 'Irchamzah Fikri Ababil',
            'alamat' => "Wonosari Bondowoso",
            'jenis_kelamin' => 1,
            'prodi' => 1,
            'no_hp' => "083134752738"
        ]);
    }
}
