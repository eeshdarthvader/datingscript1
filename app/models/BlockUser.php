<?php

class BlockUser extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'blocked_users';

	protected $fillable = array('user','blocked_user');

}