<?php

class ProfileFieldSection extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'profile_field_sections';

	protected $fillable = array('name', 'code');

	
}