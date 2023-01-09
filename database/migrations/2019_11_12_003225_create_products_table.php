<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();

            $table->unsignedInteger('weight')->default(0);
            $table->unsignedInteger('weight_package')->default(0);

            $table->unsignedBigInteger('categorie_id');

            $table->boolean('visible')->default(true);
            $table->boolean('visible_web')->default(true);
            $table->unsignedInteger('qte_min')->nullable();
            $table->unsignedInteger('qte_max')->nullable();

            $table->string('livrable')->default(true);
            

            $table->unsignedInteger('height')->nullable();
            $table->unsignedInteger('width')->nullable();
            $table->unsignedInteger('length')->nullable();

            $table->string('options')->default('default');

            $table->timestamps();

            $table->foreign('categorie_id')->references('id')->on('categories');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
