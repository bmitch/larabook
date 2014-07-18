<?php namespace Larabook\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Larabook\Registration\Events\UserRegistered;
use Eloquent, Hash;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator, PresentableTrait;

	protected $fillable = ['username', 'email', 'password'];

	protected $presenter = 'Larabook\Users\UserPresenter';

	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = Hash::make($password);
	}

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');



	public static function register($username, $email, $password)
	{
		$user = new static(compact('username', 'email', 'password'));

		$user->raise(new UserRegistered($user));


		return $user;

	}

	public function statuses()
	{
		return $this->hasMany('Larabook\Statuses\Status');
	}

}
