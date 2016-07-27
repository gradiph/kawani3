<?php

use Illuminate\Database\Seeder;
use Kawani\DetailTransaksi;

class DetailTransaksisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetailTransaksi::create([
			'transaksi_id' => '1',
			'barang_id' => '100000120013',
			'qty' => 2,
			'harga_jual' => 475000,
			'hpp' => 250000,
			'diskon_id' => null,
		]);
        DetailTransaksi::create([
			'transaksi_id' => '2',
			'barang_id' => '100000120013',
			'qty' => 2,
			'harga_jual' => 475000,
			'hpp' => 250000,
			'diskon_id' => null,
		]);
        DetailTransaksi::create([
			'transaksi_id' => '2',
			'barang_id' => '208150510506',
			'qty' => 2,
			'harga_jual' => 250000,
			'hpp' => 180000,
			'diskon_id' => null,
		]);
        DetailTransaksi::create([
			'transaksi_id' => '3',
			'barang_id' => '208150510506',
			'qty' => 2,
			'harga_jual' => 250000,
			'hpp' => 180000,
			'diskon_id' => '1',
		]);
    }
}
