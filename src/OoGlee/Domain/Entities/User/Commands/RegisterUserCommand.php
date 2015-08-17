<?php namespace Ooglee\Domain\Entities\User\Commands;

use Ooglee\Domain\Entities\ACommand;
use Ooglee\Domain\CommandBus\ICommand;

class RegisterUserCommand extends ACommand implements ICommand{

	/**
	 * Defines that our application can register a user
	 * This functions like a Data Transfer Object (DTO)
	 */
	
	/**
	 * User username
	 *
	 * @var  String
	 */
	protected $username;
	/**
	 * User email
	 *
	 * @var  String
	 */
	protected $email;
	/**
	 * User password
	 *
	 * @var  $String
	 */
    protected $password;

    /**
	 *
	 * @param  $email, $password
	 */

    public static function withForm(Request $request) 
    {
        return new static(
        	$request->get('username'),
            $request->get('email'),
            $request->get('password')
        );
    }

    public function __construct($username, $email, $password)
    {
    	$this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

     /**
	 *
	 * @return $email
	 */
    public function getUsername() 
    {
    	return $this->username;
    } 

    /**
	 *
	 * @return $email
	 */
    public function getEmail() 
    {
    	return $this->email;
    } 

    /**
	 *
	 * @return $password
	 */
    public function getPassword() 
    {
		return $this->password;
    }   

}
