<?php

use Illuminate\Database\Seeder;
use Kawani\Bank;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bank::create([
			'nama' => 'Debit BCA',
			'nilai' => 3,
		]);
		Bank::create([
			'nama' => 'Kredit BCA',
			'nilai' => 2.5,
		]);
    }
}
