<?php namespace Libs;



use Illuminate\Support\ServiceProvider;

class LibsServiceProvider extends ServiceProvider {


	public function register(){

		$this->app->bind('Libs' , 'Libs\LibsService');

	}



}