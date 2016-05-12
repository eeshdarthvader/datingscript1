<?php

use Repositories\ProfileRepository;

class ProfileFieldManagementController extends BaseController {

	protected $profile;

	public function __construct(ProfileRepository $profile ){
		$this->profile = $profile;
	}


	public function getIndex(){

		$vars['sections'] = $this->profile->all();

		$vars['section_empty'] = $vars['sections']->isEmpty();


		return View::make('admin.profileField.index', $vars);

	}



	public function postAddfieldsection(){

		$rules = ['sectiontitle' => 'required'];

		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()) return Redirect::back()->withErrors($validator);

		$vars['name'] = Input::get('sectiontitle');

		$vars['code'] = Libs::make_code($vars['name']);

		$this->profile->createSection($vars);


		return Redirect::to("admin/profilefields")->with('successsection','Profile Field Section added successfully');

	}

	public function postAddfield(){

				  
		$rules = ['fieldtitle' => 'required',
				  'section' => 'required',
				  'fieldtype' => 'required',
					];
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()) return Redirect::back()->withErrors($validator);

		$vars['name'] = Input::get('fieldtitle');

		$vars['code'] =  Libs::make_code($vars['name']);
		$vars['section_id'] = Input::get('section');
		$vars['type'] = Input::get('fieldtype');

		$this->profile->createField($vars);

		return Redirect::to("admin/profilefields")->with('successfield','Profile Field added successfully');

	}

	public function postAddfieldoption(){

		$rules = ['optiontitle' => 'required',
				  'field' => 'required',
					];

		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()) return Redirect::back()->withErrors($validator);

		$vars['name'] = Input::get("optiontitle");
		$vars['field_id'] = Input::get("field");
		$vars['code'] = Libs::make_code($vars['name']);

		$this->profile->createFieldOption($vars);

		return Redirect::to("admin/profilefields")->with('successoption','Profile Field Option added successfully');

	}


	public function postDeletesection(){

		$this->profile->deleteSection(Input::get("id"));

		return Redirect::to("/profilefields")->with('deletesection','Profile Field Section deleted successfully');

	}

	public function postDeletefield(){

		$this->profile->deleteField(Input::get("id"));

		return Redirect::to("/profilefields")->with('deletefield','Profile Field deleted successfully');


	}

	public function postDeletefieldoption(){

		$this->profile->deleteFieldOption(Input::get("id"));

		return Redirect::to("/profilefields")->with('deletefieldoption','Profile Field Option deleted successfully');


	}

	
}
	