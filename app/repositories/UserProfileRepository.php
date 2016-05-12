<?php namespace Repositories;

use \Preference;
use \UserProfile;
use \User;
use \Session;
use \BlockUser;
use \UserSetting;
use \ProfileVisitor;
use \Notification;

class UserProfileRepository {

	public function visitedProfile($visited_user,$user) {

		//$user = User::find($visited_user);
		
		$vars['blocked']  = UserRepository::checkBlocked($user,$visited_user);
		
		if($vars['blocked'] == 'false') {
			
			$vars['user_custom_profile'] = ProfileRepository::user_custom_profile($visited_user);

			$vars['user_profile'] = ProfileRepository::user_profile($visited_user);
	
			$vars['interests'] =	InterestsRepository::userInterests($visited_user);
	
			$vars['photos'] = PhotoRepository::userPhotos($visited_user);
	
			$vars['comments'] = CommentsRepository::comments($visited_user,$user);
					/*$vars['prof_score']
	
					$vars['awards']
	
			*/
	
			$vars['user'] = UserRepository::user($visited_user);
	
			$vars['user_pref'] = UserRepository::userPref($visited_user);
			
			$encounter = EncountersRepository::userEncountered($visited_user,$user);
			$vars['user_encountered'] = $encounter['encountered'];
			$vars['encounter'] = $encounter['status'];
			$vars['matches'] = $encounter['matches'];
			
			if(!$vars['user_encountered']) {
				Session::put('encounter_user', $visited_user);
			}
			
			$settings  = UserSetting::where('user_id',$visited_user)->first();
			$vars['can_comment'] = 'true';
			if($settings){				
				if($settings->comment_on_photos == 'matches' && !$vars['matches']) {
					
					$vars['can_comment'] = 'false';
				} 
			}
					//$vars['visitors_today'] 
					//$vars['visitors_month']
	
					/* $vars['popularity']
	
					$vars['gifts']
	
					$vars['common_friends'] */
	
			$vars['common_interests'] =	InterestsRepository::commonInterestsCount($visited_user,$user);
 		}
	
 		
 		
		return $vars;
	}




	public function userProfile($id) {

		$vars['user_custom_profile'] = ProfileRepository::user_custom_profile($id);

		$vars['user_profile'] = ProfileRepository::user_profile($id);

		$vars['interests'] =	InterestsRepository::userInterests($id);

		$vars['photos'] = PhotoRepository::userPhotos($id);

		$vars['comments'] = CommentsRepository::comments($id,$id);
		
				/*$vars['prof_score']

				$vars['awards']

		*/

		/* $vars['photos_private']

			$vars['verification']

			$vars['my_friends']*/

		$vars['user'] = UserRepository::user($id);

		$vars['user_pref'] = UserRepository::userPref($id);

		return $vars;

	}

	public function profileVisitorNotification($visited_user,$user) {
		
			$settings  = UserSetting::where('user_id',$visited_user)->first();

			if($settings){
				if( $settings->invisible_mode_hide_visitor == '0') {
				
					$profile_visitor = ProfileVisitor::where('user',$user)->where('visited_user',$visited_user)->first();
					if($profile_visitor) {
						
						$profile_visitor->save();
					} else {
						$profile_visitor = new ProfileVisitor;
						$profile_visitor->user = $user;
						$profile_visitor->visited_user = $visited_user;
						$profile_visitor->save();
						
						$fav_notification = new Notification;
						$fav_notification->user_id = $user;
						$fav_notification->by_user_id = $visited_user;
						$fav_notification->type = 'profile_visitor';
						$fav_notification->save();
					}
				}
			}
	}
	
}

