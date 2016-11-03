<?php

namespace Redforma\Identity\Domain\Model\User;

use Redforma\Common\Domain\Model\Enum;

/**
 * Class DocumentType
 *
 * @package Redforma\Identity\Domain\Model\User
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class DocumentType extends Enum
{
    const DNI = 'dni';
    const PASSPORT = 'passport';
    const CE = 'ce'; // carnet de extranjeria
}