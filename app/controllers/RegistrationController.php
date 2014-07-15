<?php

use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;
use Larabook\Core\CommandBus;

class RegistrationController extends \BaseController {


	use CommandBus;

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

		extract(Input::only('username', 'email', 'password'));

		$command = new RegisterUserCommand($username, $email, $password);

		$user = $this->execute($command);

		Auth::login($user);

		Flash::message('Glad to have you as a new Larabook member!');

		return Redirect::home();
	}


}
