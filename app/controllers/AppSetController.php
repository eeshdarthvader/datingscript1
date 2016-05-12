<?php

class AppSetController extends BaseController {

	public function getIndex(){

		if(Libs::get_settings("logo") != null ) {
			$vars['sitelogourl'] = Libs::get_settings("logo");
		} else {
			$vars['sitelogourl'] = null;
		} if(Libs::get_settings("favicon") != null ) {
			$vars['sitefaviconurl'] = Libs::get_settings("favicon");
		} else {
			$vars['sitefaviconurl'] = null;
		}
		$vars['siteTitle'] = Libs::get_settings("title");
		$vars['mode'] = Libs::get_settings("debug_mode");
		$vars['page_title'] = "Application Setting";

		return View::make('admin.appSettings.index',$vars);
	}


	public function postGenerals(){

			$title = Input::get("title");
			Libs::set_settings('title',$title);

			$mode = Input::get("mode");
			Libs::set_settings("debug_mode", $mode);

			return Redirect::to("admin/app_settings")->with('success','Changes saved successfully');
	}

	public function postUploadlogo(){

		$rules = ['site_logo' => 'required',
					];
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()) return Redirect::back()->withErrors($validator);

		if(Input::hasFile('site_logo')){
			$img = Input::file('site_logo');
			$ext = $img->getClientOriginalExtension();
			$filename = uniqid().'.'.$ext;
			$path = public_path('uploads/app/'.$filename);

			if(Image::make($img->getRealPath())->save($path))
			{
				Libs::set_settings('logo',$filename);
				return Redirect::to("admin/app_settings")->with('successpic','Changes saved successfully');
			}else {
				return Redirect::to("admin/app_settings")->with('successpic','Error');
			}
		}
	}

	public function getDeletelogo($key = 'logo'){

		Libs::reset_settings($key);
		return Redirect::to("admin/app_settings");
	}

	public function postUploadfavicon(){

		$rules = ['site_favicon' => 'required',
					];
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()) return Redirect::back()->withErrors($validator);

		if(Input::hasFile('site_favicon')){
			$img = Input::file('site_favicon');
			$filename = uniqid().'.ico';
			$path = public_path('uploads/app/');

			if($img->move($path,$filename))
			{
				Libs::set_settings('favicon',$filename);
				return Redirect::to("admin/app_settings")->with('successfav','Changes saved successfully');
			}else {
				return Redirect::to("admin/app_settings")->with('successfav','Error');
			}
		}

	}

	public function getDeletefavicon($key = 'favicon'){

		Libs::reset_settings($key);
		return Redirect::to("admin/app_settings");
	}











}