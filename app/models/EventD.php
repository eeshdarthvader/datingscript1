<?php

class EventD extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'events';

	protected $fillable = array('title', 'icon_id','interest_category_id','content','writer');

	public function interestcategory()
	{
		return $this->belongsTo('InterestCategory', 'interest_category_id');
	}

}
