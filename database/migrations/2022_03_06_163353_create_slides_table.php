<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lang_parent_id')->nullable()->default(null);
            $table->unsignedBigInteger('lang_id')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->string('url')->nullable()->default(null);
            $table->string('button_url_1')->nullable()->default(null);
            $table->string('button_url_2')->nullable()->default(null);
            $table->string('button_name_1')->nullable()->default(null);
            $table->string('button_name_2')->nullable()->default(null);
            $table->string('image')->nullable();
            $table->integer('ordering')->nullable();
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
        Schema::dropIfExists('slides');
    }
}
