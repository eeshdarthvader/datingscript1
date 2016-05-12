<?php

use Repositories\UserRepository;


class AdminManagmentController extends \BaseController {

	public function __construct(UserRepository $userRepo ){

		$this->userRepo = $userRepo;
	}

	public function getIndex(){

		$group = Sentry::findGroupByName('admin');
		$users = Sentry::findAllUsersInGroup($group);

		return View::make('admin.users.admin', compact('users'));
	}

	public function postDeleteuser(){

		$id = Input::get("id");
		$this->userRepo->delete_user($id);
	}


	public function postCreate(){

		$rules = [
			'email' => 'required|email|unique:users',
			'password_confirm' => 'required|same:password',
			'password' => 'required|same:password_confirm',
			'first_name' => 'required'
		];
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()) return Redirect::back()->withErrors($validator);

		$vars = Input::all();
		$this->userRepo->createAdmin($vars);

		return Redirect::back()->with('success','Changes saved successfully');
	}

	public function postNewpassword(){

		$id = Input::get("userid");
		$password = Input::get("new_password");

		$this->userRepo->updatePassword($id,$password);

		return Redirect::back();

	}







}