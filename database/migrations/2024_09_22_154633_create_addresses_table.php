<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('addresses')) {
            Schema::create('addresses', function (Blueprint $table) {
                $table->bigIncrements('addr_id');
                $table->string('addr_street');
                $table->string('addr_house_number');
                $table->string('addr_zip');
                $table->string('addr_city');
                $table->timestamps();
            });
        }
    }


    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}