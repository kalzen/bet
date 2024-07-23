<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookerCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booker_code', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('code_id');
            $table->unsignedBigInteger('booker_id');
            $table->timestamps();

            $table->foreign('code_id')->references('id')->on('codes')->onDelete('cascade');
            $table->foreign('booker_id')->references('id')->on('bookers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booker_code');
    }
}
