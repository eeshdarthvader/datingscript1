<?php
	
use Repositories\UserActionRepository;

/* login */
Route::group(['before' => 'loggedinAdmin'], function(){

Route::get('/admin', function() {return View::make('admin.login');});
Route::get('/admin/login', function() {return View::make('admin.login');});
Route::post('/admin/loginPost' , 'LoginController@loginpost');

});


Route::group(['before' => 'loggedin'], function(){


Route::get('/login' , 'FrontendController@login');
Route::post('/loginPost' , 'FrontendController@loginuser');
Route::get('/' , 'FrontendController@register');
Route::post('/register' , 'FrontendController@registerUser');

});

//frontend 

Route::group(['before' => 'auth'], function(){

	Route::get('/logout' , 'FrontendController@logoutuser');
	Route::controller('dashboard','UserdashboardController');
	Route::controller('frontend','FrontController');
	Route::controller('encounters','UserEncounterController');
	
	Route::controller('users','UserActionController');
	
	Route::controller('account_settings','AccountSettingsController');

	Route::get('user/{id}', 'UserProfileController@showProfile');
	Route::controller('profile','UserProfileController');	

});

// admin side

Route::group(['before' => 'admin'] , function(){

	Route::get('/admin/logout' , 'LoginController@logout');

	Route::controller('admin/dashboard','DashboardController'); // Dashboard

	Route::controller('admin/users','UsersManagmentController'); // Users
	Route::controller('admin/admin','AdminManagmentController'); // Admin
	Route::controller('admin/app_settings','AppSetController'); // App Settings
	Route::controller('admin/interests','InterestsManagmentController'); // Interests
	Route::controller('admin/social','SocialManagmentController'); // Social
	Route::controller('admin/payment','PaymentManagmentController'); // Payment
	Route::controller('admin/seo','SeoManagmentController'); // Seo
	Route::controller('admin/gifts','GiftManagmentController'); // Gift
	Route::controller('admin/rewards','RewardManagmentController'); // Rewards
	Route::controller('admin/abuse','AbuseReportsManagmentController'); // Abuse Reports
	Route::controller('admin/emails','EmailManagmentController'); // Emails
	Route::controller('admin/coupons','CouponManagmentController'); // Coupons
	Route::controller('admin/growthhacking','GrowthHackingController'); // Growth Hacking
	Route::controller('admin/profilefields','ProfileFieldManagementController'); // Custom Profile Fields
	Route::controller('admin/financials','FinancialManagementController'); // Financis
	Route::controller('admin/credits','CreditManagementController'); // Credits 
	Route::controller('admin/importer','ImporterManagementController'); // USers Importer
	Route::controller('admin/gamemechanics','GameMechanicsManagementController'); // Game Mechanics
	Route::controller('admin/events','EventManagementController'); // Events
	Route::controller('admin/premiumfeatures','PremiumFeaturesController'); // Premium Features
	Route::controller('admin/googleanalytics','GoogleAnalyticsController'); // Google Analytics
	Route::controller('admin/multilanguage','MultiLanguageManagementController'); // MultiLanguage 
	Route::controller('admin/thirdparty','ThirdPartyController'); // Third Party
	
});






// create a admin
Route::get('/createaadmin' , function(){
	//Sentry::createUser()

	$user = Sentry::createUser(array(
		'email'     => 'shivi@gmail.com',
		'password'  => 'test',
		'activated' => true,
	));

});


// create a user
Route::get('/createauser' , function(){
	//Sentry::createUser()

	$user = Sentry::createUser(array(
		'email'     => 'shivi@gmail.com',
		'password'  => 'test',
		'activated' => true,
	));


});


// create a group for admin
Route::get('/createagroupadmin' , function(){

	Sentry::getGroupProvider()->create(array(
		'name'        => 'admin',
		'permissions' => array(
			'system' => 1,
		),
	));
});


// create a group for user
Route::get('/createagroupuser' , function(){

	Sentry::getGroupProvider()->create(array(
		'name'        => 'user'
	));
});

// create a group for user_bot
Route::get('/createagroupuserbot' , function(){

	Sentry::getGroupProvider()->create(array(
		'name'        => 'user_bot'
	));
});

// create a group for bot_blueprint
Route::get('/createagroupbotblueprint' , function(){

	Sentry::getGroupProvider()->create(array(
		'name'        => 'bot_blueprint'
	));
});





// give perm a admin

Route::get('/givepermissiontoanadmin' , function(){

	$user = Sentry::findUserById(0);
	$adminGroup = Sentry::findGroupByName('admin');
	$user->addGroup($adminGroup);

});


