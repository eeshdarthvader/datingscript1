<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileFieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('profile_fields', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',255);
			$table->string('code',255);
			$table->integer('section_id');
			$table->enum('type',array('text','dropdown','checkbox'));
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
