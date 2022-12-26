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
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('width')->nullable();
            $table->string('length')->nullable();
            $table->boolean('outstanding')->default(0);
            $table->string('order', 20)->nullable();
            $table->string('extra')->nullable();
            $table->timestamps();
            $table->foreign('category_id')
                ->references('id')->on('categories')->onDelete('cascade');
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
