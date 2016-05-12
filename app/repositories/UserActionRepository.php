<?php namespace Repositories;

use \BlockUser;
use \Favorite;
use \User;
use \Encounter;
use \Friend;
use \ProfileVisitor;
use \Notification;
use \ReportUser;
use \ReportPhoto;
use \Matches;

class UserActionRepository {
	
	public static function blockedUsers($id) {
		
		$user_ids = BlockUser::where('user',$id)->lists('blocked_user');
	
		if(count($user_ids) > 0) {
		
			$users = User::whereIn('id',$user_ids)->get();		
		} else {
			$users = array();
		}		
		return $users;		
	}
	
	public static function blockUser($vars) {
		
		$block_user = new BlockUser;
		$block_user->user = $vars['id'];
		$block_user->blocked_user = $vars['user_id'];
		$block_user->save();
	}
	
	public static function unblockUser($vars) {

		$block_user = BlockUser::where('user',$vars['id'])->where('blocked_user',$vars['user_id'])->delete();
	}
	
	
	
	
	public static function interestedUsers($id) {
			
		$user_ids = Favorite::where('fav_user',$id)->where('show_fav_user_list','yes')->lists('user');
		$user_ids = UserRepository::removeBlocked($user_ids,$id);
		$lists['visible'] = User::whereIn('id',$user_ids)->get();
		
		Notification::where('user_id',$id)->where('type','interested')->delete();
	
		$hidden_user_ids = Favorite::where('fav_user',$id)->where('show_fav_user_list','no')->lists('user');
		$hidden_user_ids = UserRepository::removeBlocked($hidden_user_ids,$id);
		$lists['hidden'] = User::whereIn('id',$hidden_user_ids)->get();		
		
		return $lists;		
	}
	
	public static function favoriteUsers($id) {
		
		$user_ids = Favorite::where('user',$id)->where('show_user_list','yes')->lists('fav_user');
		$user_ids = UserRepository::removeBlocked($user_ids,$id);
		$lists['visible'] = User::whereIn('id',$user_ids)->get();		
		
		$hidden_user_ids = Favorite::where('user',$id)->where('show_user_list','no')->lists('fav_user');
		$hidden_user_ids = UserRepository::removeBlocked($hidden_user_ids,$id);
		$lists['hidden'] = User::whereIn('id',$hidden_user_ids)->get();		
		
		return $lists;		
	}
	
	public static function favoriteuser($vars) {
		
		$favorite_user = new Favorite;
		$favorite_user->user = $vars['id'];
		$favorite_user->fav_user = $vars['user_id'];
		$favorite_user->save();
		
		$fav_notification = new Notification;
		$fav_notification->user_id = $vars['user_id'];
		$fav_notification->by_user_id = $vars['id'];
		$fav_notification->type = 'interested';
		$fav_notification->save();
		
		return "success";
	}
	
	public static function unfavoriteuser($vars) {

		$favorite_user = Favorite::where('user',$vars['id'])->where('fav_user',$vars['user_id'])->delete();
		$fav_notification = Notification::where('user_id',$vars['user_id'])->where('by_user_id',$vars['id'])->where('type','interested')->delete();
		
		return "success";
	}
	
	
	
	
	public static function matchedUsers($id) {
		
		$user_ids_1 = Matches::where('user_a',$id)->where('show_user_a_list','yes')->lists('user_a');
		$user_ids_2 = Matches::where('user_b',$id)->where('show_user_b_list','yes')->lists('user_b');
		$user_ids = array_merge($user_ids_1,$user_ids_2);

		$user_ids = UserRepository::removeBlocked($user_ids,$id);
		$lists['visible'] = User::whereIn('id',$user_ids)->get();
				
		Notification::where('user_id',$id)->where('type','matches')->delete();
		
		$user_ids_1_hidden = Matches::where('user_a',$id)->where('show_user_a_list','no')->lists('user_a');
		$user_ids_2_hidden = Matches::where('user_b',$id)->where('show_user_b_list','no')->lists('user_b');
		$hidden_user_ids = array_merge($user_ids_1_hidden,$user_ids_2_hidden);

		$hidden_user_ids = UserRepository::removeBlocked($hidden_user_ids,$id);				
		$lists['hidden'] = User::whereIn('id',$hidden_user_ids)->get();

		return $lists;		
	}
	
	
	
	
	public static function profileVisitors($id) {
		
		$user_ids = ProfileVisitor::where('visited_user',$id)->where('show_list','yes')->lists('user');
		$user_ids = UserRepository::removeBlocked($user_ids,$id);
		$lists['visible'] = User::whereIn('id',$user_ids)->get();
		
		Notification::where('user_id',$id)->where('type','profile_visitor')->delete();
	
		$hidden_user_ids = ProfileVisitor::where('user',$id)->where('show_list','no')->lists('visited_user');
		$hidden_user_ids = UserRepository::removeBlocked($hidden_user_ids,$id);
		$lists['hidden'] = User::whereIn('id',$hidden_user_ids)->get();		
		
		return $lists;		
	}
	
	

	public static function likedYou($id) {
		
		$user_ids = Encounter::where('encounter_user',$id)->where('status','yes')->where('show_user_list','yes')->lists('user');
		$user_ids = UserRepository::removeBlocked($user_ids,$id);
		$lists['visible'] = User::whereIn('id',$user_ids)->get();
		
		Notification::where('user_id',$id)->where('type','liked')->delete();
				
		$hidden_user_ids = Encounter::where('encounter_user',$id)->where('status','yes')->where('show_user_list','no')->lists('user');
	
		$hidden_user_ids = UserRepository::removeBlocked($hidden_user_ids,$id);
		$lists['hidden'] = User::whereIn('id',$hidden_user_ids)->get();		
		
		return $lists;		
	}
	
