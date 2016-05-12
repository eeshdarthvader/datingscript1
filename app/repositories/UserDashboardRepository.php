<?php namespace Repositories;

use \Preference;
use \User;
use \UserInterest;
use \Interests;
use Jenssegers\Date\Date as Date;

class UserDashboardRepository {

	public static function users($id) {


		$user_pref=Preference::where('user_id','=',$id)->first();
		$user=User::find($id);

		if(!$user_pref)
		{
			$user_pref=new Preference;
			$user_pref->user_id=$id;
			$user_pref->save();
		}

		UserDashboardRepository::setDefaultPref($id);

		$date_min_age = new Date('-'.$user_pref->min_age .'year');

		$date_max_age = new Date('-'.$user_pref->max_age .'year');

		$min_lat=UserDashboardRepository::getLat($user_pref->latitude,$user_pref->dist,180);
		$max_lat=UserDashboardRepository::getLat($user_pref->latitude,$user_pref->dist,0);
		
		$min_lng=UserDashboardRepository::getLong($user_pref->longitude,$user_pref->latitude,$user_pref->dist,270);
		$max_lng=UserDashboardRepository::getLong($user_pref->longitude,$user_pref->latitude,$user_pref->dist,90);

		$users_list = User::where('city',$user_pref->city)->whereBetween('lat', array($min_lat, $max_lat))->whereBetween('lng', array($min_lng, $max_lng))->whereBetween('dob', array($date_max_age, $date_min_age));

		if($user_pref->gender=="male")
		{
			$users_list=$users_list->where('gender','=','male');
		}
		elseif($user_pref->gender=="female")
		{
			$users_list=$users_list->where('gender','=','female');
		}

		$user_interet = 0;

		if($user_pref->interest)
		{
			$user_interet = 1;
			$interest_id=Interests::where('name','=',$user_pref->interest)->first();
			if($interest_id)
			{
				$users_interest_ids=UserInterest::where('interest_id','=',$interest_id)->lists('user_id');
				
			} else {
				$users_interest_ids = array();
			}
		}

		$user_here_to_ids = Preference::where('here_to',$user_pref->here_to)->lists('user_id');

		if($user_interet) {

			$user_ids = array_intersect($users_interest_ids, $user_here_to_ids);
 		} else {
 			$user_ids = $user_here_to_ids;
 		}
 		
 		$user_ids = UserRepository::removeBlocked($user_ids,$id);
 		$user_ids = UserRepository::removeInvisible($user_ids,$id);

 		if(count($user_ids)) 
	 		$users_list = $users_list->whereIn('id', $user_ids)->get();
	 	else 
	 		$users_list = $users_list->get();
	 		
 		return $users_list;
		
	}


	protected static function getLat($lat,$dist,$bearing)
	{
		$deg= $bearing * pi() / 180;
		$lat1=($lat)*pi()/180;
		$dist=$dist/6371;
		$lat2= asin( sin($lat1)*cos($dist) +
						  cos($lat1)*sin($dist)*cos($deg) );
		$lat_final= $lat2 * 180 / pi();
		return $lat_final;
		
	}

	protected static function getLong($lng,$lat,$dist,$bearing)
	{
		$deg= $bearing * pi() / 180;
		$long1=($lng)*pi()/180;
		$lat1=($lat)*pi()/180;
		$dist=$dist/6371;
		$lat2=UserDashboardRepository::getLat($lat,$dist,$bearing);
		$long2 = $long1 + atan2(sin($deg)*sin($dist)*cos($lat1),
	                          cos($dist)-sin($lat1)*sin($lat2));		
		$long_final= $long2 * 180 / pi();
		return $long_final;
	}


	protected static function setDefaultPref($id) {

		$user_pref=Preference::where('user_id','=',$id)->first();
		$user=User::find($id);

		if(!$user_pref->gender)
		{
			
			if($user->gender=="male")
			{
				$user_pref->gender="female";
			}
			else
			{
				$user_pref->gender="male";
				$users_gender=User::where('gender','=','male')->get();
			}
			
		}
		if(!isset($user_pref->latitude)) 
		{
			$user_pref->latitude=$user->lat;
		}
		if(!isset($user_pref->longitude)) 
		{
			$user_pref->longitude=$user->lng;
		}
		if(empty($user_pref->city))
		{
			$user_pref->city=$user->city;
		}
		if(empty($user_pref->dist))
		{
			$user_pref->dist=50;
		}
		if(empty($user_pref->here_to))
		{
			$user_pref->here_to="make_friends";
		}
		if(empty($user_pref->min_age))
		{
			$user_pref->min_age=18;
		}
		if(empty($user_pref->max_age))
		{
			$user_pref->max_age=32;
		}

		$user_pref->save();
	}


	public function getinterests($term)
	{
		$matches=array();
		$arr_names=array();
		$interests=Interests::all();


		foreach($interests as $interest)
		{
			$name=$interest->name;
			$arr_names[$name]=$name;

		}
		foreach($arr_names as $item)
		{
			if(preg_match('%'.$term.'%',$item))
				{
					$matches[$item]=$item;
				}

		}
		return $matches;
	}


	public function filterusers(array $vars,$id){

		$user=User::find($id);
		
		//saving all new preferences
		$user_pref=Preference::where('user_id','=',$id)->first();

		if(!$user_pref) {
			$user_pref = new Preference;
			$user_pref->user_id = $id;
		}

		$user_pref->interest=$vars['interests_search'];
		$user_pref->here_to=$vars['here_to'];
		$user_pref->dist=$vars['dist_range'];

		//Min and Max ages
		$age_range=$vars['age_range'];
		$ages = explode(';',$age_range);
		
		if(sizeof($ages) == 2) {
			$user_pref->min_age = $ages[0];
			$user_pref->max_age = $ages[1];
		}

		


		//Gender - checking if both, if none is set then take opposit gender
		if(array_key_exists('gender_male', $vars) && array_key_exists('gender_female', $vars)) {

			$user_pref->gender= 'both';
		
		} else if(array_key_exists('gender_male', $vars)){
		
			$user_pref->gender= 'male';
		
		} else if(array_key_exists('gender_female', $vars)){
		
			$user_pref->gender= 'female';
		}
		
		//setting city
		if(!empty($vars['city']))
		{
			$user_pref->latitude=$vars['lat'];
			$user_pref->longitude=$vars['lng'];
			$user_pref->city=$vars['city'];
			$user->city = $vars['city'];
			$user->lng = $vars['lng'];
			$user->lat = $vars['lat'];
			$user->save();
		}

		$user_pref->save();
	}	

}

