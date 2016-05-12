<?php namespace Repositories;

use \Interests;
use \InterestCategory;
use \UserInterest;

class InterestsRepository {

	/**
	 * @param array $vars
	 */
	public  function createCategory(array $vars){

		InterestCategory::create($vars);
	}

	/**
	 * @return mixed
	 */
	public  function getAllCategories(){

		return InterestCategory::all();
	}

	/**
	 * @param array $vars
	 */
	public  function createInterest(array $vars){

		Interests::create($vars);
	}

	/**
	 * @param $id
	 */
	public  function deleteCategory($id){

		$interests = InterestCategory::findOrFail($id);

		$interests->delete_all();

		$interests->delete();
	}

	/**
	 * @param $id
	 */
	public static function deleteInterest($id){

		$interests = Interests::findOrFail($id);
		$interests->delete();
	}

	public static function userInterests($id) {

		$interest_ids = UserInterest::where('user_id',$id)->lists('interest_id');


		if(!empty($interest_ids)) {
			
			$user_interests = Interests::whereIn('id',$interest_ids)->get();

		} else {
			$user_interests = null;
		}

		return $user_interests;

	}

	public static function addInterestByName($vars) {
		
		$interest_name = $vars['user_interest_search'];
		
		$interest = Interests::where("name","=","$interest_name")->first();
		
		if($interest) {
			$userinterest = UserInterest::where("interest_id","=","$interest->id")->where("user_id","=",$vars['user_id'])->first();
		
			if(!$userinterest)
			{
			
				$userinterest = new UserInterest;
				
				$userinterest->user_id = $vars['user_id'];
				$userinterest->interest_id = $interest->id;
	
				$userinterest->save();
			}
		} else {
			
			$new_interest = new Interests();
			$new_interest->name = $interest_name;
			$new_interest->save();
			
			$u = new UserInterest;
			$u->user_id = $vars['user_id'];
			$u->interest_id = $new_interest->id;
			$u->save();
		}
		
	}
	

	public static function addUserInterest($vars){

		$interest = $vars['interest'];
		
		$interest = Interests::where("name","=","$interest")->first();
		
		
		$userinterest = UserInterest::where("interest_id","=","$interest->id")->where("user_id","=",$vars['user_id'])->first();
		
		if(!$userinterest)
		{
		
			$userinterest = new UserInterest;
			
			$userinterest->user_id = $vars['user_id'];
			$userinterest->interest_id = $interest->id;

			$userinterest->save();
		
		}
	}


	public static function userAddsNewInterest($vars){

		$interest_name = $vars['interest'];

		$category = $vars['category'];
			
		
		$interest = new Interests;
		
		$interest->interest_category_id = $category;
		$interest->name = $interest_name;
		$interest->save();
		
		$u = new UserInterest;
		$u->user_id = $vars['user_id'];
		$u->interest_id = $interest->id;
		$u->save();

	}

	public static function deleteUserInterest($user_id,$interest_name){
		
		$interest = Interests::where("name","=","$interest_name")->first();
		
		if($interest) {
			
			UserInterest::where('user_id',$user_id)->where('interest_id',$interest->id)->delete();
			
		}
		
		return ("success");
		
	}

	public static function commonInterestsCount($user_1,$user_2) {

		$common_interests = 0;

		$user_1_interests = UserInterest::where('user_id',$user_1)->select(array('interest_id'));

		if(!empty($user_1_interests)) {
			
			$user_2_common_interests = UserInterest::where('user_id',$user_2)->whereIn('interest_in',$user_1_interests)->select(array('interest_id'));
			if(!empty($common_interests)) {

				$common_interests =  Interests::whereIn('id',$user_2_common_interests)->count();
			}
		}



		return $common_interests;
	}

}