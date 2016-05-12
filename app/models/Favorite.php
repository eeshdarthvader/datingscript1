<?php

class Favorite extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'favorites';

	protected $fillable = array('user','fav_user');

}