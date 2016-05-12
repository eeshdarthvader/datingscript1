<?php

use Repositories\UserDashboardRepository;

class UserdashboardController extends \BaseController {

protected $userDashboardRepo;

public function __construct(UserDashboardRepository $userDashboardRepo){

		$this->userDashboardRepo = $userDashboardRepo;
		
	}
	
	public function getIndex(){
		
		$id=Sentry::getUser()->id;
		$users=$this->userDashboardRepo->users($id);


		$c = new \Illuminate\Database\Eloquent\Collection;

		foreach($users as $user) {
			
			$c->add($user);
		}

		
		
		$users = $c->all();


		$perPage = 12;
		if( Input::get('page')) {
			$currentPage = Input::get('page') - 1;

		} else {
			$currentPage = 0;
		}
		$pagedData = array_slice($users, $currentPage * $perPage, $perPage);

		$vars['users'] = Paginator::make($pagedData, count($users), $perPage);
		$vars['users_count'] = count($users);	

		return View::make('frontend.index',$vars);
	}
	
	public function postUserprefences(){
	
		$id=Sentry::getUser()->id;
		$vars = Input::all();
		$users=$this->userDashboardRepo->filterusers($vars,$id);
		return Redirect::back();
	}
	
	
	public function postGetinterests(){
	
		$term=Input::get('query');
		$interests=$this->userDashboardRepo->getinterests($term);
		echo json_encode($interests);
	
	}
	
	

}
