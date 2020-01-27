<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id')->unsigned();
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('phone');
            $table->integer('need_callback')->unsigned();
            $table->integer('delivery_type_id')->unsigned();
            $table->integer('payment_type_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('orders', function($table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
