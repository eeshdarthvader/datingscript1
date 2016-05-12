<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Update Users Table

		Schema::table('users', function(Blueprint $table)
		{
			$table->string('username',255);
			$table->enum('gender', array('male', 'female'));
			$table->date('dob');
			$table->string('photo_id');
			$table->string('city',255);
			$table->string('country',255);
			$table->string('language',3);
			$table->float('lat',10,6);
			$table->float('lng',10,6);
			$table->string('last_ip',255);
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
