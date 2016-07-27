<?php

use Illuminate\Database\Seeder;
use Kawani\Promo;

class PromosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promo::create([
			'tgl_mulai' => '2016-05-08',
			'tgl_selesai' => '2016-05-22',
			'barang_id' => '100000120013',
			'persen' => 25,
		]);
    }
}
