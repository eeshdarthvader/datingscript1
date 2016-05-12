<?php namespace Repositories;

use \Encounter;
use \Notification;
use \Matches;

class EncountersRepository {

	public static function mutual_attraction($userA, $userB){
		
		$matches = Matches::where(function ($query) use ($userA,$userB) {
             			$query->where('user_a', '=', $userB)->orWhere('user_a', '=', $userA);
       				})->where(function ($query) use ($userA,$userB) {
	   					$query->where('user_b', '=', $userA)->orWhere('user_b', '=', $userB);
      				})->first();
      	
      	return $matches;		
	}
	
	public static function userEncountered($encounter_user,$user) {
		
		$encounter = Encounter::where("encounter_user",$encounter_user)->where("user",$user)->first();
		$vars['matches'] = false;
		if($encounter) {
			$vars['encountered'] = true;
			$vars['status'] = $encounter->status;
			
			$matched = Encounter::where("user",$encounter_user)->where("encounter_user",$user)->where("status",'yes')->first();
			if($matched) {
				$vars['matches'] = true;
			}
		} else {
			$vars['encountered'] = false;
			$vars['status'] = false;
		}
		return $vars;
	}


	public function createEncounter($from_user,$to_user,$status) {

		$encounter = new Encounter;
		
		$encounter->user = $from_user;
		$encounter->encounter_user = $to_user;
		if($status == '1') {

			$encounter->status = 'yes';
			
			$notification = new Notification;
			$notification->user_id = $to_user;
			$notification->by_user_id = $from_user;
			
			$match = Encounter::where('user',$to_user)->where('encounter_user',$from_user)->where('status','yes')->first();
			
			if($match) {
				$notification->type = 'matches';
				
				$matches = new Matches;
				$matches->user_a = $from_user;
				$matches->user_b = $to_user;
				$matches->save();
			
			} else {
				$notification->type = 'liked';
			}
			$notification->save();
			
		} else {

			$encounter->status = 'no';
		}
		$encounter->save();
	}


	public function encounterUser($user_id) {

		$users = UserDashboardRepository::users($user_id);
		$users_count = count($users);
		$encounterUser = null;
			
		for($i = 0; $i< $users_count; $i++)
		{
			
			if( $users[$i]->id != $user_id && $users[$i]->photo_id) {
				$encounterUser = Encounter::where("user",$user_id)->where("encounter_user",$users[$i]->id)->first();

				if(!$encounterUser)
				{
					$userEncountered = Encounter::where('user',$users[$i]->id)->where('encounter_user',$user_id)->first();
					if($userEncountered) {
						$users[$i]->encountered = $userEncountered->status;
					} else {
						$users[$i]->encountered = 'no';
					}
					return $users[$i];
				}
				else{
					$encounterUser = null;
				}
			}
			
			
		}

		return $encounterUser;

	}
}