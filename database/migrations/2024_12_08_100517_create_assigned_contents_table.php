<?php

use App\Models\AssignedContent;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lang_parent_id')->nullable()->default(null);
            $table->unsignedBigInteger('lang_id')->nullable()->default(null);
            $table->string('route_name', 255);
            $table->text('content')->nullable();
            $table->unsignedInteger('status')->nullable()->default(AssignedContent::STATUS_ACTIVE);
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
        Schema::dropIfExists('assigned_contents');
    }
}
