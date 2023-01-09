<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
			$table->string('description')->nullable();
			$table->string('domain')->nullable();
			$table->string('devise')->default('DH');
			$table->string('email')->nullable();
			$table->string('tel')->nullable();
			$table->string('address')->nullable();
			$table->string('theme')->default('canvas');
			$table->string('footer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
