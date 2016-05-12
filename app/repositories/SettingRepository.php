<?php namespace Repositories;

use \Setting;


class SettingRepository {

	/**
	 * @param $key
	 * @return string
	 */
	public function get_setting($key){

		$value = Setting::where('name',"=",$key)->first();


		if($value != null){
			$value = $value->value;
			return $value;
		}
		else {
			return "";
		}
	}


	/**
	 * @param $key
	 * @param $value
	 */
	public function set_setting($key, $value){

		$setting = Setting::where('name',"=",$key)->first();

		if($setting != null){
			$setting->value = $value;
			$setting->save();
		}
		else {
			$setting = new Setting;
			$setting->name = $key;
			$setting->value = $value;
			$setting->save();
		}
	}

	/**
	 * @param $key
	 */
	public function reset_setting($key){

		$setting = Setting::where('name',"=",$key)->first();

		if($setting != null){
			$setting->value = null;
			$setting->save();
		}

	}






}