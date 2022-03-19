<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('nik');
            $table->string('department');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('title');
            $table->integer('stock_quantity');
            $table->string('unit_type')->default('pack');
            $table->string('location');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('product_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_request_id');
            $table->integer('product_id');
            $table->enum('type', ['in', 'out']);
            $table->integer('quantity');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_request');
    }
}
