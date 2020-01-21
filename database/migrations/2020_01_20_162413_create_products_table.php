<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->integer('make_id')->unsigned();
            $table->integer('model_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->string('barcode');
            $table->string('stock_code');
            $table->string('nomenclature');
            $table->string('original_description', 500);
            $table->text('detailed_description');
            $table->integer('in_stock');
            $table->decimal('dealer_price', 8, 2);
            $table->decimal('retail_price', 8, 2);
            $table->string('manufacture');
            $table->timestamps();
        });

        Schema::table('products', function($table) {
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');;
            $table->foreign('make_id')->references('id')->on('makes')->onDelete('cascade');;
            $table->foreign('model_id')->references('id')->on('models')->onDelete('cascade');;
        });
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
