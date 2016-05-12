<?php namespace Providers;

use Illuminate\Support\ServiceProvider;
use \Event;

class NotificationServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
	   /*
\App::before(function($request)
		{
		    \Session::sweep();
		});
*/


		Event::listen('profile_visitor', 'Repositories\UserProfileRepository@profileVisitorNotification');
    } 
    
}


?>