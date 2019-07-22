<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->string('address_owner');
            $table->unsignedInteger('address_phone');
            $table->string('address_moo');
            $table->string('address_soi');
            $table->string('address_houseNo');
            $table->string('address_district');
            $table->string('address_province');
            $table->string('address_city');
            $table->string('address_state');
            $table->string('address_country');
            $table->string('address_postal_code');
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
        Schema::dropIfExists('addresses');
    }
}
