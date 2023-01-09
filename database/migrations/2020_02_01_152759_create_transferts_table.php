<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfertsTable extends Migration
{
    public function up()
    {
        Schema::create('transferts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('ref')->nullable();

            $table->unsignedBigInteger('origine_id');
            $table->unsignedBigInteger('destination_id');

            $table->datetime('date');

            $table->boolean('canceled')->default(false);

            $table->timestamps();

            $table->foreign('origine_id')->references('id')->on('entrepots');
            $table->foreign('destination_id')->references('id')->on('entrepots');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transferts');
    }
}
