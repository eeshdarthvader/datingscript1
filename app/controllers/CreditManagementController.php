<?php

use Repositories\CreditRepository;

class CreditManagementController extends BaseController {

	protected $credit;

	public function __construct(CreditRepository $credit ){
		$this->credit = $credit;
	}

	public function getIndex(){

		$vars['packages'] = $this->credit->allPackages();

		$vars['isenabled'] = Libs::get_settings("iscredits");

		$vars['defaultcredits'] = Libs::get_settings("defaultcredits");

		return View::make('admin.credits.index', $vars);
	}
	
	public function postAddpackage() {

		$rules = ['cost' => 'required',
				  'credits' => 'required'
					];
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()) return Redirect::back()->withErrors($validator);
		
		$vars['cost'] = Input::get('cost');
		$vars['credits'] = Input::get('credits');
		
		$this->credit->createPackage($vars);
		
		return Redirect::to('admin/credits')->with('successpackage', "Credit Package Added Successfully");
	}

	
	public function postDeletepackage() {

		$this->credit->deletePackage(Input::get('id'));
		
		return Redirect::to('admin/credits')->with('packagedeleted', "Credit Package Deleted Successfully");
	}	


	
	public function postCreditall() {
		
		$rules = ['all_users_credit' => 'required',
				  'reason' => 'required'
					];
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()) return Redirect::back()->withErrors($validator);

		$amount = Input::get("all_users_credit");
		$type = Input::get('reason');

		$this->credit->creditAllUsers($amount,$type);
		
		return Redirect::to('admin/credits')->with('creditall', "Successfully credited all users");
	}
	
	
	public function postUpdategeneral() {

		$rules = ['defaultcredits' => 'required'
					];
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()) return Redirect::back()->withErrors($validator);
		
		Libs::set_settings("defaultcredits",Input::get('defaultcredits'));
		
		$enabled = Input::get('isenabled');
		Libs::set_settings("iscredits",$enabled);
		
		if($enabled == '0'){
			Libs::set_settings("isspotlight","0");
			Libs::set_settings("issuperpowers","0");
			
		}
		return Redirect::to("admin/credits")->with('updategeneral','Settings updated Successfully');
	}

}