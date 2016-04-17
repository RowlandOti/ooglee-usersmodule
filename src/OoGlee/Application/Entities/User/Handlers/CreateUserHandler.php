<?php namespace Ooglee\Application\Entities\User\Handlers;

use Illuminate\Database\Eloquent\Model;
use Ooglee\Domain\Contracts\IHandler;
use Ooglee\Domain\Entities\User;
use Ooglee\Domain\Entities\User\IUserRepository;
use Ooglee\Domain\Entities\User\Validators\CreateUserValidator;
use Ooglee\Domain\Contracts\IHashingService;
use Ooglee\Domain\CommandBus\ICommand;

class CreateUserHandler implements IHandler {

	/**
	 * CreateUserHandler implementation 
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

    public function __construct(CreateUserValidator $validator, IUserRepository $repository, Dispatcher $dispatcher)
    {
        $this->validator = $validator;
        $this->repository = $repository;
        $this->dispatcher = $dispatcher;
    }

	public function handle(ICommand $command)
    {
        $this->validate($command);
        $this->create($command);
    }

    protected function validate(ICommand $command)
    {
        $this->validator->validate($command);
    }

    protected function create(ICommand $command)
    {
        $post = new User;
        $post->title = $command->title;
        $post->slug = $command->slug;
        $post->main_image = $command->main_image;
        $post->main_image_alt = $command->main_image_alt;
        $post->you_tube_video_id = $command->you_tube_video_id;
        $post->summary = $command->summary;
        $post->content = $command->content;
        $post->is_sticky = $command->is_sticky;
        $post->meta_description = $command->meta_description;
        $post->meta_keywords = $command->meta_keywords;
        $post->status = $command->status;

        $this->repository->save($post);

        $this->dispatcher->dispatch($post->releaseEvents());
    }
}
