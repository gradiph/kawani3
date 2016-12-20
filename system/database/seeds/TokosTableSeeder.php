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
			'alamat' => 'Jl. Dr. Otten No. 9',
			'telepon' => '+62221234567',
		]);
        Toko::create([
		    'nama' => 'Cimahi',
			'alamat' => 'Jl. Amir Mahmud Cimahi',
			'telepon' => '+62222345678',
		]);
        Toko::create([
		    'nama' => 'Dipati Ukur',
			'alamat' => 'Jl. Dipati Ukur',
			'telepon' => '+62223456789',
		]);
        Toko::create([
		    'nama' => 'Consina',
			'alamat' => 'Jl. Bandung',
			'telepon' => '+62224567890',
		]);
        Toko::create([
		    'nama' => 'Lengkong 2',
			'alamat' => 'Jl. Lengkong Besar No. 79',
			'telepon' => '+62225678901',
		]);
        Toko::create([
		    'nama' => 'Jatinangor',
			'alamat' => 'Jl. Raya Jatinangor No. 198',
			'telepon' => '+62226789012',
		]);
        Toko::create([
		    'nama' => 'Gudang',
			'alamat' => 'Jl. Dr. Otten No. 9',
			'telepon' => '+62227890123',
		]);
    }
}
