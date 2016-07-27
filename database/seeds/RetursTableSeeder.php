<?php

use Illuminate\Database\Seeder;
use Kawani\Retur;

class RetursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Retur::create([
			'detail_transaksi_id' => '2',
			'qty' => '1',
			'keterangan' => 'barang rusak',
		]);
    }
}
