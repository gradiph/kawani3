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

			$table->foreign('transaksi_id')->references('id')->on('transaksis')
                ->onDelete('cascade')
                ->onUpdate('cascade');
			$table->foreign('barang_id')->references('id')->on('barangs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
			$table->foreign('diskon_id')->references('id')->on('diskons')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::transaction(function()
		{
			Schema::table('detail_transaksis',function(Blueprint $table) {
				$table->dropForeign('detail_transaksis_diskon_id_foreign');
				$table->dropForeign('detail_transaksis_barang_id_foreign');
				$table->dropForeign('detail_transaksis_transaksi_id_foreign');
			});
			Schema::drop('detail_transaksis');
		});
    }
}
