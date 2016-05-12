<?php

class Gifts extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'gifts';

	protected $fillable = array('name', 'icon_id','price','gender');



}
