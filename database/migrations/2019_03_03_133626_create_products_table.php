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
            $table->timestamps();
            $table->text('name');
            $table->text('operation')->nullable();
            $table->text('category')->nullable();
            $table->string('image');
            $table->longText('details')->nullable();
            $table->string('sku')->nullable();
            $table->float('price', 200, 2)->nullable();
            $table->bigInteger('stock')->nullable();
            $table->float('measure', 200, 2)->nullable();
            $table->float('measure2', 200, 2)->nullable();
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
