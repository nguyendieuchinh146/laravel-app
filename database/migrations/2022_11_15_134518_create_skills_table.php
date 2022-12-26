<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('courses_id')->unsigned();
            $table->integer('lessons_id')->unsigned();
            $table->integer('category_groups_id')->unsigned();
            $table->integer('categories_id')->unsigned();
            $table->string('code', 50);
            $table->text('title');
            $table->text('description');
            $table->string('question_display', 50);
            $table->string('answer_display', 50);
            $table->tinyInteger('status');
            $table->timestamps();
            $table->text('types');
            $table->string('image');
            $table->string('params');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
    }
};
