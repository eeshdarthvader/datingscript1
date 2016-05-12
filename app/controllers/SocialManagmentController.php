<?php

class SocialManagmentController extends BaseController {


	public function getIndex(){

		$vars['fbid'] = Libs::get_settings("fbid");
		$vars['fbsecret'] = Libs::get_settings("fbsecret");

		return View::make('admin.social.index',$vars);
	}

	public function postCreatefacebook(){

		$rules = ['fbid' => 'required_with:fbsecret',
				  'fbsecret' => 'required_with:fbid'
				  ];
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()) return Redirect::back()->withErrors($validator);


		$fbid = Input::get("fbid");
		$fbsecret = Input::get("fbsecret");

		Libs::set_settings('fbid',$fbid );
		Libs::set_settings("fbsecret", $fbsecret);

		return Redirect::back()->with('successfb','Changes saved successfully');
	}


}