<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponCodesTable extends Migration 
{
	public function up()
	{
		Schema::create('coupon_codes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code')->unique()->index();
            $table->string('type')->index();
            $table->decimal('value');
            $table->integer('total')->unsigned();
            $table->integer('used')->unsigned()->default(0);
            $table->decimal('min_amount',10,2);
            $table->datetime('not_before')->nullable();
            $table->datetime('not_after')->nullable();
            $table->boolean('enabled');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('coupon_codes');
	}
}
