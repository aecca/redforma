<?php

namespace Redforma\Identity\Domain\Model\User;

use Redforma\Common\Domain\Model\Entity;

/**
 * Class Role
 *
 * @package Redforma\Identity\Domain\Model\User
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class Role extends Entity
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return String
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param String $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}