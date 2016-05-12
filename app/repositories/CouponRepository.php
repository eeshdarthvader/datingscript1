<?php namespace Repositories;

use \Coupon;

class CouponRepository {


	public function getAll(){

		return Coupon::all();
	}

	public function getActive() {

		return Coupon::where('validity','>=',new \DateTime('today'))->where("status","=","enable")->get();
	}

	public function enable($id) {

		$coupon = Coupon::findOrFail($id);
		$coupon->status = "enable";
		$coupon->save();
	}

	public function disable($id) {

		$coupon = Coupon::findOrFail($id);
		$coupon->status = "disable";
		$coupon->save();
	}

	public function delete($id){

		$coupon = Coupon::findOrFail($id);
		$coupon->delete();
	}

	public function create($vars) {
		
		Coupon::create($vars);
	}


}