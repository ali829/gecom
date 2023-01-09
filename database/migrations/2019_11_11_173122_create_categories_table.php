<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('nom');
			$table->text('description');
			$table->unsignedBigInteger('image_id')->nullable();
			$table->unsignedBigInteger('parent_id')->nullable();
			$table->timestamps();

			$table->foreign('image_id')->references('id')->on('images');
			$table->foreign('parent_id')->references('id')->on('categories');
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
