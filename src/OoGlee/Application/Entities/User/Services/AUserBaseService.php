<?php namespace Ooglee\Application\Entities\User\Services;

use Ooglee\Domain\Entities\ABaseRepository;
use Ooglee\Domain\Contracts\IBaseService;
use Helpers\Response\MyResponse;
use Ooglee\Domain\Entities\User\Contracts\IUserRepository;

//Each service class would extend a AUserBaseService class which 
//implements the following interface:

abstract class  AUserBaseService implements IBaseService {

    protected $repository;

    public function __construct(IUserRepository $repository)
    {
      $this->repository = $repository;
    }

    public function getAll() 
    {
      $response = $this->repository->getAll();

      return $response;
    }

    /**
     * Get recent posts.
     * @param null  $limit
     * @return UserCollection
     */
    public function getRecent($limit = null)
    {
        $related = $this->repository->getRecent();

        return $related;
    }
    /**
     * Get sticky posts.
     * @param null  $limit
     * @return UserCollection
     */
    public function getSticky($limit = null)
    {
        $related = $this->repository->getSticky();

        return $related;
    }
    public function getBy($id) 
    {
      // If entity variable is numeric, assume ID
        if (is_numeric($id))
        {
            // Get Eloquent model based on ID
            $modelClassInstance = $this->repository->findById($id);
        }
        else 
        {
            // Since not numeric, lets try get the Eloquent model based on Name
            $modelClassInstance = $this->repository->findBySlug($id);
        }
        
        // If Eloquent model returned (rather than null) return the model
        if ($modelClassInstance != null)
        {
            $response = $modelClassInstance;

            return $response;
        }

    } 
}