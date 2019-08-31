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
            $table->increments('id');
            $table->integer('category_id')->nullable()->unsigned();
            $table->foreign('category_id')->references('id')->on('category');
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('title');
            $table->string('description')->nullable();
            $table->float('price', 8,2);
            $table->float('discount', 8,2)->nullable();
            $table->string('images')->nullable();
            $table->integer('stock')->default(0);
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
        Schema::dropIfExists('products');
    }
}
