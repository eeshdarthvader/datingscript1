<?php

class Preference extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'preferences';

	protected $fillable = array('user_id', 'here_to','gender','min_age','max_age','city','latitude','longitude','dist','interest');

	public function user()
	{
		return $this->belongsTo('User','user_id');
	}


	public function here_to_display() {
		
		$here_to = "";
		
		if($this->here_to == 'make_friends') {
			$here_to = "Make friends";
		} else {
			$here_to = $this->here_to;
		}
		
		$here_to = $here_to . " with ";
		if($this->gender == 'both') {
			$here_to = $here_to . "males and females";
		} else {
			$here_to = $here_to . $this->gender; 
		}
		
		$here_to = $here_to . " between ages " . $this->min_age . "~" . $this->max_age;
		
		
		return $here_to;
	}
	
}