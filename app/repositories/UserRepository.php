<?php namespace Repositories;

use \User;
use \Sentry;
use \UserBotOnline;
use \Preference;
use \stdClass;
use \Photos;
use \BlockUser;
use \UserSetting;
use \URL;

class UserRepository {

	protected $photos;

	public function __construct(PhotoRepository $photos) {
		$this->photos = $photos;
	}


	/**
	 * @param 
	  $key
	 * @return string
	 */
	public  function activate_user($id){

		$user = Sentry::findUserById($id);
		$user->activated = 1;
		$user->save();

	}


	/**
	 * @param $id
	 */
	public  function de_activate_user($id){

		$user = Sentry::findUserById($id);
		$user->activated = 0;
		$user->save();
	}


	/**
	 * @param $id
	 */
	public  function delete_user($id){
		try
		{
			// Find the user using the user id
			$user = Sentry::findUserById($id);

			// Delete the user
			$user->delete();
		}
		catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			\Session::flash('error_msg', 'User was not found');
		}

	}

	/**
	 * @param array $vars
	 */
	public function createAdmin(array $vars){

		$user = Sentry::createUser(array(
			'email'     => $vars['email'],
			'password'  => $vars['password'],
			'first_name'  => $vars['first_name'],
			'activated' => true,
			'photo_certified' => 1,
		));

		if($user){
			$adminGroup = Sentry::findGroupByName('admin');
			$user->addGroup($adminGroup);
		}
	}

	/**
	 * @param $id
	 * @param $newPass
	 */
	public function updatePassword($id,$newPass){

		$user = Sentry::findUserById($id);
		$user->password = $newPass;
		$user->save();
	}


	public static function allUsers() {

		$group = Sentry::findGroupByName('user');
		$users = Sentry::findAllUsersInGroup($group);

		foreach($users as $user) {

			$credits = User::find($user->id)->credits();
			if($credits) {
				$user->credits = $credits->first();
			}

		}
		return $users;
	}

	public static function allUserBots() {

		$group = Sentry::findGroupByName('user_bot');
		$users = Sentry::findAllUsersInGroup($group);

		foreach($users as $user) {
			if(! UserBotOnline::where('user_id',$user->id)->get()->isEmpty()) {
			
				$user->online = true;

			} else {
				$user->online = false;
			} 
			$credits = User::find($user->id)->credits();
			if($credits) {
				$user->credits = $credits->first();
			}
		}

		return $users;
	}

	
	public static function UserNonVerifyPhoto() {

		$users = User::where('photo_certified','0')->where('photo_id','!=','')->get();
		return $users;
	}

	public function Verifyprofilephoto($id) {

		$user = User::find($id);
		$user->photo_certified = 1;
		$user->save();
	}

	public function Unsetprofilephoto($id) {

		$user = User::find($id);
		$user->photo_id = '';
		$user->save();
	}

	public function setProfilePhoto($photo_id,$id) {

		$user = Sentry::findUserById($id);
		$user->photo_id = $photo_id;
		$user->save();

	}

	public function createBotBlueprint(array $vars){

		$bot = Sentry::createUser(array(
			'email'     => $vars['email'],
			'password'  => $vars['password'],
			'first_name'  => $vars['first_name'],
			'dob'  => $vars['dob'],
			'gender'  => $vars['gender'],
			'country'  => $vars['country'],
			'photo_id'  => $vars['photo_id'],
			'activated' => true,
			'photo_certified' => 1,
		));

		if($bot){
			$group = Sentry::findGroupByName('bot_blueprint');
			$bot->addGroup($group);

			if($vars['photo_id'] != '') {
				$this->photos->create_photo(array('photo_id' => $vars['photo_id'], 'user_id' => $bot->id));
			}
		}
	}

	public function createUser(array $vars){

		$user = Sentry::createUser(array(
			'email'     => $vars['email'],
			'password'  => $vars['password'],
			'first_name'  => $vars['first_name'],
			'dob'  => $vars['birthDay'],
			'gender'  => $vars['gender'],
			'city'  => $vars['city'],
			'country'  => $vars['country'],
			'lat'  => $vars['lat'],
			'lng'  => $vars['lng'],
			'activated' => false,
		));

		if($user){
			$group = Sentry::findGroupByName('user');
			$user->addGroup($group);

			if(array_key_exists("here_to",$vars)) {

				$user_pref=new Preference;
				$user_pref->user_id=$user->id;
				if($user->gender=="male")
				{
					$user_pref->gender="female";
				}
				else
				{
					$user_pref->gender="male";
				}

				$user_pref->here_to = $vars['here_to'];
				
				$user_pref->min_age = 18;
				$user_pref->max_age = 32;
				$user_pref->dist = 50;

				$user_pref->save();

			}

			if(array_key_exists("activated",$vars)) {
				$user->activated = 1;
				$user->save();
			}
		}
		return $user;
	}


	public function botonline($id) {

		UserBotOnline::create(array('user_id' => $id));
	}

	public function botoffline($id) {

		UserBotOnline::where('user_id',$id)->delete();
	}

	public static function user($id) {

		return User::find($id);
	}

	public static function userPref($id) {

		$preference = Preference::where('user_id',$id)->first();

		return $preference;
	}

	public function saveLoctionPref($vars) {

		$prefernce = Preference::where('user_id',$vars['user_id'])->first();

		if(!$prefernce){

			$prefernce = new Preference;
		} 
		

		$prefernce->city = $vars['pref_city'];
		$prefernce->latitude = $vars['pref_lat'];
		$prefernce->longitude = $vars['pref_lng'];
		$prefernce->user_id = $vars['user_id'];
		$prefernce->dist = $vars['pref_dist'];
		$prefernce->save();

		$user = User::find($vars['user_id']);

		$user->city = $vars['pref_city'];
		$user->lat = $vars['pref_lat'];
		$user->lng = $vars['pref_lng'];
		$user->save();

	}

	public function saveHereTo($vars) {

		$prefernce = Preference::where('user_id',$vars['user_id'])->first();

		if(!$prefernce){

			$prefernce = new Preference;
		}
		
		//Gender - checking if both, if none is set then take opposit gender
		if(array_key_exists('pro_gender_male', $vars) && array_key_exists('pro_gender_female', $vars)) {

			$prefernce->gender= 'both';
		
		} else if(array_key_exists('pro_gender_male', $vars)){
		
			$prefernce->gender= 'male';
		
		} else if(array_key_exists('pro_gender_female', $vars)){
		
			$prefernce->gender= 'female';
		}

		$prefernce->here_to = $vars['pro_here_to'];
		
		$age_range=$vars['pro_age_range'];
		$ages = explode(';',$age_range);
		
		if(sizeof($ages) == 2) {
			$prefernce->min_age = $ages[0];
			$prefernce->max_age = $ages[1];
		}
		
		$prefernce->save();
	}

	public function updateGeneral($vars){

		$user = User::find($vars['user_id']);

		$user->first_name = $vars['name'];
		
		if($vars['birthDay'] != null) {
	
			$user->dob = $vars['birthDay'];

		}

		$user->gender = $vars['gender'];

		$user->save();

	}

	public function pageshellData($id){

		$user = User::find($id);

		return $user->photo_id;
	}
	
	public function uploadProfilePic($image,$id) {
		
		$user = User::find($id);
		
		if($image) {

	        $filename = $image->getClientOriginalName();

	        $filename = pathinfo($filename, PATHINFO_FILENAME);

	        $fullname = Str::slug(Str::random(8) . $filename) . '.' .$image->getClientOriginalExtension();

	        $upload = $image->move('uploads/photos', $fullname);

		 } else {
		 	$fullname = "";
		 }

        $user->photo_id = $fullname;
        $user->save();
        
        $photo = new Photos;
        $photo->user_id = $id;
        $photo->photo_id = $fullname;
        $photo->album = 'public';
        $photo->save();
	}
	
	
	public static function removeBlocked($user_ids,$id) {
		
		$iBlocked = BlockUser::where('user',$id)->lists('blocked_user');
		$blockedMe = BlockUser::where('blocked_user',$id)->lists('user');
		
		$blockedIds = array_merge($iBlocked,$blockedMe);
		
		$ids = array_diff($user_ids, $blockedIds);
		
		return $ids;
		
	}
	
	public static function removeInvisible($user_ids,$id) {
		
		$inivisible_users = UserSetting::whereIn('user_id',$user_ids)->where('invisible_mode_hide_presence',1)->lists('user_id');
		
		$ids = array_diff($user_ids, $inivisible_users);
		
		return $ids;
		
	}
	
	public static function checkBlocked($user_1,$user_2) {
		
		$blocked = BlockUser::where(function ($query) use ($user_1,$user_2) {
             $query->where('user', '=', $user_1)
                   ->orWhere('user', '=', $user_2);
       })->
       where(function ($query) use ($user_1,$user_2) {
             $query->where('blocked_user', '=', $user_1)
                   ->orWhere('blocked_user', '=', $user_2);
       })->first();
       
       if($blocked) {
	       return 'true';
       } else {
	       return 'false';
       }
    }
    
    public static function userObject($id,$visited_user) {
	    
	    $user = User::find($id);
	    
	    $visited_user = User::find($visited_user);
	    
	    $user_obj = new stdCLass();
	    
	    $user_obj->id = $visited_user->id;
	    if($visited_user->photo_id)
		    $user_obj->photo_url = URL::to('uploads/photos/'. $visited_user->photo_id);
		else 
		    $user_obj->photo_url = URL::to('uploads/app/male-thumbnail.jpg');
		    
		    
	    $user_obj->gender = $visited_user->display_gender();
	    $user_obj->name = $visited_user->first_name;
	    $user_obj->city = $visited_user->city;
	    $user_obj->fav = $visited_user->fav($id);
	    $user_obj->age = $visited_user->age;
	    return $user_obj;
	    
    } 
		 
}