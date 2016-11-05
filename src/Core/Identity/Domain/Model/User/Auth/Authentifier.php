<?php

namespace Redforma\Identity\Domain\Model\User\Auth;

use Exception;
use Redforma\Identity\Domain\Model\EncryptionService;
use Redforma\Identity\Domain\Model\User\User;
use Redforma\Identity\Domain\Model\User\UserRepository;

/**
 * Class Authentifier
 *
 * @package Redforma\Identity\Domain\Model\User\Auth
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
abstract class Authentifier
{
    protected $userRepository;
    protected $encryptionService;

    public function __construct(
        UserRepository $userRepository,
        EncryptionService $encryptionService)
    {
        $this->userRepository = $userRepository;
        $this->encryptionService = $encryptionService;
    }

    public function authenticate(User $auth): bool
    {
        $user = $this->userRepository->findByEmail($auth->getEmail());

        if (null === $user) {
            throw new Exception('El usuario solicitado no existe');
        }

        if (!$this->validatePassword($auth->getPassword(), $user->getPassword())) {
            throw new Exception('La contraseña no coincide o es incorrecta');
        }

        if (!$user->isActive()) {
            throw new Exception('El usuario se encuentra temporalmente inactivo');
        }

        $this->persistIdentity($user);

        return true;
    }

    private function validatePassword(String $rawPassword, String $encryptedPassword): bool
    {
        return $this->encryptionService->validatePassword($rawPassword, $encryptedPassword);
    }

    abstract public function hasIdentity();
    abstract public function logout();
    abstract public function getIdentity();
    abstract public function persistIdentity(User $user);
}