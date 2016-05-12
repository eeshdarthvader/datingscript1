<?php

use Repositories\UserProfileRepository;
use Repositories\EncountersRepository;
use Repositories\PhotoRepository;

class UserEncounterController extends \BaseController {

protected $userProfileRepo;
protected $encounterRepo;
protected $photoRepo;


public function __construct(UserProfileRepository $userProfileRepo, EncountersRepository $encounterRepo, PhotoRepository $photoRepo){

		$this->userProfileRepo = $userProfileRepo;
		$this->encounterRepo = $encounterRepo;
		$this->photoRepo = $photoRepo;
	}


	public function getIndex()
	{
		return $this->encounter();
	
	}
	
	
	public function encounter(){

		$user_id = Sentry::getUser()->id;

		$encounter_user = $this->encounterRepo->encounterUser($user_id);
		
		if($encounter_user) {

			Session::put('encounter_user', $encounter_user->id);

			$vars = $this->userProfileRepo->visitedProfile($encounter_user->id,$user_id);
		}

		$vars['encounter_user'] = $encounter_user;

		return View::make("frontend.encounters", $vars);
	}
	
	
	public function postEncounteryes(){
	
		$encounter_user = Session::get('encounter_user');
		$user = Sentry::getUser()->id;
		
		$this->encounterRepo->createEncounter($user,$encounter_user,'1');
		
		/* if($this->encounterRepo->mutual_attraction($user, $encounter_user))
		{
			$vars['encounter_user'] = $encounter_user;
			
			//Event::fire('user.mutual.attraction', array($user, $encounter_user));

			return View::make("frontend.mutual_attraction", $vars);
		}*/
		
		//Event::fire('user.encounter.yes', array($user, $encounter_user));
		
		return Redirect::back();
	
	
	}
	
	public function postMutualyes() {
		
		$encounter_user = Session::get('encounter_user');
		$user = Sentry::getUser()->id;
		
		$this->encounterRepo->createEncounter($user,$encounter_user,'1');
		
	}
	
	public function postEncounterno(){
	
		$encounter_user = Session::get('encounter_user');
		
		$this->encounterRepo->createEncounter(Sentry::getUser()->id,$encounter_user,'0');
			
		return  Redirect::back();
	}
	
	public function get_matches(){
	
	
		$vars['users'] = Auth::user()->mutual_attractions();
		$vars['title'] = "Mutual Attractions";
		
		return View::make("user::user_list", $vars);
	
	}

}