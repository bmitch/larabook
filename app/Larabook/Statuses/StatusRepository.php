<?php namespace Larabook\Statuses;

use Larabook\Users\User;

class StatusRepository 
{

	public function getAllForUser(User $user)
	{	
		return $user->statuses()->get();

	}
	public function save(Status $status, $userId)
	{
		//$status->save();

		return User::findOrFail($userId)
			->statuses()
			->save($status);

	}


}