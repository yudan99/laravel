<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration 
{
	public function up()
	{
		Schema::create('order_items', function(Blueprint $table) {
            $table->increments('id');

            $table->bigInteger('order_id')->unsigned()->index();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            $table->string('product_type')->index();

            $table->bigInteger('file_share_id')->unsigned()->nullable()->index();
            $table->foreign('file_share_id')->references('id')->on('file_shares')->onDelete('cascade');

            $table->bigInteger('course_id')->unsigned()->nullable()->index();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

            $table->bigInteger('mem_id')->unsigned()->nullable()->index();
            //$table->foreign('mem_id')->references('id')->on('mens')->onDelete('cascade');

            $table->integer('amount')->unsigned()->default(1);
            $table->decimal('price',5,2)->default(0);
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('order_items');
	}
}
