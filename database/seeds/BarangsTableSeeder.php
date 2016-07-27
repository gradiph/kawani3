<?php

use Illuminate\Database\Seeder;
use Kawani\Barang;

class BarangsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barang::create([
			'id' => '208150510506',
			'nama' => 'Day Pack Deuter 50L',
			'harga_jual' => '250000',
			'hpp' => '180000',
			'supplier_id' => '208',
			'jenis_id' => '1',
			'ukuran_id' => '05',
			'warna_id' => '05',
		]);
        Barang::create([
			'id' => '100000120013',
			'nama' => 'Carrier Kawani 75L',
			'harga_jual' => '475000',
			'hpp' => '250000',
			'supplier_id' => '100',
			'jenis_id' => '2',
			'ukuran_id' => '00',
			'warna_id' => '13',
		]);
    }
}
