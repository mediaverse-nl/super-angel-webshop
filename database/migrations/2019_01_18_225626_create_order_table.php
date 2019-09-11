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
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city');
            $table->string('postal_code');
            $table->string('address');
            $table->string('address_number');
            $table->string('name');
            $table->string('email');
            $table->string('telephone_home')->nullable();
            $table->string('telephone_mobile');
            $table->float('total_paid', 8, 2);
            $table->float('shipping_costs', 8, 2)->nullable();
            $table->string('payment_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('status')->default('pending');
            $table->text('note', 500)->nullable();
            $table->text('delivery_note', 150)->nullable();
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
