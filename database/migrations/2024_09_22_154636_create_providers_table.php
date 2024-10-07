<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id('prov_id'); // Primary Key
            $table->string('prov_fname');
            $table->string('prov_lastname');
            $table->date('prov_dob')->nullable();
            $table->enum('prov_gender', ['male', 'female', 'other'])->nullable();
            $table->string('prov_email')->unique();
            $table->string('prov_password');
            $table->string('prov_phone')->nullable();
            $table->binary('prov_avatar')->nullable();
            $table->unsignedBigInteger('prov_addr_id')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('prov_addr_id')->references('addr_id')->on('addresses')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('providers');
    }
}
