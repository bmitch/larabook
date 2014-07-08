<?php

class RegistrationController extends \BaseController {


	// Show a form to register the user
	public function create()
	{
		return View::make('registration.create');
	}

	// Create new user
	public function store()
	{
		$user = User::create(
			Input::only('username', 'email', 'password')
		);

		Auth::login($user);
		return Redirect::home();
	}


}
