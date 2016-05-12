<?php


class Language{

	public static function all(){
	
		$dirs = array_filter(glob(app_path().'/lang/*'), 'is_dir');
		
		$languages = array();
		
		foreach($dirs as $dir)
		{
		
			$l = substr($dir, -2);
			$languages[$l] = $l;
			
		}
		
		return $languages;
	}

	public static function get_enabled_languages() {
		
		$languages = static::get_user_languages();

		foreach($languages as $k => $v)
		 {
		 	if($v == 1)
		 	{
		 		$user_lang[$k] =$k;
		 	}
	 	}

	 	return $user_lang;
	}
	
	
	public static function get_user_languages(){
	
		$languages = Libs::get_settings('user_languages');
		
		if($languages != ''){

			$languages = json_decode($languages, true);
		
		}
		else {
		
			$ls  = static::all();
			$languages = array();
			
			foreach($ls as $l){
			
				$languages[$l] = 1;
			
			}
			Libs::set_settings('user_languages',json_encode($languages));
		}
	
		return $languages;
	}
	
	
		 
	 public static function get_language_bar(){
	 
	 	$languages = self::get_user_languages();
	 	$user_lang = array();

	 	foreach($languages as $k => $v)
	 	{
	 		if($v == 1)
	 		{
	 			$user_lang[$k] = strtoupper($k);
	 		}
	 	
	 	
	 	}
	 	
	 	return Form::select('default_language',$user_lang,Setting::get_language(), array("class"=>"span3 select2" , "id"=>"selected_language"));
	 
	 }


	 public static function isRTL(){

	 	$l = Setting::get_language();

	 	if($l == "he" || $l == "ar")
	 	{
	 		return TRUE;
	 	}
	 	else{
	 		return FALSE;
	 	}
	 }

}