<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileSharesTable extends Migration 
{
	public function up()
	{
		Schema::create('file_shares', function(Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('sh_user_id')->unsigned()->index();
            $table->timeStamp('sh_time')->nullable();
            $table->timeStamp('sub_time')->nullable();
            $table->integer('file_verify')->unsigned()->default(0);
            $table->string('file_status')->default(0)->index();
            $table->string('file_type')->default(0);
            $table->string('file_introduction')->index();
            $table->string('fiels')->index()->default(0);
            $table->string('tags')->index()->default(0);
            $table->string('video_preview', 3072)->nullable();
            $table->string('pic_preview', 3072)->nullable();
            $table->string('tem_path', 1024)->nullable();
            $table->string('st_path', 1024)->nullable();
            $table->decimal('ini_price')->default(0);
            $table->decimal('cur_price')->default(0);
            $table->integer('read_count')->unsigned()->default(0);
            $table->integer('read_times')->unsigned()->default(0);
            $table->integer('collect_count')->unsigned()->default(0);
            $table->integer('forward_count')->unsigned()->default(0);
            $table->integer('pay_count')->unsigned()->default(0);
            $table->integer('down_count')->unsigned()->default(0);
            $table->integer('down_times')->unsigned()->default(0);
            $table->integer('email_count')->unsigned()->default(0);
            $table->integer('email_times')->unsigned()->default(0);
            $table->integer('order')->unsigned()->default(0);
            $table->text('excerpt')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('file_shares');
	}
}
