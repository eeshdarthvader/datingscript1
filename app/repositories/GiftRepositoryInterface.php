<?php namespace Repositories;


interface GiftRepositoryInterface {


	/**
	 * @param array $vars
	 * @return mixed
	 */
	public function create_gift(array $vars);

	/**
	 * @return mixed
	 */
	public function getAll();

	/**
	 * @param $id
	 * @return mixed
	 */
	public function deleteById($id);


}
