<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Cartalyst\Sentry\Users\Eloquent\User as SentryModel;
use Jenssegers\Date\Date as Date;

class User extends SentryModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	
	
	protected $appends = array('age');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function photos()
	{
		return $this->hasMany('Photos');
	}


	public function credits()
	{
		return $this->hasMany('Credits');
	}

	public function preferences()
	{
		return $this->hasOne('Preference');
	}



	public function interests()
	{
		return $this->hasMany('Interests');
	}


	public function profile_url(){

		return URL::to("/user/$this->id");
	}


	public function getAgeAttribute() {
		$b = new Date($this->dob);
		return $b->age;
		
	}
	
	public function display_gender() {
		
		if($this->gender == 'male') {
			return 'M';
		} else {
			return "F";
		}
	}

	public function thumbnailPhoto(){

		if($this->photo_id){

			return URL::to("uploads/photos/" .$this->photo_id);
		}
		else{

			return URL::to('uploads/app/male-thumbnail.jpg');
		}


	}
	
	public function fav($id) {
		
		$fav = Favorite::where('fav_user',$this->id)->where('user',$id)->first();
		if($fav)
			return true;
		else 
			return false;	
		
	}




}
