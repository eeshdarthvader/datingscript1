<?php

class FrontController extends BaseController {

	public function getIndex(){

		return View::make('frontend.pageshell');
	}



}