<?php

class MultiLanguageManagementController extends BaseController {


	public function getIndex(){
	
		$vars['default_language'] = Libs::get_settings("default_language");
		
		$vars['user_languages'] = Language::get_enabled_languages();

		$vars['all_languages'] = Language::get_user_languages();

		return View::make('admin.multilanguage.index', $vars);
	}	
	
	
	public function postSettings(){
	
		$language = Input::get('default_language');
		
		Libs::set_settings('default_language',$language );
		
		Cookie::forget('language');

		return Redirect::back()->with('success','Default Lanagauge Updated');
	}
	
	
	public function postUserlanguages(){
	
		$user_languages = Language::get_user_languages();
		
		$post_ul = Input::all();

		foreach($user_languages as $k=>$v)
		{
			if(array_key_exists($k, $post_ul)){
				
				$user_languages[$k] = 1;
				
			}
			else{
				
				$user_languages[$k] = 0;
					
			}
		}
		
		if($user_languages[Libs::get_settings("default_language")] == 0) {
			return Redirect::back()->with('default_language','Default Language Can Not Be Disabled');
		}

		Libs::set_settings('user_languages',json_encode($user_languages));
		
		return Redirect::back()->with('user_language_updated','User Language Updated');
	}
	
	
	public function getEdit($language){
	
		$array = array();
		$vars['l'] = $l = $language;

		$default_language = Libs::get_settings("default_language");
		
		$default = include(app_path()."/lang/$default_language/app.php");
		
		$language =  include(app_path()."/lang/$language/app.php");
		
		foreach($default as $k => $v)
		{
		
			$a = new stdClass;
			$a->mcode = $k;
			$a->left_lang = $v;
			if(isset($language[$k]))
			{
			$a->right_lang = $language[$k];
			}
			else{
			
			$a->right_lang = "";
			
			}
			array_push($array, $a);
		
		}
		
		$vars['language'] = $array;
		
		if(is_writable(app_path()."/lang/$l/app.php"))
		{
		
			$vars['is_writable'] = true;
		}
		else{
		
			$vars['is_writable'] = false;
		
		}
		
		$vars['lang_path'] = app_path()."/lang/$l/app.php";
		
		return View::make('admin.multilanguage.edit', $vars);
	
	
	}
	
	
	public function postEditlanguage(){
	
		$new_words = Input::all();
		$l = $new_words['l'];
		unset($new_words['l']);
		$array = Libs::make_array($new_words);
		File::put(app_path()."/lang/$l/app.php", $array);
	
		return Redirect::back()->with('success','Language updated successfully');
	}
	
}