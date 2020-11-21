<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFielsTable extends Migration
{
	public function up()
	{
		Schema::create('fiels', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('parent_id')->nullable()->index();
            $table->foreign('parent_id')->references('id')->on('fiels')->onDelete('cascade');
            $table->boolean('is_directory');
            $table->unsignedInteger('level');
            $table->string('path');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('fiels');
	}
}
