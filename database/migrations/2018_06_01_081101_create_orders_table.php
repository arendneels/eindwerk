<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('user_id')->index()->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->decimal('subtotal');
            $table->string('payment_method');
            $table->string('payment_id');
            $table->integer('country_id')->index();
            $table->string('city');
            $table->string('postal_code');
            $table->string('address');
            $table->string('address2')->nullable();
            $table->decimal('total');
            $table->string('status');
            $table->integer('shippingmethod_id');
            $table->timestamp('shipping_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
