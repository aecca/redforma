<?php

namespace Redforma\Identity\Infrastructure\Service\Auth;

use Redforma\Identity\Domain\Model\EncryptionService;
use Redforma\Identity\Domain\Model\User\Auth\Authentifier;
use Redforma\Identity\Domain\Model\User\User;
use Redforma\Identity\Domain\Model\User\UserRepository;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class SessionAuthentifier
 *
 * @package Redforma\Identity\Infrastructure\Service\Auth
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class SessionAuthentifier extends Authentifier
{
    protected $session;

    public function __construct(Session $session, UserRepository $userRepository, EncryptionService $encryptionService)
    {
        parent::__construct($userRepository, $encryptionService);

        $this->session = $session;
    }

    public function getIdentity()
    {
        return $this->session->get('redforma_auth');
    }

    public function persistIdentity(User $user)
    {
        $user->unsetPassword();
        $user->getPerson()->getFirstName();

        $this->session->set('redforma_auth', $user);
    }

    public function logout()
    {
        $this->session->remove('redforma_auth');
    }

    public function hasIdentity()
    {
        return $this->session->has('redforma_auth');
    }
}