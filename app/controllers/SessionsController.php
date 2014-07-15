<?php

use Larabook\Forms\SignInForm;

class SessionsController extends \BaseController {

	
	public function __construct(SignInForm $signInForm)
	{
		$this->beforeFilter('guest', ['except' => 'destroy']);

		$this->signInForm = $signInForm;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//

		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// fetch the form input
		$formData = Input::only('email', 'password');

		// validate the form
		$this->signInForm->validate($formData);


		// if it is valid, then try to sign them in
		if (Auth::attempt($formData))
		{

			// redirect to statuses
			Flash::message('Welcome back!');
			return Redirect::intended('/statuses');

		}

	}


	public function destroy()
	{
		Auth::logout();

		Flash::message('You have now been logged out');

		return Redirect::home();
	}



}
