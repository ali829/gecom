<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductShipperTable extends Migration
{
    public function up()
    {
        Schema::create('product_shipper', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('shipper_id');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('shipper_id')->references('id')->on('shippers');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_shipper');
    }
}
