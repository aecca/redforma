<?php

namespace Redforma\Common\Domain\Model;

use ReflectionClass;

/**
 * Class Enum
 *
 * @package Redforma\Common\Domain\Model
 * @link http://stackoverflow.com/questions/254514/php-and-enumerations?answertab=votes#tab-top
 */
class Enum
{
    private static $constCacheArray = NULL;

    private static function getConstants()
    {
        if (static::$constCacheArray == NULL) {
            static::$constCacheArray = [];
        }
        $calledClass = get_called_class();
        if (!array_key_exists($calledClass, static::$constCacheArray)) {
            $reflect = new ReflectionClass($calledClass);
            static::$constCacheArray[$calledClass] = $reflect->getConstants();
        }
        return static::$constCacheArray[$calledClass];
    }

    public static function isValidName($name, $strict = false)
    {
        $constants = static::getConstants();

        if ($strict) {
            return array_key_exists($name, $constants);
        }

        $keys = array_map('strtolower', array_keys($constants));
        return in_array(strtolower($name), $keys);
    }

    public static function isValidValue($value, $strict = true)
    {
        $values = array_values(static::getConstants());
        return in_array($value, $values, $strict);
    }
}