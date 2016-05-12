<?php


class FinancialManagementController extends BaseController {

	
	public function getIndex(){

		return View::make('admin.financials.index');
	}
}