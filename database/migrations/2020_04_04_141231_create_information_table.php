<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_title', 255)->default('')->comment('title');
            $table->string('site_keywords')->default('')->comment('keywords');
            $table->string('site_description', 255)->default('')->comment('description');
            $table->string('author_name', 255)->default('')->comment('author_name');
            $table->string('author_intro', 255)->default('')->comment('author_intro');
            $table->string('author_avatar', 255)->default('')->comment('author_avatar');
            $table->longText('navigation')->nullable()->comment('navigation links');
//            $table->integer('user_id')->default(0)->comment('author id');
//            $table->integer('cate_id')->default(0)->comment('category id');
//            $table->integer('comment_count')->default(0)->comment('comment count');
//            $table->integer('read_count')->default(0)->comment('read count');
//            $table->tinyInteger('status')->default(1)->comment('status: 1-public;0-private');
//            $table->integer('sort')->default(0)->comment('sort');
//            $table->tinyInteger('is_top')->default(0)->comment('sticky to top');
            $table->integer('updated_at');
            $table->integer('created_at');
            $table->integer('deleted_at')->nullable();
//            $table->index('site_title');
//            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information');
    }
}
