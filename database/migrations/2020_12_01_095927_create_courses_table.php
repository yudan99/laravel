<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
	public function up()
	{
		Schema::create('courses', function(Blueprint $table) {
            $table->id();
            $table->string('course_name')->index();
            $table->string('fiels')->nullable();
            $table->string('tags')->nullable();
            $table->string('cover')->nullable();
            $table->string('author')->nullable();
            $table->longText('course_introduce')->nullable();
            $table->decimal('ini_price')->default(0);
            $table->decimal('cur_price')->default(0);
            $table->boolean('is_open')->default(0);
            $table->integer('read_count')->unsigned()->default(0);
            $table->integer('read_times')->unsigned()->default(0);
            $table->integer('collect_count')->unsigned()->default(0);
            $table->integer('forward_count')->unsigned()->default(0);
            $table->integer('pay_count')->unsigned()->default(0);
            $table->integer('clock_count')->unsigned()->default(0);
            $table->integer('comment_count')->unsigned()->default(0);
            $table->integer('problem_count')->unsigned()->default(0);
            $table->integer('reply_count')->unsigned()->default(0);
            $table->string('care')->nullable();
            $table->integer('order')->unsigned()->nullable();
            $table->text('excerpt')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('courses');
	}
}
