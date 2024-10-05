<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Post;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('lang_parent_id')->nullable()->default(null);
            $table->unsignedInteger('lang_id')->nullable()->default(null);
            $table->text('title')->nullable()->default(null);
            $table->text('slug')->nullable()->default(null);
            $table->text('keyword')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->longtext('content')->nullable()->default(null);
            $table->unsignedInteger('user_id')->nullable()->default(null);
            $table->unsignedInteger('status')->nullable()->default(Post::STATUS_ACTIVE);
            $table->unsignedInteger('is_promotion')->nullable()->default(Post::STATUS_INACTIVE);
            $table->unsignedBigInteger('viewed')->nullable()->default(0);
            $table->foreign('lang_id')->references('id')->on('langs');
            $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
}
