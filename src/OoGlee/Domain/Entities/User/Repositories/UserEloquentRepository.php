<?php namespace Ooglee\Domain\Entities\User\Repositories;

 use Eloquent;
 use Ooglee\Domain\Entities\User\IUserRepository;
 use Ooglee\Domain\Entities\Eloquent\ABaseEloquentRepository;

 class UserEloquentRepository extends ABaseEloquentRepository implements IUserRepository {

  	protected $modelClassInstance;

 	public function __construct(Eloquent $model)
    {
        $this->modelClassInstance = $model;

        parent::__construct($model);
    }
}
