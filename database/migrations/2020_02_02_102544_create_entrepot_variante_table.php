<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntrepotVarianteTable extends Migration
{
    public function up()
    {
        Schema::create('entrepot_variante', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('entrepot_id');
            $table->unsignedBigInteger('variante_id');
            $table->unsignedInteger('qte')->default(0);
            $table->timestamps();

            $table->foreign('entrepot_id')->references('id')->on('entrepots');
			$table->foreign('variante_id')->references('id')->on('variantes');
        });
    }

    public function down()
    {
        Schema::dropIfExists('entrepot_variante');
    }
}
