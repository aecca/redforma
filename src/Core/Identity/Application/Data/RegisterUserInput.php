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
 * @method string documentType()
 * @method string documentNumber()
 * @method string role()
 */
class RegisterUserInput extends Input
{
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    public $role = 'Reviewer';
    public $documentNumber;
    public $documentType;
}