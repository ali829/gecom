<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('shipping_name'); // copier depuis client (afin de garder l'historique)
			$table->string('shipping_address')->nullable(); // même chose
            $table->string('shipping_phone'); // ...
            $table->string('shipping_email')->nullable(); // ...

            $table->unsignedBigInteger('payment_method')->nullable(); // laissez string pour le moment, après on va l'extraire dans sa propre table

            $table->datetime('shipped_at')->nullable(); // if null not shipped yet
            $table->datetime('paid_at')->nullable();

            $table->boolean('is_quote')->default(true); //devis
            $table->boolean('is_validated')->default(false);
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('destination_id')->nullable();
            $table->unsignedBigInteger('shipper_id');
            $table->decimal('shipping_price')->default(0);

            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('destination_id')->references('id')->on('destinations');
            $table->foreign('shipper_id')->references('id')->on('shippers');
            $table->foreign('payment_method')->references('id')->on('payment_methods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
