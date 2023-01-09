<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantesTable extends Migration
{

    public function up()
    {
        Schema::create('variantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->decimal('price');
            $table->string('ref')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('image_id')->nullable();

            $table->timestamps();

            $table->foreign('image_id')->references('id')->on('images');
			$table->foreign('product_id')->references('id')->on('products');
        });
    }

    public function down()
    {
        Schema::dropIfExists('variantes');
    }
}
