<?php namespace Ooglee\Domain\Entities\User;

use DomainException;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Ooglee\Domain\Events\EventableTrait;
use Ooglee\Domain\Entities\User\Contracts\IUser;
use Ooglee\Domain\Entities\User\UserBaseModel;
use Ooglee\Domain\Contracts\IAggregateRoot;

class User extends UserBaseModel implements IAggregateRoot, IUser {

	use EventableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tb_users';

	/**
     * Save User, ensuring all its Relationships
     * are assigned
     * @param array $options
     * @return bool|void
     * @throws \DomainException
     */
    public function save(array $options = array())
    {	
	    if(! $this->exists)
	        {
	            $this->recordEvent(new UserWasRegisteredEvent($this));
	        }

	    $saved = parent::save($options);

	    return $saved;
    }
}
