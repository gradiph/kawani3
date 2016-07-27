<?php

use Illuminate\Database\Seeder;
use Kawani\Toko;

class TokosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Toko::create([
		    'nama' => 'Otten',
		]);
        Toko::create([
		    'nama' => 'Cimahi',
		]);
        Toko::create([
		    'nama' => 'Dipati Ukur',
		]);
        Toko::create([
		    'nama' => 'Consina',
		]);
        Toko::create([
		    'nama' => 'Lengkong 2',
		]);
        Toko::create([
		    'nama' => 'Jatinangor',
		]);
        Toko::create([
		    'nama' => 'Gudang',
		]);
    }
}
