<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lang_parent_id')->nullable()->default(null);
            $table->unsignedBigInteger('lang_id')->nullable()->default(null);
            $table->string('name');
            $table->text('image');
            $table->text('sale_text')->nullable();
            $table->text('url');
            $table->text('content')->nullable();
            $table->text('description')->nullable();
            $table->integer('is_hot')->default(0);
            $table->integer('ordering')->default(0);
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
        Schema::dropIfExists('bookers');
    }
}
