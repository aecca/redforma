<?php

namespace Redforma\Common\Adapter\Input;

use InvalidArgumentException;

/**
 * Class Input
 *
 * @package Redforma\Common\Adapter\Input
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class Input
{
    protected static $attrCacheArray = [];

    private function getProperties()
    {
        $calledClass = get_called_class();

        if (!isset(static::$attrCacheArray[$calledClass])) {
            static::$attrCacheArray[$calledClass] = get_object_vars($this);
        }

        return static::$attrCacheArray[$calledClass];
    }

    public function __call($name, $arguments)
    {
        if (($properties = $this->getProperties()) && isset($properties[$name])) {
            return $properties[$name];
        }

        return null;
    }

}