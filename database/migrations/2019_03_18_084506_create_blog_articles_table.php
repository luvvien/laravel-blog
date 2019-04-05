<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('title', 255)->default('')->comment('title');
            $table->string('keywords')->default('')->comment('keywords');
            $table->string('description', 255)->default('')->comment('description');
            $table->longText('markdown')->nullable()->comment('markdown content');
            $table->integer('user_id')->default(0)->comment('author id');
            $table->integer('cate_id')->default(0)->comment('category id');
            $table->integer('comment_count')->default(0)->comment('comment count');
            $table->integer('read_count')->default(0)->comment('read count');
            $table->tinyInteger('status')->default(1)->comment('status: 1-public;0-private');
            $table->integer('sort')->default(0)->comment('sort');
            $table->tinyInteger('is_top')->default(0)->comment('sticky to top');
            $table->integer('updated_at');
            $table->integer('created_at');
            $table->integer('deleted_at')->nullable();
            $table->index('title');
            $table->index('cate_id');
            $table->index('user_id');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_articles');
    }
}
