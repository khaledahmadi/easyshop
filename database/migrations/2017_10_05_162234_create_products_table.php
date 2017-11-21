<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('category_id');
			$table->integer('brand_id');
			$table->string('pro_name')->nullable();
			$table->string('pro_code')->nullable();
			$table->string('pro_price')->nullable();
			$table->string('pro_info')->nullable();
			$table->string('pro_img')->nullable();
			$table->string('stock')->nullable();
			$table->string('new_arrival')->nullable();
			$table->string('spl_price')->nullable();
            $table->timestamps();
        });
		/*Schema::table('products', function($table) {
			$table->foreign('category_id')->references('id')->on('cats')->onDelete('cascade');
			$table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
		});*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
