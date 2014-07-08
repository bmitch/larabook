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
		return Redirect::home();
	}


}
