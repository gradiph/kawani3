<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promos', function (Blueprint $table) {
            $table->increments('id');
			$table->date('tgl_mulai');
			$table->date('tgl_selesai');
			$table->string('barang_id');
			$table->float('persen');
            $table->timestamps();
			$table->softDeletes();

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
			Schema::table('promos',function(Blueprint $table) {
				$table->dropForeign('promos_barang_id_foreign');
			});
			Schema::drop('promos');
		});
    }
}
