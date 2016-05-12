<?php

use Repositories\ProfileRepository;
use Repositories\PhotoRepository;
use Repositories\UserRepository;

class ImporterManagementController extends BaseController {

	protected $profile;
	protected $photo;
	protected $user;

	public function __construct(ProfileRepository $profile, PhotoRepository $photo, UserRepository $user){
		$this->profile = $profile;
		$this->photo = $photo;
		$this->user = $user;
	}

	
	public function getIndex(){

		$vars['sections'] = $this->profile->all();

		$vars['section_empty'] = $vars['sections']->isEmpty();

		return View::make('admin.importer.index',$vars);
	}

	public function postImportusers() {

		$rules = ['file' => 'required',
				  'email' => 'required',
				  'fname' => 'required',
				  'dob' => 'required',
				  'gender' => 'required',
				  'country' => 'required',
				  'columns_separated' => 'required',
				  'pwd-for' => 'required',
				  'password_all' => 'required_if:pwd-for,==,0',
				  'password_column' => 'required_if:pwd-for,==,1'
					];
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()) return Redirect::back()->withErrors($validator);
		

		$file = Input::file('file')->getRealPath();
		$cols['email'] = Input::get('email');
		$cols['id'] = Input::get('id');
		$cols['fname'] = Input::get('fname');
		$cols['dob'] = Input::get('dob');
		$cols['gender'] = Input::get('gender');
		$cols['country'] = Input::get('country');

		$type = Input::get('type');


		$password_for = Input::get('pwd-for');
		if($password_for == 0) {
			
			$password = Input::get('password');
		} else {

			$cols['password'] = Input::get('password_column');
			$pwd_type = Input::get('pwd-hashed');
		}



		if(Input::get('lname')) 
			$cols['lname'] = Input::get('lname');
		else
			$cols['lname'] = '';

		if(Input::get('city')) 
			$cols['city'] = Input::get('city');
		else
			$cols['city'] = '';

		if(Input::get('lat')) 
			$cols['lat'] = Input::get('lat');
		else
			$cols['lat'] = '';

		if(Input::get('lng')) 
			$cols['lng'] = Input::get('lng');
		else
			$cols['lng'] = '';

		$photo_folder = Input::get('photo_folder');
		$col_sep = Input::get('columns_separated');


		$sections = $this->profile->all();

		$profile_fields_given = array();

		foreach($sections as $section) {

			foreach($section->fields as $field) {

				if(Input::get($field->id)) {
					$cols[$field->id] = Input::get($field->id);
					array_push($profile_fields_given, $field->id);
				}
			}
		}


		Config::set('excel::csv.delimiter', $col_sep);

		Excel::load($file, function($reader) use ($col_sep,$password,$photo_folder,$cols,$profile_fields_given) {

		    // Getting all results
		    //$results = $reader->get();

			$reader->noHeading();
		    $arr = $reader->toArray();

		    for($i=1;$i<sizeof($arr);$i++){


		    	$user_data = $arr[$i];

		    	$user_vars['email']  = $user_data[$cols['email']];

		    	if($password_for == 0) {
		    		$user_vars['password']  = $password;
		    	} else {

		    		$user_vars['password'] = $user_data[$cols['password']];
		    	}
				
				$user_vars['activated']  = true;
				$user_vars['first_name']  = $user_data[$cols['fname']];
				$user_vars['dob']  = $user_data[$cols['dob']];
				$user_vars['country']  = $user_data[$cols['country']];

				if($cols['lname'] != '')
					$user_vars['last_name']  = $user_data[$cols['lname']];

				if((substr($user_data[$cols['gender']],0,1) == 'F') || substr($user_data[$cols['gender']],0,1) == 'f')
					$user_vars['gender']  = 'female';
				else 
					$user_vars['gender']  = 'male';

				if($type == 2) {


				} else {


				}

				if($cols['city'] != '')
					$user_vars['city']  = $user_data[$cols['city']];
					
				if($cols['lat'] != '')
					$user_vars['lat']  = $user_data[$cols['lat']];

				if($cols['lng'] != '')
					$user_vars['lng']  = $user_data[$cols['lng']];

				try {
		    		$user = Sentry::createUser($user_vars);

		    		if($pwd_type == 0) {

		    			$user->password = $user_data[$cols['password']];
		    			$user->save();
		    		}

		    		if($type == 0) {

		    			$group = Sentry::findGroupByName('user');

		    		} else if($type == 1){

		    			$group = Sentry::findGroupByName('user_bot');
		    		
		    		} else {
		    			$group = Sentry::findGroupByName('bot_blueprint');
		    		}

					$user->addGroup($group);

		    		

		    		foreach($profile_fields_given as $profile_field) {

			    		if($user_data[$cols[$profile_field]] != '') {

			   				$this->profile->createUserField($user->id,$profile_field,$user_data[$cols[$profile_field]]);
			   			}
			   		}

			    	if($user && $photo_folder != '' && $cols['id'] != '' && $user_data[$cols['id']] != '') {

			    		$dir = storage_path().'/'.$photo_folder.'/'.$user_data[$cols['id']].'*';
						$images = glob($dir);

						foreach($images as $image) {


							$filename_path = explode('/', $image);

							$filename = Str::random(8) . end($filename_path);


							rename($image, 'uploads/photos/'.$filename);

							$this->photo->create_photo(array('photo_id' => $filename, 'user_id' => $user->id));

							$photo_id = $filename;

						}

						$this->user->setProfilePhoto($photo_id,$user->id);
						$this->user->Verifyprofilephoto($user->id);
						$photo_id = '';
			    	}
				}

				catch(Exception $e) {

				}

	    	}

		});

		return Redirect::to('admin/importer')->with('success', "Users created Successfully");

	}
}