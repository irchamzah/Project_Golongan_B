<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatusPesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\StatusPesanan::insert([
            ['name'=>'Belum Dikonfirmasi',],
            ['name'=>'Sudah Dikonfirmasi',],
            ['name'=>'Pesanan Selesai',],
            ['name'=>'Pesanan Ditolak',],
        ]);
    }
}
