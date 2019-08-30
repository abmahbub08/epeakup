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
            $table->bigIncrements('id');
            $table->string('orderId')->unique();
            $table->integer('country_id');
            $table->integer('user_id');
            $table->string('charge_id');
            $table->text('receipt_url');
            $table->integer('recipient_id')->nullable();
            $table->integer('reason_id')->nullable();
            $table->integer('service_id');
            $table->integer('payment_network_id');
            $table->integer('status_id')->default(1);
            $table->decimal('amount', 8, 2);
            $table->decimal('totalpay', 8, 2);
            $table->decimal('recipient_amount', 8, 2);
            $table->tinyInteger('confirmation')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
