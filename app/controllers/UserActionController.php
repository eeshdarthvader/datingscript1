<?php

use Repositories\UserActionRepository;
use Repositories\UserRepository;

class UserActionController extends \BaseController {

protected $userActionRepo;


public function __construct(UserActionRepository $userActionRepo, UserRepository $userRepo){

		$this->userActionRepo = $userActionRepo;
		$this->userRepo = $userRepo;
	}
	
	public function UserList($list) {
		
		$id = Sentry::getUser()->id;
		
		if($list == 'fav') {
			
			$user_lists = $this->userActionRepo->favoriteUsers($id);

		} elseif($list == 'interested') {
			
			$user_lists = $this->userActionRepo->interestedUsers($id);
			
		} elseif($list == 'likes') {
			
			$user_lists = $this->userActionRepo->likedUsers($id);
			
		} elseif($list == 'liked') {
			
			$user_lists = $this->userActionRepo->likedYou($id);
			
		} elseif($list == 'matched') {
			
			$user_lists = $this->userActionRepo->matchedUsers($id);
			
		} elseif($list == 'profile') {
			
			$user_lists = $this->userActionRepo->profileVisitors($id);
		}
		
		
		
		$visible_users = array();
		
		foreach($user_lists['visible'] as $user) {
			
			$user_obj = $this->userRepo->userObject($id,$user->id);
			array_push($visible_users,$user_obj);
			
		}
		
		$hidden_users = array();
		
		foreach($user_lists['hidden'] as $user) {
			
			$user_obj = $this->userRepo->userObject($id,$user->id);
			array_push($hidden_users,$user_obj);
			
		}
		
		$data = array();
		$data['visible'] = $visible_users;
		$data['hidden'] = $hidden_users;
		
		
		$response['data'] = $data;
		
		$response['success'] = 1;
		
		return Response::json($response);
	}
	
	public function BlockedList() {
		$id = Sentry::getUser()->id;	
		$users = $this->userActionRepo->blockedUsers($id);	
		
		$users_array = array();
		foreach($users as $user) {
			
			$user_obj = $this->userRepo->userObject($id,$user->id);
			array_push($users_array,$user_obj);
		}
		
		$response['data'] = $users_array;
		$response['success'] = 1;
		return Response::json($response);
	}

	public function getBlockedusers(){
		
		return View::make('frontend.list_blocked');
	}
	
	public function postBlockedusers() {
		return $this->BlockedList();	
	}
	
	public function postBlockuser() {
		
		$vars = Input::all();
		$vars['id'] = Sentry::getUser()->id;
		$this->userActionRepo->blockUser($vars);

		return Redirect::back();
		
	}
	
	public function postUnblockuser() {
		
		$vars = Input::all();
		$vars['id'] = Sentry::getUser()->id;
		$this->userActionRepo->unblockUser($vars);

		return $this->BlockedList();	
	}
	
	public function getInterestedusers(){
		
		return View::make('frontend.list_interested');		
	}
	
	public function postInterestedusers() {
		
		return $this->UserList('interested');
	}
	
	public function getFavoriteusers(){
		
		return View::make('frontend.list_favorites');		
	}
	
	public function postFavoriteusers() {
		
		return $this->UserList('fav');
	}
	
	public function postFavoriteuser() {
		
		$vars = Input::all();
		$vars['id'] = Sentry::getUser()->id;
		$this->userActionRepo->favoriteuser($vars);

		if(array_key_exists('list_name', $vars)) {
			
			return $this->UserList($vars['list_name']);
		} else {
			
			$response['success'] = 1;
			return Response::json($response); 			
		}		
	}
	
	public function postUnfavoriteuser() {
		
		$vars = Input::all();
		$vars['id'] = Sentry::getUser()->id;
		$this->userActionRepo->unfavoriteuser($vars);
		
		if(array_key_exists('list_name', $vars)) {
			
			return $this->UserList($vars['list_name']);
		} else {
			
			$response['success'] = 1;
			return Response::json($response); 			
		}
	}
	
	public function getMatches() {
	
		return View::make('frontend.list_matches');
	}
	
	public function postMatches() {
		
		return $this->UserList('matches');
	}
	
	public function getProfilevisitors() {
		
		return View::make('frontend.list_profilevisitors');
	}
	
	public function postProfilevisitors() {
		
		return $this->UserList('profile');
	}
	
	public function getFriends() {
		
		$id = Sentry::getUser()->id;
		$vars['users'] = $this->userActionRepo->userFriends($id);

		return View::make('frontend.list_friends',$vars);
	}
	
	
	public function getPopularity() {
		
		return View::make('frontend.list_popularity');
	}
	
	public function getLikedyou() {

		return View::make('frontend.list_likedyou');
	}
	
	public function postLikedyou() {
		
		return $this->UserList('liked');
	}
	
	public function getLikes() {
		
		return View::make('frontend.list_likes');
	}
	
	public function postLikes() {
		
		return $this->UserList('likes');
	}

	public function postReportuser() {
		
		$vars = Input::all();
		$vars['id'] = Sentry::getUser()->id;
		$this->userActionRepo->reportUser($vars);

		return Redirect::back();		
	}
	
	public function postReportphoto() {
		
		$vars = Input::all();
		$vars['id'] = Sentry::getUser()->id;
		$this->userActionRepo->reportPhoto($vars);

		return Redirect::back();		
	}

	public function postRemovefromlist() {
		
		$vars = Input::all();
		$vars['id'] = Sentry::getUser()->id;
		$vars['show'] = 'no';
		
		$this->userActionRepo->changeShowList($vars);

		return $this->UserList($vars['list_name']);	
	}
	
	public function postAddtolist() {
		
		$vars = Input::all();
		$vars['id'] = Sentry::getUser()->id;
		$vars['show'] = 'yes';
		
		$this->userActionRepo->changeShowList($vars);

		return $this->UserList($vars['list_name']);	
	}


}