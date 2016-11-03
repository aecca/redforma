<?php

namespace Redforma\Identity\Domain\Model;

/**
 * Interface EncryptionService
 *
 * @package Redforma\Identity\Domain\Model
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
interface EncryptionService
{
    public function encryptedValue(String $rawPassword): String;
    public function validatePassword(String $rawPassword, String $encryptedPassword): bool ;
}