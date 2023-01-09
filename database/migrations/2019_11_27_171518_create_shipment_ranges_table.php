<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentRangesTable extends Migration
{
    public function up()
    {
        Schema::create('shipment_ranges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('shipper_id');
            $table->unsignedInteger('min_weight');
            $table->unsignedInteger('max_weight');
            $table->timestamps();

            $table->foreign('shipper_id')->references('id')->on('shippers');
        });
    }

    public function down()
    {
        Schema::dropIfExists('shipment_ranges');
    }
}
