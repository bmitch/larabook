<?php namespace Larabook\Statuses;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class PublishStatusCommandHandler implements CommandHandler
{

	use DispatchableTrait;

	protected $statusRepository;

	function __construct(StatusRepository $statusRepository)
	{
		$this->statusRepository = $statusRepository;
	}

	public function handle($command)
	{
		$status = Status::publish($command->body);

		// cound do it like this here
		// new Status()
		// but makes sense because Status::publish 
		// describes what it is doing well

		$status = $this->statusRepository->save($status, $command->userId);

		$this->dispatchEventsFor($status);

		return $status;

	}
}