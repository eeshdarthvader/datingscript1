<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('credithistory', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('balance');
			$table->integer('amount');
			$table->string('type',200);
			$table->string('transaction_id',64);
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
		Schema::drop('credithistory');
	}

}
