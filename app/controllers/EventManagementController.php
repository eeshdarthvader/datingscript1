<?php

use Repositories\EventRepository;
use Repositories\InterestsRepository;

class EventManagementController extends BaseController {

	protected $event;
	protected $interestRepo;

	public function __construct(EventRepository $event,InterestsRepository $interestRepo ){
		$this->event = $event;
		$this->interestRepo = $interestRepo;

	}

	public function getIndex(){

		$vars['events'] = $this->event->getAll();

		$vars['categories'] = $this->interestRepo->getAllCategories();

		return View::make('admin.event.index', $vars);
	}

	

	public function postCreateevent(){

		$rules = ['title' => 'required',
				  'category' => 'required',
					];
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()) return Redirect::back()->withErrors($validator);


		$vars['title'] = Input::get('title');
		$vars['interest_category_id'] = Input::get('category');
		$vars['content'] = Input::get('content');
		$vars['writer'] = Input::get('writer');

		if(Input::hasFile('photo')){
			$img = Input::file('photo');
			$ext = $img->getClientOriginalExtension();
			$filename = uniqid().'.'.$ext;
			$path = public_path('uploads/events/'.$filename);

			if(Image::make($img->getRealPath())->resize(170, 170)->save($path))
			{
				$vars['icon_id'] = $filename;
			}
		}

		$this->event->create($vars);

		return Redirect::to("admin/events")->with('success','Event created successfully');

	}

	public function getDeleteevent($id){

		$this->event->deleteById($id);
		return Redirect::back();
	}





}