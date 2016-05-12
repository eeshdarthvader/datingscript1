<?php

class ThirdPartyController extends BaseController {


	public function getIndex(){

		$vars['qbappid'] = Libs::get_settings("qbappid");
		$vars['authkey'] = Libs::get_settings("qbauthkey");
		$vars['authsecret'] = Libs::get_settings("qbauthsecret");
		$vars['apiendpt'] = Libs::get_settings("qbapiendpt");

		$vars['pbappid'] = Libs::get_settings("pbappid");
		$vars['userkey'] = Libs::get_settings("pbuserkey");
		
		return View::make('admin.thirdPartyApis.index',$vars);
	}

	public function postQuickblox(){

		$qbappid = Input::get("qbappid");
		Libs::set_settings('qbappid',$qbappid);

		$authkey = Input::get("authkey");
		Libs::set_settings('qbauthkey',$authkey);

		$authsecret = Input::get("authsecret");
		Libs::set_settings('qbauthsecret',$authsecret);

		$apiendpt = Input::get("apiendpt");
		Libs::set_settings('qbapiendpt',$apiendpt);

		return Redirect::back()->with('successqb','Changes saved successfully');
	}

	public function postPandora(){
		
		$pbappid = Input::get("pbappid");
		Libs::set_settings('pbappid',$pbappid);

		$userkey = Input::get("userkey");
		Libs::set_settings('pbuserkey',$userkey);

		return Redirect::back()->with('successpb','Changes saved successfully');
	}


}