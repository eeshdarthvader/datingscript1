<?php

class SeoManagmentController extends BaseController {


	public function getIndex(){

		$vars['description'] = Libs::get_settings("description");
		$vars['keywords'] = Libs::get_settings("keywords");
		$vars['isSearchEngineAccess'] =  Libs::get_settings("isSearchEngineAccess");

		return View::make('admin.seo.index',$vars);
	}

	public function postCreateseo(){

		$description = Input::get("description");
		$keywords = Input::get("keywords");

		Libs::set_settings('description',$description );
		Libs::set_settings("keywords", $keywords);

		return Redirect::back()->with('successseo','Changes saved successfully');
	}


}