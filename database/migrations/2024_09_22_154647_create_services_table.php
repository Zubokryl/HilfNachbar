<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id('srv_id'); // Primary Key
            $table->string('srv_title');
            $table->text('srv_descr')->nullable();
            $table->unsignedBigInteger('srv_provider_id'); // Foreign Key
            $table->string('srv_category')->nullable();
            $table->decimal('srv_price', 8, 2)->default(0); // Example of decimal value
            $table->enum('srv_status', ['active', 'inactive'])->default('inactive');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('srv_provider_id')->references('prov_id')->on('providers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
}