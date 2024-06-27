<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tips', function (Blueprint $table) {
            $table->id();
            $table->string('name_team_1');
            $table->text('logo_team_1');
            $table->string('name_team_2');
            $table->text('logo_team_2');
            $table->integer('score_team_1')->default(0);
            $table->integer('score_team_2')->default(0);
            $table->string('home_bet')->nullable();
            $table->string('home_bet_rate')->nullable();
            $table->string('draw_bet')->nullable();
            $table->string('draw_bet_rate')->nullable();
            $table->string('guest_bet')->nullable();
            $table->string('guest_bet_rate')->nullable();
            $table->string('recommend')->nullable();
            $table->string('recommend_rate')->nullable();
            $table->dateTime('date');
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
        Schema::dropIfExists('tips');
    }
}
