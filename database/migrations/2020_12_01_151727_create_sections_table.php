<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
	public function up()
	{
		Schema::create('sections', function(Blueprint $table) {
            $table->id();
            $table->bigInteger('chapter_id')->unsigned()->index();
            $table->string('section_name')->nullable();
            $table->longText('section_introduce')->nullable();
            $table->longText('section_detail')->nullable();
            $table->boolean('is_open')->default(0);
            $table->boolean('is_charge')->default(1);
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
		Schema::drop('sections');
	}
}
