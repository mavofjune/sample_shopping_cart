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
        //
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('street_one', 150);
            $table->string('street_two', 150);
            $table->string('city', 150);
            $table->string('state', 100);
            $table->string('postal_code', 15);
            $table->string('country', 100);
            $table->string('address_type', 50);
            $table->unsignedInteger('customer_id');
          //  $table->foreign('customer_id')->references('id')->on('customers');
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
        Schema::dropIfExists('customers');

    }
}
