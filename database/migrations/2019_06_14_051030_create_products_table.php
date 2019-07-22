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
            $table->bigIncrements('id');
            $table->unsignedInteger('group_id');
            $table->string('product_name');
            $table->string('product_code');
            $table->unsignedDecimal('product_price');
            $table->string('product_detail');
            $table->string('product_createdBy');
            $table->string('product_brand');
            $table->string('product_group');
            $table->string('product_warranty');
            $table->string('product_model');
            $table->string('product_images');
            $table->timestamps();
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
