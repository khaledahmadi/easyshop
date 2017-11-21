<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_cats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
			$table->integer('cats_id')->unsigned();
        });
		
		/*Schema::table('sub_cats', function($table) {
			$table->foreign('cats_id')->references('id')->on('cats')->onDelete('cascade');
		});*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_cats');
    }
}
