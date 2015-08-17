<?php namespace Ooglee\Application\Handlers;

use Illuminate\Database\Eloquent\Model;
use Ooglee\Domain\Contracts\IHandler;
use Ooglee\Domain\Entities\User;
use Ooglee\Domain\Entities\User\IUserRepositoryInterface;
use Ooglee\Domain\Entities\User\Validators\CreateUserValidator;
use Ooglee\Domain\Contracts\IHashingService;
use Ooglee\Domain\CommandBus\ICommand;

class RegisterUserHandler implements IHandler {

	/**
	 * RegisterUserHandler implementation 
	 * 
	 */

     /**
     * @var Ooglee\Domain\Entities\Validators\CreateUserValidator
     */
    private $validator;

    /**
     * @var Ooglee\Domain\Entities\User\IUserRepositoryInterface
     */
    private $repository;

    /**
     * @var Ooglee\Domain\Events\Dispatcher
     */
    private $dispatcher;

    /**
     * @var Oogle\Infrastructure\Hashing\IHashingService
     */
    private $hashingService;

    public function __construct(CreateUserValidator $validator, IUserRepository $repository, Dispatcher $dispatcher, IHashingService $hashingService)
    {
        $this->validator = $validator;
        $this->repository = $repository;
        $this->dispatcher = $dispatcher;
        $this->hashingService = $hashingService;
    }

	public function handle(ICommand $command)
    {
        $this->validate($command);
        $this->save($command);
    }

    protected function validate(ICommand $command)
    {
        $this->validator->validate($command);
    }

    protected function save(ICommand $command)
    {
        $user = new User;
        $user->username = $command->username;
        $user->email = $command->email;
        $user->password = $this->hashingService->hash($command->password);
        $user->confirmation_code = str_random(32);

        $this->repository->save($user);

        $this->dispatcher->dispatch($user->releaseEvents());
    }
}
