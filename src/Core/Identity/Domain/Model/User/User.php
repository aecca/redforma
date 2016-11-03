<?php

namespace Redforma\Identity\Domain\Model\User;

use DateTime;
use Redforma\Identity\Domain\Model\EmailService;

/**
 * Class User
 *
 * @package Redforma\Identity\Domain\Model\User
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class User extends Person
{
    const STATE_ACTIVE = 1;
    const STATE_INACTIVE = 0;
    const STATE_BLOCKED = 2;

    protected $email;
    protected $password;
    protected $role;
    protected $state;
    protected $createdAt;
    protected $updatedAt;
    protected $lastLogin;

    public function __construct($firstName, $lastName)
    {
        parent::__construct($firstName, $lastName);

        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
    }

    public function getEmail(): String
    {
        return $this->email;
    }

    public function setEmail(String $email)
    {
        $this->same(true, (new EmailService())->isValidEmail($email), 'El email es incorrecto');
        $this->email = $email;
    }

    public function getPassword(): String
    {
        return $this->password;
    }

    public function setPassword(String $password)
    {
        $this->notEmpty($password, 'La contraseña es requerida');
        $this->password = $password;
    }

    public function getRole(): String
    {
        return $this->role;
    }

    public function setRole(String $role)
    {
        $this->same(true, RoleType::isValidValue($role), 'El rol del usuario es incorrecto');
        $this->role = $role;
    }

    public function isActive():bool
    {
        return $this->state == static::STATE_ACTIVE;
    }

    public function setLastLogin(DateTime $dateTime)
    {
        $this->lastLogin = $dateTime;
    }

}