<?php

use Illuminate\Database\Seeder;
use Kawani\Transaksi;

class TransaksisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaksi::create([
			'user_id' => '3',
			'toko_id' => '1',
			'jenis_bayar' => 'Tunai',
			'bank_id' => null,
			'total_jual' => 950000,
			'total_hpp' => 500000,
			'total_diskon' => 0,
			'total_qty' => 2,
		]);
		Transaksi::create([
			'user_id' => '4',
			'toko_id' => '2',
			'jenis_bayar' => 'Non-Tunai',
			'bank_id' => '1',
			'total_jual' => 1950000,
			'total_hpp' => 1220000,
			'total_diskon' => 0,
			'total_qty' => 6,
		]);
		Transaksi::create([
			'user_id' => '4',
			'toko_id' => '2',
			'jenis_bayar' => 'Tunai',
			'bank_id' => null,
			'total_jual' => 1000000,
			'total_hpp' => 720000,
			'total_diskon' => 50000,
			'total_qty' => 4,
		]);
    }
}
