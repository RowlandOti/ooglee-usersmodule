<?php namespace Ooglee\Application\Entities\User\Services;

use Helpers\Response\MyResponse;
use Ooglee\Application\Entities\ABaseService;
use Ooglee\Application\Entities\User\Services\AUserBaseService;
use Ooglee\Application\Entities\User\Services\IUserService;
use Ooglee\Domain\Entities\User\Contracts\IUserRepository;

/**
* Our Service, containing all useful methods for business logic around User
*/
class UserService extends AUserBaseService implements IUserService
{
    // Containing our repositoryClassInstance to make all our database calls to
    protected $repositoryClassInstance;
    
    /**
    * Loads our $repositoryClassInstance with the actual Repo associated with our IEventRepository
    * 
    * @param IEventRepository $eventRepository
    * 
    */
    public function __construct(IUserRepository $userRepository)
    {
        $this->repositoryClassInstance = $userRepository;

        parent::__construct($userRepository);
    } 

}