// give perm a user

Route::get('/givepermissiontoauser' , function(){

	$user = Sentry::findUserById(3);
	$adminGroup = Sentry::findGroupByName('user');
	$user->addGroup($adminGroup);

});




// create a user
Route::get('/createauser' , function(){
	//Sentry::createUser()

	$user = Sentry::createUser(array(
		'email'     => 'try@hotmail.com',
		'password'  => 'test',
		'activated' => true,
		'first_name'=> 'try',
		'last_name' => 'me',
		'gender'    => '1',
		'city'      => 'izmir',
		'country'   => 'Turkey'
	));


});

// create a user
Route::get('/createmurat' , function(){
	//Sentry::createUser()

	$user = Sentry::createUser(array(
		'email'     => 'osman@hotmail.com',
		'password'  => 'test',
		'activated' => true,
		'first_name'=> 'osman',
		'last_name' => 'Osman',
		'gender'    => '2',
		'age'       => '22',
		'city'      => 'izmir',
		'country'   => 'Turkey'
	));


});


Route::get('/enumtest', function(){

/*
$coupon = new Coupon();
$coupon->title ="Test4";
$coupon->coupon_code = "wrwr";
$coupon->min_amount = 234;
$coupon->discount_amount = 353;
$coupon->discount_type = 'test';
$coupon->description = "werfwerf";
$coupon->validity = date("Y-m-d H:i:s");
$coupon->per_user_limit = 34;
$coupon->overall_limit = 2434;
$coupon->per_user_limit_opition = 'limitless';
$coupon->overall_limit_option = 'limitless';
$coupon->status = 'disable';
$coupon->save(); */


$coupons =  Coupon::where('validity','>=',new \DateTime('today'))->where("status","=","enable")->get();


print_r($coupons);




});

View::composer('*', function($view)
{

	$vars['logo'] = Libs::get_settings('logo');

	if(Libs::get_settings("title")) {

		$vars['title'] = Libs::get_settings("title");
	} else {
		$vars['title'] = "LEZUM";
 	}

 	$vars['default_image'] = "uploads/app/male-thumbnail.jpg";

    $view->with($vars);
});

View::composer('*', function($view)
{

	$vars = array();

	if(Sentry::check()) {

		$user = Sentry::getUser();

		$vars['profile_pic'] = $user->photo_id;
		$vars['username'] = $user->first_name;
		$vars['user_id'] = $user->id;

		$vars['user_city'] = $user->city;
		$vars['user_lat'] = $user->lat;
		$vars['user_lng'] = $user->lng;

		$credits = User::find($user->id)->credits();
		if($credits->first()) {
			$vars['user_credits'] = $credits->first()->balance;
		} else {
			$vars['user_credits'] = 0;
		}

		$pref = Preference::where('user_id',$user->id)->first();

		if($pref){

			$vars['pref_dist'] = $pref->dist;
			$vars['pref_here_to'] = $pref->here_to;

			if($pref->here_to == 'make_friends') {
				$vars['pref_here_to_display'] = "Make friends";
			} else {
				$vars['pref_here_to_display'] = $pref->here_to;
			}

			$vars['pref_gender'] = $pref->gender;
			if($pref->gender == 'both') {
				$vars['pref_gender_display'] = "males and females";
			} else {
				$vars['pref_gender_display'] = $pref->gender;
			}
			$vars['pref_min_age'] = $pref->min_age;
			$vars['pref_max_age'] = $pref->max_age;

			$vars['pref_interest'] = $pref->interest;

		} else {
			$vars['pref_dist'] = 50;
			$vars['pref_here_to'] = "Date";
			$vars['pref_gender'] = "both";
			$vars['pref_gender_display'] = "both males and females";
			$vars['pref_min_age'] = 18;
			$vars['pref_max_age'] = 30;
			$vars['pref_interest'] = null;
		}

		$user_group = Sentry::findGroupByName('user');

		$users_count = Sentry::findAllUsersInGroup($user_group)->count();

		$user_bot_group = Sentry::findGroupByName('user_bot');

		$user_bots_count = Sentry::findAllUsersInGroup($user_bot_group)->count();

		$vars['total_users'] = $users_count + $user_bots_count;

		$vars['online_users'] = UserBotOnline::all()->count() + Sessions::all()->count();
		
		$vars['left_menu_vals'] = UserActionRepository::leftMenuVals($user->id);
		

	}

    $view->with($vars);
});
