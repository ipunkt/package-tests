<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
        $name = 'guest';
        $log = link_to('/login', 'login');
        if(Auth::check()) {
            $user = Auth::user();
            $name = $user->email;
            $log = link_to('/logout', 'logout');
        }
        
		return View::make('hello', compact('name', 'log'));
	}

}
