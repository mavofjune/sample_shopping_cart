<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('total', 10, 2);
            $table->string('transaction_code', 10)->nullable();
            $table->string('message_code', 100)->nullable();
            $table->string('auth_code', 10)->nullable();
            $table->string('transaction_description', 250)->nullable();
            $table->string('error_code', 10)->nullable();
            $table->string('error_message', 250)->nullable();
            $table->string('transaction_status', 50)->nullable();
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
        Schema::dropIfExists('payments');
    }
}
