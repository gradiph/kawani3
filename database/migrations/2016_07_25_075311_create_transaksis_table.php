<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('toko_id')->unsigned();
			$table->enum('jenis_bayar',['Tunai','Non-Tunai'])->default('Tunai');
			$table->integer('bank_id')->unsigned()->nullable();
			$table->integer('total_jual');
			$table->integer('total_hpp');
			$table->integer('total_diskon');
			$table->integer('total_qty');
            $table->timestamps();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transaksis');
    }
}
