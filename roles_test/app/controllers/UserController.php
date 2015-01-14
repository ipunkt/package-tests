<?php

class UserController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getRegister() {
        return View::make('register');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postRegister() {
        $response = null;
        
        $validator = Validator::make(Input::all(), [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);
        
        if($validator->passes()) {
            $user = new User(Input::all());
            if($user->save()) {
                Auth::login($user);
                $response = Redirect::home();
            } else {
                $response = Redirect::back()->withErrors(['message' => 'failed to create user in database']);
            }
        } else {
            $response = Redirect::back()->withErrors($validator);
        }
        
        return $response;
	}
    
    public function getLogin() {
        return View::make('login');
    }
    
    public function postLogin() {
        $response = null;
        if(Auth::attempt(Input::only(['email', 'password'])))
            $response = Redirect::intended('/')->with(['message' => 'successful login']);
        else
            $response = Redirect::back()->withErrors(['message' => 'Failed to login']);
        
        return $response;
    }
    
    public function getLogout() {
        Auth::logout();
        return Redirect::home();
    }


}
