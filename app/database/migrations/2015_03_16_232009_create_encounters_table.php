<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncountersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('encounters', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user');
			$table->integer('encounter_user');
			$table->enum('status', array('yes', 'no'));
			$table->enum('seen_status',array('new','seen'))->default('new');
			$table->enum('show_user_list',array('yes','no'))->default('yes');
			$table->enum('show_encounter_user_list',array('yes','no'))->default('yes');
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
