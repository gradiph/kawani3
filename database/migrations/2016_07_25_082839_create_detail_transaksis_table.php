<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('transaksi_id')->unsigned();
			$table->string('barang_id');
			$table->integer('qty');
			$table->integer('harga_jual');
			$table->integer('hpp');
			$table->integer('diskon_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detail_transaksis');
    }
}
