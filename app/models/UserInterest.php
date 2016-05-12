<?php

class UserInterest extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_interests';

	protected $fillable = array('user_id','interest_id');

}