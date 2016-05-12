<?php

class UserProfileField extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_profile_fields';

	protected $fillable = array('user_id', 'field_id','value');

}