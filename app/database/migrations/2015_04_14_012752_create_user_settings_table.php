<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_settings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('show_online')->default(1);
			$table->integer('show_distance')->default(1);
			$table->enum('view_profile',array('anyone','members'))->default('anyone');
			$table->integer('discoverable')->default(1);
			$table->integer('share_my_profile')->default(1);
			
			$table->string('language');
			$table->enum('comment_on_photos',array('anyone','matches'))->default('anyone');
			
			$table->integer('email_notify_msg')->default(1);
			$table->integer('email_notify_visitors')->default(1);
			$table->integer('email_notify_likes')->default(1);
			$table->integer('email_notify_gifts')->default(1);
			$table->integer('email_notify_fav')->default(1);
			$table->integer('cell_notify_msg')->default(1);
			$table->integer('cell_notify_visitors')->default(1);
			$table->integer('cell_notify_likes')->default(1);
			$table->integer('cell_notify_gifts')->default(1);
			$table->integer('cell_notify_fav')->default(1);

			$table->enum('msg_not_interested',array('no_action','delete_all_msg','block'))->default('delete_all_msg');
			
			$table->integer('invisible_mode_hide_presence')->default(0);
			$table->integer('invisible_mode_hide_visitor')->default(0);
			$table->integer('invisible_mode_hide_super_powers')->default(0);
			
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
