<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_pages', function (Blueprint $table) {
            $table->id();
            $table->string('header_image');
            $table->string('header_desc');
            $table->string('description');
            $table->string('includes_titles');
            $table->string('includes_icons');
            $table->longText('content');
            $table->string('share_links');
            $table->string('average_rate');
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
        Schema::dropIfExists('courses_pages');
    }
}
