<?php

class UserBotOnline extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_bot_online';

	protected $fillable = array('user_id');

}