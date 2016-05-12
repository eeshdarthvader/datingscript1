<?php namespace Repositories;

use \UserProfile;
use \ProfileField;
use \ProfileFieldOption;
use \ProfileFieldSection;
use \UserProfileField;
use \BotProfileField;
use \Libs;

class ProfileRepository {

	public function createSection($vars) {

		ProfileFieldSection::create($vars);
	}

	public function createField($vars) {

		ProfileField::create($vars);
	}

	public function createFieldOption($vars) {

		ProfileFieldOption::create($vars);
	}

	public function deleteSection($id) {

		$section = ProfileFieldSection::findOrFail($id);

		$fields = ProfileField::where('section_id',$id)->get();

		foreach($fields as $field) {

			ProfileFieldOption::where('field_id',$field->id)->delete();

			UserProfileField::where('field_id',$id)->delete();

			$field->delete();
		}

		$section->delete();
	}

	public function deleteField($id) {

		$field = ProfileField::findOrFail($id);

		ProfileFieldOption::where('field_id',$id)->delete();

		UserProfileField::where('field_id',$id)->delete();

		$field->delete();

	}

	public function deleteFieldOption($id) {

		$option = ProfileFieldOption::findOrFail($id);

		UserProfileField::where('field_id',$option->field_id)->where('value',$option->name)->delete();

		$option->delete();

	}


	public function fieldType($id) {

		$field = ProfileField::findOrFail($id);

		return $field->type;

	}

	
	protected function customFieldValue($field_id,$val) {

		$field = ProfileField::findOrFail($field_id);
		$field_type = $field->type;

		if($field_type == 'text') {
		    				
		    $value = $val;
		    				
		} else if($field_type == 'checkbox') {

		    $val_lower = strtolower($val);

		    if((substr($val_lower,0,1) == 't') || (substr($val_lower,0,1) == 'y') || (substr($val_lower,0,1) == '1')) {

		    	$value = 1;
		   	} else {

		    	$value = 0;
		    
		    }

		} else if($field_type == 'dropdown') {

			$val_code = Libs::make_code($val);

			$field_options = ProfileFieldOption::where('field_id',$field_id)->get();

			$flag = 0;
			
			foreach($field_options as $field_option) {

				if($field_option->code == $val_code) {
					$flag = 1;
					$value = $field_option->id;
					break;
				}
			}

			if($flag == 0) {

				$new_field_option = ProfileFieldOption::create(array("field_id" => $field_id, 'code' => $val_code, 'name' => $val));

				$value = $new_field_option->id;
			}
		}
		return $value;
	}


	public function createUserField($user_id,$field_id,$val) {
	
		$value = $this->customFieldValue($field_id,$val);

		UserProfileField::create(array('user_id' => $user_id, 'field_id' => $field_id, 'value' => $value));
	}


	public function createBotField($bot_id,$field_id,$val) {

		$value = $this->customFieldValue($field_id,$val);

		UserProfileField::create(array('user_id' => $bot_id, 'field_id' => $field_id, 'value' => $value));
	}

	public function all(){

		$sections = ProfileFieldSection::get();

		foreach($sections as $section) {

			$fields = ProfileField::where('section_id',$section->id)->get();

			foreach($fields as $field) {

				$options = ProfileFieldOption::where('field_id',$field->id)->get();

				$field->options = $options;
			}

			$section->fields = $fields;
		}


		return $sections;
	}

	public static function user_custom_profile($user_id) {

		$sections = ProfileFieldSection::get();

		foreach($sections as $section) {

			$fields = ProfileField::where('section_id',$section->id)->get();

			$sec_filled = false;

			foreach($fields as $field) {
				
				if($field->type == 'dropdown') {
					
					$options = ProfileFieldOption::where('field_id',$field->id)->get();
					$field->options = $options;
				}

				$userval = UserProfileField::where('user_id',$user_id)->where('field_id',$field->id)->first();
					
				if($userval) {
					$field->value = $userval->value;
					$field->filled = true;
					$sec_filled = true;
				} else {
					$field->filled = false;
				}
			}

			$section->fields = $fields;
			$section->filled = $sec_filled;
		}

		return $sections;

	}

	public function updateCustomProfile($vars) {

		$fields = ProfileField::where('section_id',$vars['section_id'])->get();

		foreach($fields as $field) {

			if( array_key_exists($field->id, $vars) && $vars[$field->id]) {

				$userProf = UserProfileField::where('user_id',$vars['user_id'])->where('field_id',$field->id)->first();
					
				if(!$userProf) {

					$userProf = new UserProfileField;
					$userProf->user_id = $vars['user_id'];
					$userProf->field_id = $field->id;
				} 

	 			$userProf->value = $vars[$field->id];
	 			$userProf->save();

			}
		}


	}

	public static function user_profile($user_id) {

		$user_profile = UserProfile::where('user_id',$user_id)->first();

		$profile = array();

		if(!$user_profile) {

			$profile['exists'] = false;
		} else {

			$profile['exists'] = true;

			$profile['about_me'] = $user_profile->about_me;
			$profile['interested_in'] = $user_profile->interested_in;
		}

		return $profile;
	}

	public function saveAboutMe($vars) {

		$userProfile = UserProfile::where('user_id',$vars['user_id'])->first();

		if(!$userProfile){

			UserProfile::create($vars);
		} else {

			$userProfile->about_me = $vars['about_me'];
			$userProfile->save();
		}
	}

	public function saveInterestedIn($vars) {

		$userProfile = UserProfile::where('user_id',$vars['user_id'])->first();

		if(!$userProfile){

			UserProfile::create($vars);
		} else {

			$userProfile->interested_in = $vars['interested_in'];
			$userProfile->save();
		}
	}
}