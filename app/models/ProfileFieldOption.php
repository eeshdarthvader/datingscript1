<?php

class ProfileFieldOption extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'profile_field_options';

	protected $fillable = array('name', 'field_id','code');

}