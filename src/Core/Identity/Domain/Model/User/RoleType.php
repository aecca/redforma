<?php

namespace Redforma\Identity\Domain\Model\User;

use Redforma\Common\Domain\Model\Enum;

/**
 * Class RoleType
 *
 * @package Redforma\Identity\Domain\Model\User
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class RoleType extends Enum
{
    const GUEST = 'guest';
    const ADMIN = 'admin';
}