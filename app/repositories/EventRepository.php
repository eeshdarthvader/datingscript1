<?php namespace Repositories;

use \EventD;


class EventRepository {


	/**
	 * @param array $vars
	 */
	public function create(array $vars){

		EventD::create($vars);
	}

	/**
	 * @return mixed
	 */
	public function getAll(){

		return EventD::all();

	}

	/**
	 * @param $id
	 */
	public function deleteById($id){

		$event = EventD::findOrFail($id);
		$event->delete();
	}


}