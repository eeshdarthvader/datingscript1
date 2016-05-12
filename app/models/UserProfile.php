<?php

class UserProfile extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_profile';

	protected $fillable = array('user_id','about_me','interested_in');

}