<?php namespace Ooglee\Domain\Providers;

use Illuminate\Support\ServiceProvider;
use Ooglee\Domain\Entities\User\Repositories\UserEloquentRepository;
use Ooglee\Domain\Entities\User\User;

/**
* Register our Repository with Laravel
*/
class UserServiceProvider extends ServiceProvider {

    /**
    * Registers the service in the IoC Container
    * 
    */
    public function register() {

        // Bind the returned class to the namespace 'Ooglee\Domain\Entities\User\IUserRepository'
        $this->app->bind('Ooglee\Domain\Entities\User\Contracts\IUserRepository', function($app)
        {
            return new UserEloquentRepository(new User());
            //$model = $this->app['config']['ioc.app.user_model'];
            //$model = \Config::get('ooglee::ioc.app.user_model');
            //var_dump(new UserEloquentRepository(new $model()));
            //return new UserEloquentRepository(new $model);
        });
    }
}