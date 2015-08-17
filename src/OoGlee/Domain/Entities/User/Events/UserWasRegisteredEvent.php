<?php namespace Ooglee\Domain\Entities\User\Events;

use Ooglee\Domain\Entities\User\User;
use Ooglee\Domain\Entities\AEvent;
use Ooglee\Domain\Contracts\IEvent;


class UserWasRegisteredEvent extends AEvent implements IEvent
{
    /**
     * Domain Event, which our application might dispatch after a user is registered
     */
    
    /**
     *
     * @var User 
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @param  User 
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Return the event name
     * @return string
     */
    public function getName()
    {
        return get_class($this);
    }

}