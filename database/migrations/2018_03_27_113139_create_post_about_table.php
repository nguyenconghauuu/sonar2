<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_about', function (Blueprint $table) {
            $table->increments('id');
            $table->string("po_title")->nullable();
            $table->string("po_slug")->nullable();
            $table->string("po_keywords")->nullable();
            $table->string("po_description")->nullable();
            $table->tinyInteger("po_hot")->nullable()->default(0);
            $table->tinyInteger("po_sort")->nullable()->default(0);
            $table->integer("po_active")->default(0)->nullable();
            $table->string("po_thunbar")->nullable();
            $table->longText("po_content")->nullable();
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
        Schema::dropIfExists('posts_about');
    }
}
