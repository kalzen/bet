<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTipsTable extends Migration
{
    public function up()
    {
        Schema::table('tips', function (Blueprint $table) {
            $table->unsignedBigInteger('lang_parent_id')->nullable()->default(null);
            $table->unsignedBigInteger('lang_id')->nullable()->default(null);
        });
    }

    public function down()
    {
        Schema::table('tips', function (Blueprint $table) {
            $table->unsignedBigInteger('lang_parent_id')->nullable()->default(null);
            $table->unsignedBigInteger('lang_id')->nullable()->default(null);
        });
    }
}
