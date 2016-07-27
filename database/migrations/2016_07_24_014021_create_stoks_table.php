<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stoks', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('toko_id')->unsigned();
			$table->string('barang_id',12);
			$table->integer('qty')->default(0);
			
			$table->foreign('toko_id')->references('id')->on('tokos');
			$table->foreign('barang_id')->references('id')->on('barangs');
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
			Schema::table('stoks',function(Blueprint $table) {
				$table->dropForeign('stoks_barang_id_foreign');
				$table->dropForeign('stoks_toko_id_foreign');
			});
			Schema::drop('stoks');
		});
    }
}
