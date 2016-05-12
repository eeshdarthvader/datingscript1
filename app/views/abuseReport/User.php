<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Cartalyst\Sentry\Users\Eloquent\User as SentryModel;

class User extends SentryModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

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



	public function interests()
	{
		return $this->hasMany('Interests');
	}


	public function profile_url(){

		return URL::to("/profile/$this->id");
	}


	public function thumbnailPhoto(){

		if($this->photo_id != 0){

			return URL::to("uploads/photos/$this->photo_id");
		}
		else{

			if($this->gender == 1)
			{
				return URL::to("assets/images/male-thumbnail.jpg");
			}
			else{
				return URL::to("assets/images/female-thumbnail.jpg");
			}
		}


	}




}
