<?php

namespace Redforma\Identity\Infrastructure\Service;

use Redforma\Identity\Domain\Model\EncryptionService;

/**
 * Class MD5EncryptionService
 *
 * @package Redforma\Identity\Infrastructure\Service
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class MD5EncryptionService implements EncryptionService
{
    /**
     * {@inheritdoc}
     */
    public function encryptedValue(String $rawPassword): String
    {
        $salt = substr(md5(rand(0, 999999) + time()), 6, 5);

        return '$$' . $salt . '$$' . $this->generateHash($salt, $rawPassword);
    }

    /**
     * {@inheritdoc}
     */
    public function validatePassword(String $rawPassword, String $encryptedPassword): bool
    {
        list(, $salt, ) = explode('$$', $encryptedPassword);

        return $this->generateHash($salt, $rawPassword) == $encryptedPassword;
    }

    private function generateHash($salt, $password): String
    {
        return sha1($salt . $password);
    }
}