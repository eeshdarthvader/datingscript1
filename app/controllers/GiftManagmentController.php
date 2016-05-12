<?php

use Repositories\GiftRepositoryInterface as GiftRepositoryInterface ;

class GiftManagmentController extends BaseController {

	protected $gift;

	public function __construct(GiftRepositoryInterface $gift ){
		$this->gift = $gift;
	}

	public function getDashboard(){


		return View::make('admin.users.gifts_dashboard');
	}

	public function getIndex(){

		$gifts = $this->gift->getAll();

		return View::make('admin.gift.index', compact('gifts'));
	}

	

	public function postCreategift(){

		$rules = ['name' => 'required',
				  'photo' => 'required',
				  'price' => 'required'
					];
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()) return Redirect::back()->withErrors($validator);


		$vars['name'] = Input::get('name');
		$vars['price'] = Input::get('price');
		$vars['gender'] = Input::get('gender');
		
		if(Input::hasFile('photo')){
			$img = Input::file('photo');
			$ext = $img->getClientOriginalExtension();
			$filename = uniqid().'.'.$ext;
			$path = public_path('uploads/gifts/'.$filename);

			if(Image::make($img->getRealPath())->resize(170, 170)->save($path))
			{
				$vars['icon_id'] = $filename;
			}
		}

		$this->gift->create_gift($vars);

		return Redirect::to("admin/gifts")->with('successgift','Changes saved successfully');

	}

	public function postDeletegift(){

		$this->gift->deleteById(Input::get('id'));
	}





}