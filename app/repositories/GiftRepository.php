<?php namespace Repositories;

use Illuminate\Support\Facades\Redirect;
use \Gifts;


class GiftRepository implements GiftRepositoryInterface {


	/**
	 * @param array $vars
	 */
	public function create_gift(array $vars){

		Gifts::create($vars);
	}

	/**
	 * @return mixed
	 */
	public function getAll(){

		return Gifts::all();

	}
	
	public function sortedGifts() {
		$gifts = array();
		
		$gifts['female_gifts'] = Gifts::where('gender',"!=",'male')->get();
		$gifts['male_gufts'] = Gifts::where('gender',"!=",'female')->get();
		
		return $gifts;
	}

	/**
	 * @param $id
	 */
	public function deleteById($id){

		$gift = Gifts::findOrFail($id);
		$gift->delete();
	}


}