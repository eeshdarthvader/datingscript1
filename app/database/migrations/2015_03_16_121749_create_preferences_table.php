<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('preferences', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->enum('here_to', array('make_friends', 'chat', 'date'));
			$table->enum('gender', array('male', 'female','both'));
			$table->integer('min_age');
			$table->integer('max_age');
			$table->string('city',50);
			$table->integer('latitude');
			$table->integer('longitude');
			$table->integer('dist');
			$table->string('interest',255);
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
		
			Schema::drop('preferences');
		
	}

}
