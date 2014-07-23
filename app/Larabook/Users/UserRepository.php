<?php namespace Larabook\Users;

class UserRepository
{
	public function save(User $user)
	{
		return $user->save();
	}

	public function getPaginated($howMany = 100)
	{
		return User::paginate($howMany);
	}
}