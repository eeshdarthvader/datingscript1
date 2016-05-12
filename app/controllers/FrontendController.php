<?php

use Repositories\UserRepository;

class FrontendController extends BaseController {

	public function __construct(UserRepository $userRepo ){

		$this->userRepo = $userRepo;
	}

	public function register(){

		return View::make('frontend.intro');
	}

	public function registerUser() {
		$rules = [
			'email' => 'required|email|unique:users',
			'password_confirm' => 'required|same:password',
			'password' => 'required|same:password_confirm',
			'first_name' => 'required'
		];
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()) return Redirect::back()->withErrors($validator);

		$vars = Input::all();
		$vars['activated'] = 1;
		$this->userRepo->createuser($vars);
	}

	public function loginuser() {



		$rules = array('email' => 'required|email', 'password' => 'required');
		$message = array ( 'email.required' => 'Please Enter Your E-mail' , 'email.email' => 'Its Not a Valid Email' , 'password.required' => 'Please Enter Your Password'  );
		$data = Input::except('_token', '_method');
		$valid = Validator::make($data, $rules, $message);

		if($valid->fails()){
			return Redirect::back()->withErrors($valid)->withInput();
		}else{
			$email = $data['email'];
			$password = $data['password'];
		}

		try
		{
			// Login credentials

			$credentials = array(
				'email'    => $email,
				'password' => $password,
			);

			// Authenticate the user

			$user = Sentry::authenticate($credentials, false);
			if($user) {

				$user->last_login = Date::now();
				$user->last_ip =  Request::getClientIp();
				$user->save();
				
				
				$Session = Sessions::find(Session::getId());
				$Session->user_id = $user->id;
				$Session->save();
				
				return Redirect::to('dashboard');
			}

		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			Session::flash('error_msg', 'Login field is required...');
			return Redirect::to('admin/login');
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			Session::flash('error_msg', 'Password field is required...');
			return Redirect::to('admin/login');

		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
			Session::flash('error_msg', 'Wrong password, try again. !');
			return Redirect::to('admin/login');

		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			Session::flash('error_msg', 'User was not found.');
			return Redirect::to('admin/login');

		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
			echo 'User is not activated.';
			return Redirect::to('admin/login');

		}
	}

	public function logoutuser() {
		Sentry::logout();
		Session::flush();
		return Redirect::to('/');

	}

	public function login() {

		return View::make('frontend.signin');

	}

}