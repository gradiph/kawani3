<?php

use Illuminate\Database\Seeder;
use Kawani\Warna;

class WarnasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Warna::create([
			'id' => '01',
			'nama' => 'Red',
		]);
        Warna::create([
			'id' => '02',
			'nama' => 'Yellow',
		]);
        Warna::create([
			'id' => '03',
			'nama' => 'Green',
		]);
        Warna::create([
			'id' => '04',
			'nama' => 'Blue',
		]);
        Warna::create([
			'id' => '05',
			'nama' => 'Black',
		]);
        Warna::create([
			'id' => '06',
			'nama' => 'Gray',
		]);
        Warna::create([
			'id' => '07',
			'nama' => 'White',
		]);
        Warna::create([
			'id' => '08',
			'nama' => 'Orange',
		]);
        Warna::create([
			'id' => '09',
			'nama' => 'Tosca',
		]);
        Warna::create([
			'id' => '10',
			'nama' => 'Pink',
		]);
        Warna::create([
			'id' => '11',
			'nama' => 'Purple',
		]);
        Warna::create([
			'id' => '12',
			'nama' => 'Brick',
		]);
        Warna::create([
			'id' => '13',
			'nama' => 'Aqua',
		]);
        Warna::create([
			'id' => '14',
			'nama' => 'Kaki',
		]);
        Warna::create([
			'id' => '15',
			'nama' => 'Brown',
		]);
        Warna::create([
			'id' => '16',
			'nama' => 'Combination',
		]);
    }
}
