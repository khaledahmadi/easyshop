<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id');
			$table->string('name');
			$table->string('email')->unique();
			$table->integer('phone');
			$table->string('address');
			$table->string('zip');
			$table->string('city');
			$table->string('state');
			$table->string('payment_method');
            $table->timestamps();
        });
    }

    /**     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkouts');
    }
}
