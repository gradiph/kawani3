<?php

use Illuminate\Database\Seeder;
use Kawani\Jenis;

class JenisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jenis::create([
			'id' => '1',
			'nama' => 'Day Pack',
		]);
        Jenis::create([
			'id' => '2',
			'nama' => 'Carrier',
		]);
        Jenis::create([
			'id' => '3',
			'nama' => 'Travel Pouch',
		]);
        Jenis::create([
			'id' => '4',
			'nama' => 'Aparelt',
		]);
        Jenis::create([
			'id' => '5',
			'nama' => 'Equipment',
		]);
        Jenis::create([
			'id' => '6',
			'nama' => 'Alas Kaki',
		]);
        Jenis::create([
			'id' => '7',
			'nama' => 'Accesories',
		]);
        Jenis::create([
			'id' => '8',
			'nama' => 'Lain-lain',
		]);
    }
}
