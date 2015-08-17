<?php  namespace Ooglee\Domain\Entities\User\Validators;

use Illuminate\Validation\Factory;
use Ooglee\Domain\Validation\ValidationException;
use Ooglee\Domain\Validation\ValidatorInterface;
use Ooglee\Domain\CommandBus\ICommand;

class CreateUserValidator implements ValidatorInterface {

    /**
     * @var \Illuminate\Validation\Factory
     */
    private $validator;

    /**
     * @var array
     */
    protected $rules = [
        'username' => 'required|max:255|unique:users',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|confirmed|min:6',
    ];

    public function __construct(Factory $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param Ooglee\Domain\CommandBus\ICommand
     * @throws Ooglee\Domain\Validation\ValidationException
     */
    public function validate(ICommand $command)
    {
        $validator = $this->validator->make([
            'username' => $command->username,
            'email' => $command->email,
            'password' => $command->password,
        ], $this->rules);

        if(!$validator->passes())
        {
            throw new ValidationException($validator->errors());
        }
    }
}