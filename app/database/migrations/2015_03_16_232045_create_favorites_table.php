<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('favorites', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user');
			$table->integer('fav_user');
			$table->enum('status',array('new','seen'))->default('new');
			$table->enum('show_user_list',array('yes','no'))->default('yes');
			$table->enum('show_fav_user_list',array('yes','no'))->default('yes');
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
