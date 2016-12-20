<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiskonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diskons', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->float('persen');
			$table->string('kode',5);
			$table->text('keterangan');
			$table->enum('status',['Aktif','Non-Aktif']);
            $table->timestamps();
			$table->softDeletes();

			$table->foreign('user_id')->references('id')->on('users')
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
			Schema::table('diskons',function(Blueprint $table) {
				$table->dropForeign('diskons_user_id_foreign');
			});
			Schema::drop('diskons');
		});
    }
}
