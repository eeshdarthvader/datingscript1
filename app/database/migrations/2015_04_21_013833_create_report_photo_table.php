<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportPhotoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('report_photos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user');
			$table->integer('reporting_user');
			$table->integer('photo_id');
			$table->enum('status',array('seen','new'))->default('new');
			$table->enum('reason',array('inappropriate_photo','celebrity_photo','other'));
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
