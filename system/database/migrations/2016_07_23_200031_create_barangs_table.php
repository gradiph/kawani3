<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->string('id',12)->unique();
			$table->string('nama');
			$table->integer('harga_jual');
			$table->integer('hpp');
			$table->string('supplier_id');
			$table->string('jenis_id');
			$table->string('ukuran_id');
			$table->string('warna_id');
            $table->timestamps();
			$table->softDeletes();

			$table->foreign('supplier_id')->references('id')->on('suppliers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
			$table->foreign('jenis_id')->references('id')->on('jenis')
                ->onDelete('cascade')
                ->onUpdate('cascade');
			$table->foreign('ukuran_id')->references('id')->on('ukurans')
                ->onDelete('cascade')
                ->onUpdate('cascade');
			$table->foreign('warna_id')->references('id')->on('warnas')
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
			Schema::table('barangs',function(Blueprint $table) {
				$table->dropForeign('barangs_warna_id_foreign');
				$table->dropForeign('barangs_ukuran_id_foreign');
				$table->dropForeign('barangs_jenis_id_foreign');
				$table->dropForeign('barangs_supplier_id_foreign');
			});
			Schema::drop('barangs');
		});
    }
}
