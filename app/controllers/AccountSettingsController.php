<?php

use Repositories\AccountSettingsRepository;

class AccountSettingsController extends BaseController {

	public function __construct(AccountSettingsRepository $accountRepo ){

		$this->accountRepo = $accountRepo;
	}
	
	public function settings() {
		
		$user = Sentry::getUser();
		$user_id = $user->id;
		
		$response['setting'] = $this->accountRepo->userSettings($user_id);
		$response['user_email'] = $user->email;
		
		$response['success'] = 1;
		
		return Response::json($response);
	}
	
	public function getIndex() {
		
		return View::make('frontend.account_settings');
	}
	
	public function postSettings() {
		
		return $this->settings();
	}	
	
	public function postPrivacy() {
		
		$user_id = Sentry::getUser()->id;
		
		$this->accountRepo->privacy($user_id,Input::all()); 
		
		return $this->settings();
		
	}
	
	public function postPhotosVideos() {
		
		$user_id = Sentry::getUser()->id;
		
		$this->accountRepo->photosVideos($user_id,Input::all()); 
		
		return $this->settings();
		
	}
	
	public function postNotifications() {
		
		$user_id = Sentry::getUser()->id;
		
		$this->accountRepo->notifications($user_id,Input::all()); 
		
		return $this->settings();

	}
	
	public function postMessageSettings() {
		
		$user_id = Sentry::getUser()->id;
		
		$this->accountRepo->messageSettings($user_id,Input::all()); 
		
		return $this->settings();

	}
	
	public function postInvisibleModeSettings() {
		
		$user_id = Sentry::getUser()->id;
		
		$this->accountRepo->invisibleMode($user_id,Input::all()); 
		
		return $this->settings();

	}
	
	public function postChangeEmail() {
		
		$user_id = Sentry::getUser()->id;
		
		$response = $this->accountRepo->changeEmail($user_id,Input::all()); 
		
		return $response;

	}


	public function postChangePassword() {
		
		$user_id = Sentry::getUser()->id;
		
		$response = $this->accountRepo->changePwd($user_id,Input::all()); 
		
		return $response;

	}


}

