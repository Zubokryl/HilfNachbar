<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceSlotsTable extends Migration
{
    public function up()
    {
        Schema::create('service_slots', function (Blueprint $table) {
            $table->id('servsl_id'); // Primary Key
            $table->unsignedBigInteger('servsl_provider_id'); // Foreign Key
            $table->unsignedBigInteger('servsl_service_id'); // Foreign Key
            $table->dateTime('servsl_available_from');
            $table->dateTime('servsl_available_till');
            $table->enum('servsl_status', ['active', 'inactive'])->default('inactive');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('servsl_provider_id')->references('prov_id')->on('providers')->onDelete('cascade');
            $table->foreign('servsl_service_id')->references('srv_id')->on('services')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_slots');
    }
}