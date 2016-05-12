<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileVisitorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profile_visitors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user');
			$table->integer('visited_user');
			$table->enum('status',array('new','seen'))->default('new');
			$table->enum('show_list',array('yes','no'))->default('yes');
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
