<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('rev_id'); // Primary Key
            $table->unsignedBigInteger('rev_consumer_id'); // Foreign Key
            $table->unsignedBigInteger('rev_provider_id'); // Foreign Key
            $table->unsignedBigInteger('rev_service_id'); // Foreign Key
            $table->integer('rev_rating')->default(3)->check('rev_rating >= 1 AND rev_rating <= 5');
            $table->text('rev_descr')->nullable();
            $table->timestamp('rev_created_at')->useCurrent();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('rev_consumer_id')->references('cons_id')->on('consumers')->onDelete('cascade');
            $table->foreign('rev_provider_id')->references('prov_id')->on('providers')->onDelete('cascade');
            $table->foreign('rev_service_id')->references('srv_id')->on('services')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}