<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelians', function (Blueprint $table) {
            $table->increments('id');
            $table->string('barang_id');
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('barang_id')->references('id')->on('barangs')
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
			Schema::table('pembelians',function(Blueprint $table) {
				$table->dropForeign('pembelians_barang_id_foreign');
			});
			Schema::drop('pembelians');
		});
    }
}
