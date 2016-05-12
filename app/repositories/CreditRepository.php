<?php namespace Repositories;


use \Credits;
use \Credithistory;
use \CreditsPackage;

class CreditRepository  {

	/**
	 * @param $id
	 * @return mixed
	 */
	public  function findCreditByUserId($id){

		return Credits::where("user_id","=",$id)->first();

	}

	public function creditUser($userid,$amount) {

		$credit = Credits::where('user_id',$userid)->first();

		if($credit) {
			$balance = $credit->balance + $amount;
			$credit->balance = $balance;
			$credit->save();
			
		} else {

			$vars['user_id'] = $userid;
			$vars['balance'] = $amount;	
			Credits::create($vars);
			$balance = $amount;
		}

		return $balance;
	}

	public  function allPackages(){

		return CreditsPackage::all();

	}


	public function createCredit($vars){

		Credithistory::create($vars);
	}

	public function deletePackage($id) {

		CreditsPackage::find($id)->delete();
	}

	public function createPackage($vars) {

		CreditsPackage::create($vars);
	}


	public function creditAllUsers($amount,$type) {

		$users = UserRepository::allUsers();
		foreach($users as $user) {
			$credit = Credits::where("user_id","=",$user->id)->first();
			if($credit) {
				
				$balance = $credit->balance + $amount;
				$credit->balance = $balance;
				$credit->save();
				
				$vars['balance'] = $balance;
				$vars['amount'] = $amount;
				$vars['transaction_id'] = "N/A";
	 			$vars['type'] = $type;
				$vars['user_id'] = $user->id;
				Credithistory::create($vars);	
			}
		} 
	}


}