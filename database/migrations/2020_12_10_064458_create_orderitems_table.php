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
            $table->string('product_type')->index();
            $table->bigInteger('file_share_id')->unsigned()->nullable()->index();
            $table->bigInteger('course_id')->unsigned()->nullable()->index();
            $table->bigInteger('mem_id')->unsigned()->nullable()->index();
            $table->integer('amount')->unsigned()->default(1);
            $table->decimal('price')->default(0);
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('order_items');
	}
}