	public static function likedUsers($id) {
		
		$user_ids = Encounter::where('user',$id)->where('status','yes')->where('show_encounter_user_list','yes')->lists('encounter_user');
	
		$user_ids = UserRepository::removeBlocked($user_ids,$id);
		$lists['visible'] = User::whereIn('id',$user_ids)->get();		

		
		$hidden_user_ids = Encounter::where('user',$id)->where('status','yes')->where('show_encounter_user_list','no')->lists('encounter_user');
	
		$hidden_user_ids = UserRepository::removeBlocked($hidden_user_ids,$id);
		$lists['hidden'] = User::whereIn('id',$hidden_user_ids)->get();

		return $lists;		
	}
	
	public static function userFriends($id) {
		
		$user_ids_1 = Friend::where('user_1',$id)->lists('User_2');		
		$user_ids_2 = Friend::where('user_2',$id)->lists('User_1');
		$user_ids = array_merge($user_ids_1,$user_ids_2);
		
		$user_ids = UserRepository::removeBlocked($user_ids,$id);
		
		if(count($user_ids) > 0) {
		
			$users = User::whereIn('id',$user_ids)->get();		
		} else {
			$users = array();
		}
		
		return $users;		
	}
	
	public static function reportUser($vars) {
		
		$report = new ReportUser;
		$report->reporting_user = $vars['id'];
		$report->user = $vars['user_id'];
		$report->reason = $vars['reason'];
		$report->save();
	}
	
	public static function reportPhoto($vars) {
		
		$report = new ReportPhoto;
		$report->reporting_user = $vars['id'];
		$report->user = $vars['user_id'];
		$report->photo_id = $vars['photo_id'];
		if(array_key_exists('reason',$vars)) {
			$report->reason = $vars['reason'];
		}			
		$report->save();
	}
	
	public static function changeShowList($vars) {
	
		if($vars['list_name'] == 'profile') {
			
			$profile_visitor = ProfileVisitor::where('visited_user',$vars['id'])->where('user',$vars['user_id'])->first();
			if($profile_visitor) {
				$profile_visitor->show_list = $vars['show'];
				$profile_visitor->save();

			}
		} elseif($vars['list_name'] == 'fav') {
			
			$fav = Favorite::where('user',$vars['id'])->where('fav_user',$vars['user_id'])->first();
			if($fav) {
				$fav->show_user_list = $vars['show'];
				$fav->save();
			}
			
		} elseif($vars['list_name'] == 'interested') {
			
			$fav = Favorite::where('user',$vars['user_id'])->where('fav_user',$vars['id'])->first();
			if($fav) {
				$fav->show_fav_user_list = $vars['show'];
				$fav->save();
			}
			
		}  elseif($vars['list_name'] == 'liked' || $vars['list_name'] == 'matches') {
			
			$liked = Encounter::where('user',$vars['id'])->where('encounter_user',$vars['user_id'])->first();
			if($liked) {
				$liked->show_user_list = $vars['show'];
				$liked->save();
			}
			
		} elseif($vars['list_name'] == 'likes') {
			
			$likes = Encounter::where('encounter_user',$vars['id'])->where('user',$vars['user_id'])->first();
			if($likes) {
				$likes->show_encounter_user_list = $vars['show'];
				$likes->save();
			}
			
		} else if($vars['list_name'] == 'matches') {
			
			$matches = Matches::where('user_a',$vars['id'])->where('user_b',$vars['user_id'])->first();
			if($matches) {
				$matches->show_user_a_list = $vars['show'];
				$matches->save();
			} else {
				$matches = Matches::where('user_b',$vars['id'])->where('user_a',$vars['user_id'])->first();
				if($matches) {
					$matches->show_user_b_list = $vars['show'];
					$matches->save();
				}
			}
			
		}		
	}
	
	public static function leftMenuVals($id){
		
		$vars['blocked_count'] = BlockUser::where('user',$id)->count();
		
		$visitor_ids = ProfileVisitor::where('visited_user',$id)->lists('user');
		$vars['visitor_count']  = count(UserRepository::removeBlocked($visitor_ids,$id));
		
		$fav_ids = Favorite::where('user',$id)->lists('fav_user');
		$vars['fav_count']  = count(UserRepository::removeBlocked($fav_ids,$id));
		
		$interested_ids = Favorite::where('fav_user',$id)->lists('user');
		$vars['interested_count']  = count(UserRepository::removeBlocked($interested_ids,$id));
	
		$user_ids_1_hidden = Matches::where('user_a',$id)->lists('user_a');
		$user_ids_2_hidden = Matches::where('user_b',$id)->lists('user_b');
		$hidden_user_ids = array_merge($user_ids_1_hidden,$user_ids_2_hidden);

		$vars['matches_count'] = count(UserRepository::removeBlocked($hidden_user_ids,$id));
		
		$user_ids_1 = Friend::where('user_1',$id)->lists('User_2');
		$user_ids_2 = Friend::where('user_2',$id)->lists('User_1');
		$user_ids = array_merge($user_ids_1,$user_ids_2);
		$user_ids = UserRepository::removeBlocked($user_ids,$id);
		$vars['friends_count'] = count($user_ids);
		
		$vars['visitor_new'] = Notification::where('user_id',$id)->where('type','profile_visitor')->count();
		$vars['interested_new'] = Notification::where('user_id',$id)->where('type','interested')->count();
		$vars['matches_new'] = Notification::where('user_id',$id)->where('type','matches')->count();	
		$vars['liked_new'] = Notification::where('user_id',$id)->where('type','liked')->count();		
			
		return $vars;
		
	}

}