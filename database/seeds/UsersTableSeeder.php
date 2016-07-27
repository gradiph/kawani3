<?php

use Illuminate\Database\Seeder;
use Kawani\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
			'username' => 'admin1', 
			'nama' => 'Admin 1', 
			'password' => encrypt('admin1'),
			'level' => 'Admin',
		]);
        User::create([
			'username' => 'admin2', 
			'nama' => 'Admin 2', 
			'password' => encrypt('admin2'),
			'level' => 'Admin',
		]);
		User::create([
			'username' => 'kasir1', 
			'nama' => 'Kasir 1', 
			'password' => encrypt('kasir1'),
			'level' => 'Kasir',
		]);
		User::create([
			'username' => 'kasir2', 
			'nama' => 'Kasir 2', 
			'password' => encrypt('kasir2'),
			'level' => 'Kasir',
		]);
		User::create([
			'username' => 'gudang1', 
			'nama' => 'Gudang 1', 
			'password' => encrypt('gudang1'),
			'level' => 'Gudang',
		]);
		User::create([
			'username' => 'gudang2', 
			'nama' => 'Gudang 2', 
			'password' => encrypt('gudang2'),
			'level' => 'Gudang',
		]);
		User::create([
			'username' => 'staf1', 
			'nama' => 'Staf 1', 
			'password' => encrypt('staf1'),
			'level' => 'Staf',
		]);
		User::create([
			'username' => 'staf2', 
			'nama' => 'Staf 2', 
			'password' => encrypt('staf2'),
			'level' => 'Staf',
		]);
		User::create([
			'username' => 'hrd1', 
			'nama' => 'HRD 1', 
			'password' => encrypt('hrd1'),
			'level' => 'HRD',
		]);
		User::create([
			'username' => 'hrd2', 
			'nama' => 'HRD 2', 
			'password' => encrypt('hrd2'),
			'level' => 'HRD',
		]);
		User::create([
			'username' => 'keuangan1', 
			'nama' => 'Keuangan 1', 
			'password' => encrypt('keuangan1'),
			'level' => 'Keuangan',
		]);
		User::create([
			'username' => 'keuangan2', 
			'nama' => 'Keuangan 2', 
			'password' => encrypt('keuangan2'),
			'level' => 'Keuangan',
		]);
		User::create([
			'username' => 'direktur1', 
			'nama' => 'Direktur 1', 
			'password' => encrypt('direktur1'),
			'level' => 'Direktur',
		]);
		User::create([
			'username' => 'direktur2', 
			'nama' => 'Direktur 2', 
			'password' => encrypt('direktur2'),
			'level' => 'Direktur',
		]);
    }
}
