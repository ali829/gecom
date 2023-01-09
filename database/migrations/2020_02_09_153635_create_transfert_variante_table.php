<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfertVarianteTable extends Migration
{
    public function up()
    {
        Schema::create('transfert_variante', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transfert_id');
            $table->unsignedBigInteger('variante_id');
            $table->unsignedInteger('qte')->default(0);
            $table->timestamps();

            $table->foreign('transfert_id')->references('id')->on('transferts');
			$table->foreign('variante_id')->references('id')->on('variantes');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transfert_variante');
    }
}
