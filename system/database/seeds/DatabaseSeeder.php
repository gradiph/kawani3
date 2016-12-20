<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TokosTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(JenisTableSeeder::class);
        $this->call(UkuransTableSeeder::class);
        $this->call(WarnasTableSeeder::class);
        $this->call(BarangsTableSeeder::class);
        $this->call(StoksTableSeeder::class);
        $this->call(BanksTableSeeder::class);
        $this->call(TransaksisTableSeeder::class);
        $this->call(DiskonsTableSeeder::class);
        $this->call(DetailTransaksisTableSeeder::class);
        $this->call(PromosTableSeeder::class);
        $this->call(RetursTableSeeder::class);
        $this->call(PengunjungsTableSeeder::class);
        $this->call(PembeliansTableSeeder::class);
    }
}
