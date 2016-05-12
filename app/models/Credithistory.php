<?php



class Credithistory extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'credithistory';

	protected $fillable = array('balance', 'amount','transaction_id','type','user_id');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	public function user()
	{
		return $this->belongsTo('User');
	}


}
