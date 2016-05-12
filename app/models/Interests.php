<?php



class Interests extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'interests';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	protected $fillable = array('name', 'category','interest_category_id');


	public function user()
	{
		return $this->belongsTo('User');
	}


	public function interestcategory()
	{
		return $this->belongsTo('InterestCategory');
	}


}
