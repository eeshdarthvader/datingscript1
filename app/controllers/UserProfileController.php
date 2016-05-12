<?php

use Repositories\UserProfileRepository;
use Repositories\ProfileRepository;
use Repositories\UserRepository;
use Repositories\InterestsRepository;
use Repositories\PhotoRepository;
use Repositories\CommentsRepository;

class UserProfileController extends \BaseController {

protected $userProfileRepo;
protected $profileRepo;
protected $userRepo;
protected $interestRepo;
protected $photoRepo;
protected $commentRepo;


public function __construct(UserProfileRepository $userProfileRepo, ProfileRepository $profileRepo, UserRepository $userRepo, InterestsRepository $interestRepo,PhotoRepository $photoRepo,CommentsRepository $commentRepo){

		$this->userProfileRepo = $userProfileRepo;
		$this->profileRepo = $profileRepo;
		$this->userRepo = $userRepo;
		$this->interestRepo = $interestRepo;
		$this->photoRepo = $photoRepo;
		$this->commentRepo = $commentRepo;		
		
	}
	
	public function showProfile($user_id){
		
		$id=Sentry::getUser()->id;

		if($id != $user_id) {

			$vars = $this->userProfileRepo->visitedProfile($user_id,$id);
			Event::fire('profile_visitor', array($user_id,$id));
			
			return View::make('frontend.user_profile',$vars);
		} else {
			
			$vars = $this->userProfileRepo->userProfile($user_id,$id);

			return View::make('frontend.profile_edit',$vars);
		}
	}
	

	public function postAboutme() {

		$vars['about_me'] = Input::get('about_me');

		$vars['user_id'] = Sentry::getUser()->id;

		$this->profileRepo->saveAboutMe($vars);

		return Redirect::back()->with('about_me','About me was successfully updated');
	}

	public function postInterestedin() {

		$vars['interested_in'] = Input::get('interested_in');

		$vars['user_id'] = Sentry::getUser()->id;

		$this->profileRepo->saveInterestedIn($vars);

		return Redirect::back()->with('interest_in','Interested in was successfully updated');
	}

	public function postLocation() {

		$vars = Input::all();

		$vars['user_id'] = Sentry::getUser()->id;

		$this->userRepo->saveLoctionPref($vars);

		return Redirect::back()->with('location_updated','User location was updated successfully');

	}

	
	public function postAddnewinterest(){
	
		$vars = Input::all();

		$vars['user_id'] = Sentry::getUser()->id;

		$this->interestRepo->addInterestByName($vars);
	
		return Redirect::back()->with('interest_added','New interest added successfully');

	}
	

	public function postAddinterest() {

		$vars['interest_id'] = Input::get('interest_id');

		$vars['user_id'] = Sentry::getUser()->id;

		$this->interestRepo->addUserInterest($vars);

		die(json_encode(array("success"=>"1")));
	}

	public function postDeleteinterest() {

		$interest = Input::get('name');

		$user_id = Sentry::getUser()->id;

		$this->interestRepo->deleteUserInterest($user_id,$interest);

		return ("success");
			}

	public function postHereto(){

		$vars = Input::all();

		$vars['user_id'] = Sentry::getUser()->id;

		$this->userRepo->saveHereTo($vars);

		return Redirect::back()->with('here_to_updated','User preferences was updated successfully');

	}

	public function postProfilesection() {

		$vars = Input::all();

		$vars['user_id'] = Sentry::getUser()->id;

		$this->profileRepo->updateCustomProfile($vars);

		return Redirect::back()->with('prof_section','Profile was updated successfully');

	}

	public function postGeneral() {

		$vars = Input::all();

		$vars['user_id'] = Sentry::getUser()->id;

		$this->userRepo->updateGeneral($vars);

		return Redirect::back()->with('general','Profile was updated successfully');
	}
	
	public function postProfilepic() {
		
		$image = Input::file('file');
		
		$id = Sentry::getUser()->id;
		
		$this->userRepo->uploadProfilePic($image,$id);

		return Redirect::back();
	}
	
	public function postUploadimage() {
				
		$image = Input::file('file');
		
		$album = Input::get('album');
		
		$id = Sentry::getUser()->id;
		
		$this->photoRepo->uploadPic($image,$id,$album);

		return Redirect::back()->with('photos_tab','true');
	}
	
	public function postComment() {
		
		$vars = Input::all();
		$vars['id'] = Sentry::getUser()->id;
		
		$this->commentRepo->comment($vars);
		
		$response['success'] = 1;
		
		return Response::json($response);
	}
	
	public function postDeletecomment() {
		
		$vars = Input::all();
		$vars['user_id'] = Sentry::getUser()->id;
		
		$this->commentRepo->deleteComment($vars);
		
		$response['success'] = 1;
		
		return Response::json($response);
	}
	
	public function postDeletereply() {
		
		$vars = Input::all();
		$vars['user_id'] = Sentry::getUser()->id;
		
		$this->commentRepo->deleteReply($vars);
		
		$response['success'] = 1;
		
		return Response::json($response);	
	}

	
	public function postCommentreply() {
		
		$vars = Input::all();
		$vars['id'] = Sentry::getUser()->id;
		
		$this->commentRepo->commentReply($vars);
		
		$response['success'] = 1;
		
		return Response::json($response);
	}
	
	public function postEditcomment() {
		
		$vars = Input::all();
		$vars['id'] = Sentry::getUser()->id;
		
		$this->commentRepo->editComment($vars);
		
		$response['success'] = 1;
		
		return Response::json($response);	
	}
	
	public function postEditreply() {
		
		$vars = Input::all();
		$vars['id'] = Sentry::getUser()->id;
		
		$this->commentRepo->editReply($vars);
		
		$response['success'] = 1;
		
		return Response::json($response);	
	}
	
	public function postDeletephoto() {
		
		$id = Sentry::getUser()->id;
		
		$this->photoRepo->deletephoto($id,Input::all());

		$response['success'] = 1;
		
		return Response::json($response);
	}
}