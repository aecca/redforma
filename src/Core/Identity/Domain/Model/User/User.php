<?php

namespace Redforma\Identity\Domain\Model\User;

use DateTime;
use Redforma\Common\Domain\Model\Entity;
use Redforma\Identity\Domain\Model\EmailService;

/**
 * Class User
 *
 * @package Redforma\Identity\Domain\Model\User
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class User extends Entity
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
    protected $person;

    public function __construct($email = null, $password = null)
    {
        if ($email) {
            $this->setEmail($email);
        }

        if ($password) {
            $this->setPassword($password);
        }

        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
    }

    public function getEmail(): String
    {
        return $this->email;
    }

    public function setEmail($email)
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

    public function getRole(): Role
    {
        return $this->role;
    }

    public function setRole(Role $role)
    {
        $this->role = $role;
    }

    public function isActive():bool
    {
        return true;
    }

    public function setLastLogin(DateTime $dateTime)
    {
        $this->lastLogin = $dateTime;
    }

    public function getPerson(): Person
    {
        return $this->person;
    }

    public function unsetPassword()
    {
        $this->password = null;
    }

    public function setPerson(Person $person)
    {
        $person->setUser($this);

        $this->person = $person;

    }

}