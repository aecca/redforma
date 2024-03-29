<?php

namespace Redforma\Identity\Domain\Model\User;

use Redforma\Common\Domain\Model\Entity;

/**
 * Class Person
 *
 * @package Redforma\Identity\Domain\Model\User
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class Person extends Entity
{
    protected $firstName;
    protected $lastName;
    protected $contactInfo;
    protected $document;
    protected $user;

    public function __construct(String $firstName , String $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->document = new Document(0);
        $this->contactInfo = new ContactInformation();
    }

    public function getFirstName(): String
    {
        return $this->firstName;
    }

    public function setFirstName(String $firstName)
    {
        $this->notEmpty($firstName, 'El nombre es requerido');
        $this->firstName = $firstName;
    }

    public function getLastName(): String
    {
        return $this->lastName;
    }

    public function setLastName(String $lastName)
    {
        $this->notEmpty($lastName, 'Los apellidos son requeridos');
        $this->lastName = $lastName;
    }

    public function setDocument(Document $document)
    {
        $this->document = $document;
    }

    public function setContactInformation(ContactInformation $info)
    {
        $this->contactInfo = $info;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }

}