<?php

class ProfileVisitor extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'profile_visitors';

	protected $fillable = array('user','visited_user');

}