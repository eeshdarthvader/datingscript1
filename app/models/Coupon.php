<?php

class Coupon extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'coupons';

	protected $fillable = array('title', 'coupon_code','min_amount','discount_amount','discount_type','description','validity','per_user_limit','overall_limit','per_user_limit_option','overall_limit_option','status');

}