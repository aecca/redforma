<?php

namespace Redforma\Identity\Infrastructure\Service;

use Redforma\Identity\Domain\Model\EncryptionService;

/**
 * Class RawEncryptionService
 *
 * @package Redforma\Identity\Infrastructure\Service
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class RawEncryptionService implements EncryptionService
{
    /**
     * {@inheritdoc}
     */
    public function encryptedValue(String $rawPassword): String
    {
        return $rawPassword;
    }

    /**
     * {@inheritdoc}
     */
    public function validatePassword(String $rawPassword, String $encryptedPassword): bool
    {
        return $rawPassword === $encryptedPassword;
    }
}