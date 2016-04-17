<?php namespace App\Ooglee\Application\Handlers;


use Illuminate\Database\Eloquent\Model;
use App\Ooglee\Domain\Contracts\IHandler;
use App\Ooglee\Domain\Entities\User

class UserRegisteredListener implements IListener {

	/**
	 * UserRegisteredListener implementation 
	 * 
	 */

	public function listenerHandle(AEvent $event)
    {
        $event->user;
    }
}
