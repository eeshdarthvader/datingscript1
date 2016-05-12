<?php namespace Repositories;


use Illuminate\Support\ServiceProvider;

class GiftServiceProvider extends ServiceProvider {


    public function register(){

        $this->app->bind('Repositories\GiftRepositoryInterface' ,
                          'Repositories\GiftRepository');

    }



}