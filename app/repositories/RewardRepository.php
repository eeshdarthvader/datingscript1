<?php namespace Repositories;

use \Reward;

class RewardRepository {


	public function getAll(){

		return Reward::all();
	}

	public function getActive() {

		return Reward::where("status","=",1)->get();
	}




}