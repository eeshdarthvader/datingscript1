<?php

use Repositories\InterestsRepository;

class InterestsManagmentController extends \BaseController {

	protected $interestRepo;

	public function __construct(InterestsRepository $interestRepo){

		$this->interestRepo = $interestRepo;
	}


	public function getIndex(){

		$vars['categories'] = $this->interestRepo->getAllCategories();

		$vars['categories_empty'] = $vars['categories']->isEmpty();
		
		return View::make('admin.interests.index', $vars);
	}


	public function postCreatecategory(){

		$rules = ['category_name' => 'required'];
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()) return Redirect::back()->withErrors($validator);

		$interest = Input::get('category_name');
		$interest_code = preg_replace('/\s+/', '', $interest);
		$interest_code = strtolower($interest_code);

		$vars['name'] = $interest;
		$vars['code'] = $interest_code;

		$this->interestRepo->createCategory($vars);

		return Redirect::back()->with('successcat','Category added successfully');
	}

	public function postCreateinterest(){

		$rules = ['interest_name' => 'required'];
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()) return Redirect::back()->withErrors($validator);

		$vars['name'] = Input::get('interest_name');
		$vars['category'] = Input::get('category');

		$this->interestRepo->createInterest($vars);

		return Redirect::back()->with('successint','Interest added successfully');
	}

	public function postDeletecategory(){

		$this->interestRepo->deleteCategory(Input::get('id'));

	}

	public function postDeleteinterest(){

		$this->interestRepo->deleteInterest(Input::get('id'));
	}

}