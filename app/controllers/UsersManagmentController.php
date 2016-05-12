<?php

use Repositories\UserRepository;
use Repositories\CreditRepository;

class UsersManagmentController extends \BaseController {


	protected $userRepo;
	protected $creditRepo;

	public function __construct(UserRepository $userRepo , CreditRepository $creditRepo){

		$this->userRepo = $userRepo;
		$this->creditRepo = $creditRepo;
	}

	public function getIndex(){

		$users = $this->userRepo->allUsers();
		return View::make('admin.users.index', compact('users'));
	}

	public function getUserbots(){

		$users = $this->userRepo->allUserBots();

		return View::make('admin.users.user_bot', compact('users'));
	}

	public function getVerifyprofilephoto() {

		$users = $this->userRepo->UserNonVerifyPhoto();

		return View::make('admin.users.user_verify_profile_photo', compact('users'));
	}

	public function postVerifyuserphoto() {

		$id = Input::get("id");
		$this->userRepo->Verifyprofilephoto($id);
	}

	public function postUnsetuserphoto() {

		$id = Input::get("id");
		$this->userRepo->Unsetprofilephoto($id);
	}

	public function getUserpopularity(){

		$users = $this->userRepo->allUsers();

		return View::make('admin.users.popularity_ranking', compact('users'));
	}

	public function getMessageusers() {

		$vars['country_list'] = Libs::country_list();
		return View::make('admin.users.msg_users',$vars);
	}

	public function postSendmsg() {
		$rules = ['name' => 'required',
				  'msg' => 'required',
					];
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()) return Redirect::back()->withErrors($validator);

		return Redirect::to("admin/users/messageusers")->with('success','Message sent to all users');

	}

	public function getImportusers() {

		return View::make('admin.users.import_users');
	}

	
	public function postVerifyuser(){

		$id = Input::get("id");
		$this->userRepo->activate_user($id);
	}


	public function postDisableuser(){

			$id = Input::get("id");
			$this->userRepo->de_activate_user($id);
			$this->userRepo->botoffline($id);
	}

	public function postBotonline(){

		$id = Input::get("id");
		$this->userRepo->botonline($id);
	}


	public function postBotoffline(){

			$id = Input::get("id");
			$this->userRepo->botoffline($id);
	}

	public function postDeleteuser(){

			$id = Input::get("id");
			$this->userRepo->delete_user($id);
	}

	public function postCredituser(){

		$amount = Input::get("credits");
		$user_id = Input::get("userid");
		$type = Input::get('reason');

		$balance = $this->creditRepo->creditUser($user_id,$amount);


		

		$vars['balance'] = $balance;
		$vars['amount'] = $amount;
		$vars['transaction_id'] = "N/A";
		$vars['type'] = $type;
		$vars['user_id'] = $user_id;
		$this->creditRepo->createCredit($vars);

		return Redirect::back();
	}

	public function postNewpassword(){

		$id = Input::get("useridd");
		$password = Input::get("new_password");

		$this->userRepo->updatePassword($id,$password);

		return Redirect::back();

	}







}