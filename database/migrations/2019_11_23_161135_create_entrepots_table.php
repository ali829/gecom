<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntrepotsTable extends Migration
{
    public function up()
    {
        Schema::create('entrepots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('adresse')->nullable();
            $table->string('description')->nullable();
            $table->decimal('volume')->nullable();
            $table->string('etat')->nullable();
            $table->unsignedBigInteger('destination_id')->nullable();
            $table->timestamps();

            $table->foreign('destination_id')->references('id')->on('destinations');
        });
    }

    public function down()
    {
        Schema::dropIfExists('entrepots');
    }
}
