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