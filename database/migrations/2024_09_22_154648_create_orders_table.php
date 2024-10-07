<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id'); // Primary Key
            $table->unsignedBigInteger('order_consumer_id'); // Foreign Key
            $table->unsignedBigInteger('order_service_id'); // Foreign Key
            $table->decimal('order_price', 8, 2);
            $table->enum('order_status', ['pending', 'confirmed', 'completed', 'canceled'])->default('pending');
            $table->timestamp('order_created_at')->useCurrent();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('order_consumer_id')->references('cons_id')->on('consumers')->onDelete('cascade');
            $table->foreign('order_service_id')->references('srv_id')->on('services')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}