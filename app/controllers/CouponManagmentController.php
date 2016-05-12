<?php

use Repositories\CouponRepository;

class COuponManagmentController extends BaseController {

	protected $coupon;

	public function __construct(CouponRepository $coupon ){
		$this->coupon = $coupon;
	}

	public function getIndex(){

		$coupons = $this->coupon->getAll();

		return View::make('admin.coupon.index', compact('coupons'));
	}

	public function postCreatecoupon(){

		$rules = ['title' => 'required',
				  'coupon_code' => 'required|unique:coupons',
				  'discount_type' => 'required',
				  'discount_amount' => 'required'
					];
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()) return Redirect::back()->withErrors($validator);


		$vars['title'] = Input::get('title');
		$vars['coupon_code'] = Input::get('coupon_code');
		$vars['min_amount'] = Input::get('min_amount');
		$vars['discount_amount'] = Input::get('discount_amount');
		$vars['discount_type'] = Input::get('discount_type');
		$vars['description'] = Input::get('description');
		$vars['per_user_limit'] = Input::get('per_user_limit');
		$vars['overall_limit'] = Input::get('overall_limit');
		$vars['per_user_limit_option'] = Input::get('per_user_limit_option');
		$vars['overall_limit_option'] = Input::get('overall_limit_option');
		$vars['status'] = Input::get('status');

		$timestamp_validity = strtotime(Input::get('validity'));
        $vars['validity'] = date("Y-m-d H:i:s", $timestamp_validity);



		$this->coupon->create($vars);

		return Redirect::to("admin/coupons")->with('successcoupon','Coupon created successfully');

	}

	public function postDeletecoupon(){

		$this->coupon->delete(Input::get('id'));

		return Redirect::to('admin/coupons')->with('actioncoupon', "Coupon Deleted Successfully");
	}

	public function postEnablecoupon(){

		$this->coupon->enable(Input::get('id'));

		return Redirect::to('admin/coupons')->with('actioncoupon', "Coupon Enabled");
	}	

	public function postDisablecoupon(){

		$this->coupon->disable(Input::get('id'));

		return Redirect::to('admin/coupons')->with('actioncoupon', "Coupon Disabled");
	}





}