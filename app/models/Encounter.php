<?php

class Encounter extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'encounters';

	protected $fillable = array('user','encounter_user','status');

}