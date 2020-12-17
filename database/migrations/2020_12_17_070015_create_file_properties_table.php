<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_properties', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('file_share_id');
            $table->foreign('file_share_id')->references('id')->on('file_shares')->onDelete('cascade');

            $table->string('name');
            $table->string('value');

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
        Schema::dropIfExists('file_properties');
    }
}
