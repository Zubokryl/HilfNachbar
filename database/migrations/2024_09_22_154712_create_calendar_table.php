<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarTable extends Migration
{
    public function up()
    {
        Schema::create('calendar', function (Blueprint $table) {
            $table->id('cal_id'); // Primary Key
            $table->unsignedBigInteger('cal_provider_id'); // Foreign Key
            $table->date('cal_date');
            $table->time('cal_time_slot');
            $table->enum('cal_status', ['available', 'booked', 'unavailable'])->default('available');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('cal_provider_id')->references('prov_id')->on('providers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('calendar');
    }
}
