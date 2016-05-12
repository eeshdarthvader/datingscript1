<?php namespace Libs\Facade;


use Illuminate\Support\Facades\Facade;

class Libs extends Facade {


	protected static function getFacadeAccessor()
	{
		return 'Libs';
	}



}
