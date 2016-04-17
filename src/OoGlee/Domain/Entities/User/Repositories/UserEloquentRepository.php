<?php namespace Ooglee\Domain\Entities\User\Repositories;

use Ooglee\Domain\Entities\User\Contracts\IUser;
use Ooglee\Domain\Entities\User\Contracts\IUserRepository;
use Ooglee\Domain\Entities\User\AUserEloquentRepository;

 class UserEloquentRepository extends AUserEloquentRepository implements IUserRepository {

  	protected $modelClassInstance;

 	public function __construct(IUser $model)
    {
        $this->modelClassInstance = $model;

        parent::__construct($model);
    }
}
