<?php
use Repositories\UserRepository;
use Repositories\CreditRepository;


class GameMechanicsManagementController extends BaseController {


	protected $userRepo;
	protected $creditRepo;

	public function __construct(UserRepository $userRepo , CreditRepository $creditRepo){

		$this->userRepo = $userRepo;
		$this->creditRepo = $creditRepo;
	}
	
	public function getIndex(){

		$vars['country_list'] = Libs::country_list();

		$group = Sentry::findGroupByName('bot_blueprint');
		$vars['bots'] = Sentry::findAllUsersInGroup($group);

		$vars['no_bots'] = Libs::get_settings('no_bots');
		$vars['userbotgender'] = Libs::get_settings('userbotgender');

		return View::make('admin.gameMechanics.index',$vars);
	}

	public function postEnablebotblueprint(){

		$id = Input::get("id");
		$this->userRepo->activate_user($id);
	}


	public function postDisablebotblueprint(){

			$id = Input::get("id");
			$this->userRepo->de_activate_user($id);
	}

	public function postDeletebotblueprint(){

			$id = Input::get("id");
			$this->userRepo->delete_user($id);
	}

	public function postNewpassword(){

		$id = Input::get("botid");
		$password = Input::get("new_password");

		$this->userRepo->updatePassword($id,$password);

		return Redirect::back();

	}

	public function postCreatebot() {
		$rules = [
			'email' => 'required|email|unique:users',
			'password_confirm' => 'required|same:password',
			'password' => 'required|same:password_confirm',
			'first_name' => 'required',
			'dob' => "required"
		];
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()) return Redirect::back()->withErrors($validator);

		$vars = Input::all();

		$vars['photo_id'] = "";
		$vars['country'] = Libs::country_name($vars['country']);

		if(Input::hasFile('photo')){
			$img = Input::file('photo');

							

			$ext = $img->getClientOriginalExtension();
			$filename = uniqid().'.'.$ext;
			$path = public_path('uploads/photos/'.$filename);

			if(Image::make($img->getRealPath())->save($path))
			{
				$vars['photo_id'] = $filename;
			} 
		}

		$this->userRepo->createBotBlueprint($vars);

		return Redirect::back()->with('success','Bot Blueprint created successfully');
	}

	public function postSettings() {

		$userbotgender = Input::get("userbotgender");
		Libs::set_settings('userbotgender',$userbotgender);

		$no_bots = Input::get("no_bots");
		Libs::set_settings('no_bots',$no_bots);

		return Redirect::back()->with('success_setting','Changes saved successfully');

	}

}