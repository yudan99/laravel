<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration 
{
	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
            $table->increments('id');
            $table->string('order_no')->index();

            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->decimal('total_amount',5,2)->default(0);
            $table->decimal('deal_amount',5,2)->default(0);
            $table->string('deal_type')->index();
            $table->timeStamp('paid_at')->nullable();
            $table->string('paid_type')->index();
            $table->string('paid_no')->nullable();
            $table->string('refund_status');
            $table->string('refund_no')->nullable();
            $table->boolean('is_closed')->default(0);
            $table->boolean('is_open')->default(1);
            $table->text('remake')->nullable();
            $table->text('extra')->nullable();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('orders');
	}
}
