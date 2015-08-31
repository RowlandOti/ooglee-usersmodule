<?php namespace Ooglee\Framework\Http\Controllers;

class RegisterUserController extends Controller {

    private $bus;

    public function __construct(ACommandBus $bus) 
    {
        $this->bus = $bus;
    }

    public function showRegistrationForm() 
    {
        // create and return form html here
    }

    public function submitRegistration(Request $request) 
    {
        // 1. handle form validation here
        // 2. create command
    	$command = RegisterUserCommand::withForm($request);
        // 3. execute command
        $this->bus->execute($command);
        // 4. return redirection response
    }
}