<?php

namespace Redforma\Identity\Application\Data;

use Redforma\Common\Adapter\Input\Input;

/**
 * Class RegisterUserInput
 *
 * @package Redforma\Identity\Application\Data
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 *
 * @method string firstName()
 * @method string lastName()
 * @method string email()
 * @method string password()
 */
class RegisterUserInput extends Input
{
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $password;
    protected $role;
    protected $documentNumber;
    protected $documentType;

    public function __construct($firstName, $lastName, $email, $password, $role, $documentNumber, $documentType)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->documentNumber = $documentNumber;
        $this->documentType = $documentType;
    }
}