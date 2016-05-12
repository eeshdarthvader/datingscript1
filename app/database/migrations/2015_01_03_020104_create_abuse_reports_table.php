<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbuseReportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('abuse_reports', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('reason',255);
			$table->integer('reporting_user_id');
			$table->integer('reported_user_id');
			$table->integer('status');
			$table->enum('entity',array('user','photo'));
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
		Schema::drop('abuse_reports');
	}

}
