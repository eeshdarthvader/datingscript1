<?php

class GrowthHackingController extends BaseController {

	public function getIndex(){

		$vars['isfbshare'] = Libs::get_settings('isfbshare');

		return View::make('admin.growthHacking.index',$vars);
	}

	public function postFacebookshare() {

		$isfbshare = Input::get("isfbshare");
		Libs::set_settings('isfbshare',$isfbshare);

		return Redirect::back()->with('success','Changes saved successfully');
	}

}