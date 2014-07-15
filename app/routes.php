<?php

// Event Listen example from episode 11
// https://laracasts.com/series/build-a-laravel-app-from-scratch/episodes/11

/*
Event::listen('Larabook.Registration.Events.UserRegistered', function($event)
{
	dd('send a notification email');
});
*/

Route::get('/', [
	'as' => 'home',
	'uses' => 'PagesController@home'
]);


Route::get('register', [
	'as' => 'register_path',
	'uses' => 'RegistrationController@create'
]);

Route::post('register', [
	'as' => 'register_path',
	'uses' => 'RegistrationController@store'
]);



Route::get('login', [
	'as' => 'Login_path',
	'uses' => 'SessionsController@create'
]);

Route::post('login', [
	'as' => 'Login_path',
	'uses' => 'SessionsController@store'
]);

Route::get('logout', [
	'as' => 'logout_path',
	'uses' => 'SessionsController@destroy'
]);

Route::get('statuses', 'StatusController@index');