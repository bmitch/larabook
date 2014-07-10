<?php

use Larabook\Forms\RegistrationForm;

class RegistrationController extends \BaseController {

	private $reggistrationForm;

	function __construct(RegistrationForm $registrationForm)
	{
		$this->registrationForm = $registrationForm;
	}
	// Show a form to register the user
	public function create()
	{
		return View::make('registration.create');
	}

	// Create new user
	public function store()
	{

		$this->registrationForm->validate(Input::all());

		$user = User::create(
			Input::only('username', 'email', 'password')
		);

		Auth::login($user);
		return Redirect::home();
	}


}
