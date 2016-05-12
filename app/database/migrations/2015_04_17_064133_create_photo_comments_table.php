<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photo_comments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('commenting_user');
			$table->integer('user');
			$table->text('comment');
			$table->enum('album',array('public','friends','private'));
			$table->enum('comment_delete',array('yes','no'))->default('no');
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
