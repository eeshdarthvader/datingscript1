<?php

class ProfileField extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'profile_fields';

	protected $fillable = array('name', 'code','section_id','type');

}