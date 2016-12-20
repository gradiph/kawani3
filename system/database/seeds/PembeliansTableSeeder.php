<?php

use Illuminate\Database\Seeder;
use Kawani\Pembelian;

class PembeliansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pembelian::create([
            'barang_id' => '100000120013',
            'jumlah' => '10',
        ]);
    }
}
