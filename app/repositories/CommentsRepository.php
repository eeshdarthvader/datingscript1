<?php namespace Repositories;

use \PhotoComment;
use \PhotoCommentReply;
use \User;
use \Photos;
use \UserSetting;
use \stdClass;

class CommentsRepository {

	public static function comment($vars) {
		
		$setting = UserSetting::where('user_id',$vars['id'])->first();
		
		if($vars['id'] != $vars['user_id'] && $setting && $setting->comment_on_photos == 'matches') {
			
			if(!EncountersRepository::mutual_attraction($vars['id'],$vars['user_id'])) {
				
				$response['success'] = 0;
				$response['error'] = "You do not have permissions to comment";
				return $response;
				
			}
			
		}
		
		$comment = new PhotoComment;
		$comment->user = $vars['id'];
		$comment->album = $vars['album'];
		$comment->comment = $vars['comment'];
		$comment->commenting_user = $vars['user_id'];
		$comment->save();
		
	}	
	
	public static function commentReply($vars) {
		
		$setting = UserSetting::where('user_id',$vars['id'])->first();
		
		
		if($vars['id'] != $vars['user_id'] && $setting && $setting->comment_on_photos == 'matches') {
			
			if(!EncountersRepository::mutual_attraction($vars['id'],$vars['user_id'])) {
				
				$response['success'] = 0;
				$response['error'] = "You do not have permissions to comment";
				dd("error");
				return $response;	
			}		
		}
		
		$reply = new PhotoCommentReply;
		$reply->user = $vars['id'];
		$reply->comment_id = $vars['comment_id'];
		$reply->reply = $vars['reply'];
		$reply->commenting_user = $vars['user_id'];
		$reply->save();
	}	
	
	public static function deleteComment($vars) {
		
		$item = PhotoComment::find($vars['id']);
		
		if($item) {
			
			if($item->user == $vars['user_id'] || $item->commenting_user == $vars['user_id']) {
				
				$item->comment_delete = 'true';
				$item->save();
				$response['success'] = 1;
				return $response;
			}
		}
		$response['success'] = 0;
		$response['error'] = 'You do not have permission to delete';
		return $response;		
	}
	
	public static function deleteReply($vars) {
		
		$item = PhotoCommentReply::find($vars['id']);		
		
		if($item) {
			
			if($item->user == $vars['user_id'] || $item->commenting_user == $vars['user_id']) {
				
				$item->reply_delete = 'true';
				$item->save();
				$response['success'] = 1;
				return $response;
			}
		}
		$response['success'] = 0;
		$response['error'] = 'You do not have permission to delete';
		return $response;			
	}

	
	public static function editComment($vars) {
		
		$comment = PhotoComment::find($vars['comment_id']);
		
		if($comment->commenting_user == $vars['id']) {
			$comment->comment = $vars['comment'];
			$comment->save();
		}
		
	}
	
	public static function editReply($vars) {
		
		$reply = PhotoCommentReply::find($vars['reply_id']);
		
		if($reply->commenting_user == $vars['id']) {
			$reply->reply = $vars['reply'];
			$reply->save();
		}	
	}
	
	public static function comments($visited_user_id,$user_id) {
		
		$comments = PhotoComment::where('user',$visited_user_id)->where('comment_delete','no')->get();
		
		$public_comments = array();
		$private_comments = array();
		$album_comments = array();
		
		foreach($comments as $comment) {
			
			$comment_obj = new stdClass();
			
			$commenting_user = User::find($comment->commenting_user);
			$comment_obj->user_name = $commenting_user->first_name;
			$comment_obj->photo = $commenting_user->photo_id;
			 
			$comment_obj->comment = $comment->comment;
			$comment_obj->id = $comment->id;
			
			$replies = PhotoCommentReply::where('comment_id',$comment->id)->where('reply_delete','no')->get();
			
			$replies_array = array();
			
			foreach($replies as $reply) {
				
				$reply_obj = new stdClass();
				
				$replying_user = User::find($reply->commenting_user);
				$reply_obj->user_name = $replying_user->first_name;
				$reply_obj->photo = $replying_user->photo_id;
				
				$reply_obj->reply = $reply->reply;
				$reply_obj->id = $reply->id;
				
				if($reply->user == $user_id || $reply->commenting_user == $user_id) {
					$reply_obj->can_delete = 'true';
				} else {
					$reply_obj->can_delete = 'false';
				}
				
				if($reply->commenting_user == $user_id) {
					$reply_obj->can_edit = 'true';
				} else {
					$reply_obj->can_edit = 'false';
				}
				
				$reply_obj->date = date("j F Y",strtotime($reply->created_at));
				
				array_push($replies_array, $reply_obj);
			}
			
			$comment_obj->replies = $replies_array;
			
			if($comment->user == $user_id || $comment->commenting_user == $user_id) {
				$comment_obj->can_delete = 'true';
			} else {
				$comment_obj->can_delete = 'false';
			}
			
			$comment_obj->date = date("j F Y",strtotime($comment->created_at));
			
			if($comment->commenting_user == $user_id) {
				$comment_obj->can_edit = 'true';
			} else {
				$comment_obj->can_edit = 'false';
			}
			
			if($comment->album == 'public') {
				
				array_push($public_comments, $comment_obj);
				
			} elseif($comment->album == 'private') {
		
				array_push($private_comments, $comment_obj);
				
			} else {
				
				array_push($album_comments, $comment_obj);
			}
			
		}
		
		$response['public_comments'] = $public_comments;
		$response['private_comments'] = $private_comments;
		$response['album_comments'] = $album_comments;
		
		return $response;
		
	}
}	
