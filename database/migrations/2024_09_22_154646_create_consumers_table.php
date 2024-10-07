<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumersTable extends Migration
{
    public function up()
    {
        Schema::create('consumers', function (Blueprint $table) {
            $table->id('cons_id'); // Primary Key
            $table->string('cons_fname');
            $table->string('cons_lastname');
            $table->date('cons_dob')->nullable();
            $table->enum('cons_gender', ['male', 'female', 'other'])->nullable();
            $table->string('cons_email')->unique();
            $table->string('cons_password');
            $table->string('cons_phone')->nullable();
            $table->binary('cons_avatar')->nullable();
            $table->unsignedBigInteger('cons_addr_id')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('cons_addr_id')->references('addr_id')->on('addresses')->onDelete('set null');
        });
    }
    public function down()
    {
        Schema::dropIfExists('consumers');
    }
}
