<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiels2filesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiels2files', function (Blueprint $table) {
            //$table->id();
            $table->bigIncrements('id');

            $table->unsignedBigInteger('fiel_id')->nullable()->index();
            $table->foreign('fiel_id')->references('id')->on('fiels')->onDelete('cascade');

            $table->unsignedBigInteger('file_id')->nullable()->index();
            $table->foreign('file_id')->references('id')->on('file_shares')->onDelete('cascade');

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
        Schema::dropIfExists('fiels2files');
    }
}
