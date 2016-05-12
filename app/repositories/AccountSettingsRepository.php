<?php namespace Repositories;

use \User;
use \UserSetting;

class AccountSettingsRepository {

	public static function userSettings($id) {
		
		$settings = UserSetting::where('user_id',$id)->first();
		
		if(!$settings) {
			
			$settings = new UserSetting();
			$settings->user_id = $id;
			$settings->save();
			$settings = UserSetting::where('user_id',$id)->first();
		}	
		
		return $settings;
	}

	public static function privacy($id,$input) {
		
		$settings = UserSetting::where('user_id',$id)->first();
		
		$settings->show_online = $input['show_online'];
		$settings->show_distance = $input['show_distance'];
		$settings->view_profile = $input['view_profile'];
		$settings->discoverable = $input['discoverable'];
		$settings->invisible_mode_hide_presence = $input['discoverable'];
		$settings->share_my_profile = $input['share_my_profile'];
		
		$settings->save();
		
		return;
		
	}

	public static function photosVideos($id,$input) {
		
		$settings = UserSetting::where('user_id',$id)->first();
		
		$settings->comment_on_photos = $input['comment_on_photos'];
		
		$settings->save();
		
		return;
		
	}
	
	public static function notifications($id,$input) {
		
		$settings = UserSetting::where('user_id',$id)->first();
		
		$settings->email_notify_msg = $input['email_notify_msg'];
		$settings->cell_notify_msg = $input['cell_notify_msg'];
		$settings->email_notify_visitors = $input['email_notify_visitors'];
		$settings->cell_notify_visitors = $input['cell_notify_visitors'];
		$settings->email_notify_likes = $input['email_notify_likes'];
		$settings->cell_notify_likes = $input['cell_notify_likes'];
		$settings->email_notify_gifts = $input['email_notify_gifts'];
		$settings->email_notify_fav = $input['email_notify_fav'];
		$settings->cell_notify_fav = $input['cell_notify_fav'];
		
		$settings->save();
		
		return;
		
	}
	
	public static function messageSettings($id,$input) {
		
		$settings = UserSetting::where('user_id',$id)->first();
		
		$settings->msg_not_interested = $input['msg_not_interested'];
		
		$settings->save();
		
		return;
		
	}

	public static function invisibleMode($id,$input) {
		
		$settings = UserSetting::where('user_id',$id)->first();
		
		if(array_key_exists('invisible_mode_hide_presence', $input)) {
			$settings->invisible_mode_hide_presence = 1;
			
		} else {
			$settings->invisible_mode_hide_presence = 0;
		}
		$settings->discoverable = $settings->invisible_mode_hide_presence;
		if(array_key_exists('invisible_mode_hide_visitor', $input)) {
			$settings->invisible_mode_hide_visitor = 1;
		} else {
			$settings->invisible_mode_hide_visitor = 0;
		}
		if(array_key_exists('invisible_mode_hide_super_powers', $input)) {
			$settings->invisible_mode_hide_super_powers = 1;
		} else {
			$settings->invisible_mode_hide_super_powers = 0;
		}
				
		$settings->save();
		
		return;
		
	}
	
	public static function changePwd($id,$input) {
		
		$rules =  array('captcha' => array('required', 'captcha'),'old_pwd' =>'required', 'new_pwd' => array('required','same:re_new_pwd'), 're_new_pwd' => 'required');
        $validator = Validator::make($input, $rules);
        
        if($validator->fails()) {
	        
	        $response['success'] =  0;
	        $response['captcha_image'] = Captha::img();
        } else {
	        
	        $user = User::find($id);
	        
	        if (Hash::check($input['old_pwd'], $user->password)) {

				$user->password = Hash::make($input['new_pwd']);
				$user->save();
				$response['success'] = 1;
			} else {
				$response['success'] = 0;
				$response['captcha_image'] = Captha::img();
			}	        
        }
		
		return $response;				
	}
	
	public static function changeEmail($id,$input) {
		
		$rules =  array('captcha' => array('required', 'captcha'),'pwd' =>'required', 'email' => array('required','email'));
        $validator = Validator::make($input, $rules);
        
        if($validator->fails()) {
	        
	        $response['success'] = 0;
	        $response['captcha_image'] = Captha::img();
        } else {
	        
	        $user = User::find($id);
	        
	        if (Hash::check($input['pwd'], $user->password)) {

				$user->email = $input['email'];
				$user->save();
				$response['success'] = 1;
				$response['email'] = $input->email;

			} else {
				$response['success'] = 0;
				$response['captcha_image'] = Captha::img();
			}	        
        }
		
		return $response;
		
	}


}