<?php

use App\Models\AssignedContent;
use App\Models\AssignedTitle;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AssignedTitles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_titles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lang_parent_id')->nullable()->default(null);
            $table->unsignedBigInteger('lang_id')->nullable()->default(null);
            $table->string('route_name', 255);
            $table->text('content')->nullable();
            $table->text('title')->nullable();
            $table->unsignedInteger('status')->nullable()->default(AssignedTitle::STATUS_ACTIVE);
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
        //
    }
}
