<?php

class GoogleAnalyticsController extends BaseController {


	public function getIndex(){

		$vars['google_ac_no'] = Libs::get_settings("google_ac_no");

		return View::make('admin.googleAnalytics.index',$vars);
	}

	public function postSettings(){

		$google_ac_no = Input::get("google_ac_no");
		Libs::set_settings('google_ac_no',$google_ac_no );

		return Redirect::back()->with('success','Changes saved successfully');
	}


}