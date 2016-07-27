<?php

use Illuminate\Database\Seeder;
use Kawani\Stok;

class StoksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Stok::create([
			'toko_id' => '1',
			'barang_id' => '208150510506',
			'qty' => '2',
		]);
        Stok::create([
			'toko_id' => '2',
			'barang_id' => '208150510506',
			'qty' => '5',
		]);
		Stok::create([
			'toko_id' => '3',
			'barang_id' => '208150510506',
			'qty' => '0',
		]);
        Stok::create([
			'toko_id' => '4',
			'barang_id' => '208150510506',
			'qty' => '8',
		]);
        Stok::create([
			'toko_id' => '5',
			'barang_id' => '208150510506',
			'qty' => '1',
		]);
        Stok::create([
			'toko_id' => '6',
			'barang_id' => '208150510506',
			'qty' => '22',
		]);
        Stok::create([
			'toko_id' => '7',
			'barang_id' => '208150510506',
			'qty' => '11',
		]);
        Stok::create([
			'toko_id' => '1',
			'barang_id' => '100000120013',
			'qty' => '8',
		]);
        Stok::create([
			'toko_id' => '2',
			'barang_id' => '100000120013',
			'qty' => '1',
		]);
        Stok::create([
			'toko_id' => '3',
			'barang_id' => '100000120013',
			'qty' => '7',
		]);
        Stok::create([
			'toko_id' => '6',
			'barang_id' => '100000120013',
			'qty' => '5',
		]);
        Stok::create([
			'toko_id' => '7',
			'barang_id' => '100000120013',
			'qty' => '11',
		]);
    }
}
