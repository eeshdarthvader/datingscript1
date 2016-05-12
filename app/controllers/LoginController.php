<?php

class LoginController extends BaseController {

	public function loginpost(){

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

				

				$admin = Sentry::findGroupByName('admin');

		  		if (!$user->inGroup($admin)) {

		  			Sentry::logout();

					return Redirect::to('/admin');
				}

				$user->last_login = Date::now();
				$user->last_ip =  Request::getClientIp();
				$user->save();
				return Redirect::to('/admin/dashboard');
			}
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			Session::flash('error_msg', 'Login field is required...');
			return Redirect::to('/admin');
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			Session::flash('error_msg', 'Password field is required...');
			return Redirect::to('/admin');

		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
			Session::flash('error_msg', 'Wrong password, try again. !');
			return Redirect::to('/admin');

		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			Session::flash('error_msg', 'User was not found.');
			return Redirect::to('/admin');

		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
			echo 'User is not activated.';
			return Redirect::to('/admin');

		}

	}

	public function logout(){
		Sentry::logout();
		return Redirect::to('/admin');

	}
}