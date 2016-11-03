<?php

namespace Redforma\Identity\Domain\Model;

use Redforma\Common\Util\Strings;

/**
 * Class EmailService
 *
 * @package Redforma\Identity\Domain\Model
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class EmailService
{

    public function isValidEmail($email): bool
    {
        if (!Strings::isEmail($email)) {
            return false;
        }

        $blackListProviders = [
            'yopmail.com',
            'mailinator.com',
            'dayrep.com',
            'nowmymail.com',
            'mailbox92.com',
            'guerrillamail.com',
            'dodsi.com',
            'mohmal.com',
            'maildrop.cc',
            'harakirimail.com',
            'dispostable.com',
            'spamgourmet.com',
            'trashmail.com',
            'discard.email',
            'InstantEmailAddress.com',
            'mailforspam.com',
            'mailimate.com',
        ];

        list(, $provider) = explode('@', $email);
        return !in_array($provider, $blackListProviders);
    }


}