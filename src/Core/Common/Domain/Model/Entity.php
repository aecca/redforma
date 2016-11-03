<?php

namespace Redforma\Common\Domain\Model;

use Assert\Assertion;

/**
 * Class Entity
 *
 * @package Redforma\Common\Domain\Model
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class Entity extends Assertion
{
    protected $id = -1;

    public function getId():int
    {
        return $this->id;
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}