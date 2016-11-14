<?php

namespace Redforma\Common\Util;

/**
 * Class Strings
 *
 * @package Redforma\Common\Util
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class Strings
{
    /**
     * String to slug
     *
     * @param String $string
     * @return String
     */
    public static function slugify(String $string): String
    {
        return trim(strtolower(str_replace(' ', '-', $string)));
    }

    /**
     * Validate email
     *
     * @param string $email
     * @return bool
     */
    public static function isEmail($email): bool
    {
        if(empty($email)) {
            return false;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }
}