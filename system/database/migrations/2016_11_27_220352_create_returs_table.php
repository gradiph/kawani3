<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returs', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('detail_transaksi_id')->unsigned();
			$table->integer('qty');
			$table->string('keterangan');
            $table->timestamps();
			$table->softDeletes();

			$table->foreign('detail_transaksi_id')->references('id')->on('detail_transaksis')
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
			Schema::table('returs',function(Blueprint $table) {
				$table->dropForeign('returs_detail_transaksi_id_foreign');
			});
			Schema::drop('returs');
		});
    }
}
