<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->text('options')->nullable()->default(null);
            $table->text('name')->nullable()->default(null);
            $table->integer('catalogue_id')->default(0);
            $table->longText('json_data')->nullable()->default(null);
            $table->text('benefits')->nullable()->default(null);
            $table->text('group_id')->nullable()->default(null);
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
        Schema::dropIfExists('packages');
    }
}
