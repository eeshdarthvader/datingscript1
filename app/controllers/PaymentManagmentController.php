<?php

class PaymentManagmentController extends BaseController {


	public function getIndex(){

		$vars['paypalusername'] = Libs::get_settings("paypalusername");
		$vars['stripekey'] = Libs::get_settings("stripekey");
		
		return View::make('admin.payment.index',$vars);
	}

	public function postStripekey(){

		$stripekey = Input::get("stripekey");
		Libs::set_settings('stripekey',$stripekey);

		return Redirect::back()->with('successstripe','Changes saved successfully');
	}

	public function postCreatepaypal(){
		
		$paypalusername = Input::get("paypalusername");
		Libs::set_settings('paypalusername',$paypalusername);

		return Redirect::back()->with('successp','Changes saved successfully');
	}


}