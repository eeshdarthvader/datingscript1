<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coupons', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title',50);
			$table->string('coupon_code',255);
			$table->integer('min_amount');
			$table->integer('discount_amount');
			$table->enum('discount_type', array('flat', 'percent'));
			$table->text('description');
			$table->dateTime('validity');
			$table->integer('per_user_limit');
			$table->integer('overall_limit');
			$table->enum('per_user_limit_option', array('limit', 'limitless'));
			$table->enum('overall_limit_option', array('limit', 'limitless'));
			$table->enum('status',array('enable','disable'));
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
		//
	}

}
