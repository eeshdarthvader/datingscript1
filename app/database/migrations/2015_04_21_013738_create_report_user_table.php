<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('report_users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user');
			$table->integer('reporting_user');
			$table->enum('status',array('seen','new'))->default('new');
			$table->text('reason');
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
