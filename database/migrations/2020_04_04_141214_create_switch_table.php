<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSwitchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('switch', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->default('')->comment('name');
            $table->tinyInteger('status')->default(1)->comment('status: 1-open;0-close');
            $table->longText('extra')->nullable()->comment('extra setting');
            $table->integer('updated_at');
            $table->integer('created_at');
            $table->integer('deleted_at')->nullable();
            //            $table->index('site_title');
            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('switch');
    }
}
