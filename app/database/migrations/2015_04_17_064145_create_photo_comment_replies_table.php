<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoCommentRepliesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photo_comment_replies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('commenting_user');
			$table->integer('user');
			$table->text('reply');
			$table->integer('comment_id');
			$table->enum('reply_delete',array('yes','no'))->default('no');
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
