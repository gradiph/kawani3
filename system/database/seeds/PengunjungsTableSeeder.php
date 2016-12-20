<?php

use Illuminate\Database\Seeder;
use Kawani\Pengunjung;

class PengunjungsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengunjung::create([
			'qty' => '150'
		]);
    }
}
