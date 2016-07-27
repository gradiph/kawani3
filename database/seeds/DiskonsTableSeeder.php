<?php

use Illuminate\Database\Seeder;
use Kawani\Diskon;

class DiskonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Diskon::create([
			'user_id' => '4',
			'persen' => '5',
			'kode' => 'YdiOf',
			'keterangan' => 'Contoh Diskon',
			'status' => 'Non-Aktif'
		]);
    }
}
