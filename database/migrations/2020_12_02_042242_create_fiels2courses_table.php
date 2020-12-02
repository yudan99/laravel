<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiels2coursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiels2courses', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('fiel_id')->nullable()->index();
            $table->foreign('fiel_id')->references('id')->on('fiels')->onDelete('cascade');

            $table->unsignedBigInteger('course_id')->nullable()->index();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

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
        Schema::dropIfExists('fiels2courses');
    }
}
