<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('country');
            $table->string('state')->nullable();
            $table->string('city');
            $table->string('postal_code');
            $table->string('address');
            $table->string('address_number');
            $table->string('name');
            $table->string('email');
            $table->string('telephone')->nullable();
            $table->integer('ticket_amount');
            $table->float('total_paid', 8, 2);
            $table->float('administration_cost', 8, 2)->nullable();
            $table->string('payment_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('order');
    }
}
