<?php

namespace Redforma\Identity\Application\Service;

use Redforma\Identity\Application\Data\RegisterUserInput;
use Redforma\Identity\Domain\Model\EncryptionService;
use Redforma\Identity\Domain\Model\User\Authentifier;
use Redforma\Identity\Domain\Model\User\User;
use Redforma\Identity\Domain\Model\User\UserRepository;

/**
 * Class UserService
 *
 * @package Redforma\Identity\Application\Service
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class UserService
{
    protected $userRepository;
    protected $authentifier;
    protected $encryptionService;

    public function __construct(
        UserRepository $userRepository,
        Authentifier $authentifier,
        EncryptionService $encryptionService)
    {
        $this->userRepository = $userRepository;
        $this->authentifier = $authentifier;
        $this->encryptionService = $encryptionService;
    }

    public function authenticate(User $user)
    {
        return $this->authentifier->authenticate($user);
    }

    public function register(RegisterUserInput $data): int
    {
        if(!$this->userRepository->isUniqueEmail($data->email())) {
            throw new \Exception('El email ya se encuentra en uso');
        }

        $user = new User($data->firstName(), $data->lastName());
        $user->setEmail($data->email());
        $user->setPassword($this->encryptedPassword($data->password()));

        $this->userRepository->persist($user);

        return $user->getId();
    }

    public function recoveryPassword($email)
    {
    }

    private function encryptedPassword($rawPassword)
    {
        return $this->encryptionService->encryptedValue($rawPassword);
    }

    public function getAuthentifier(): Authentifier
    {
        return $this->authentifier;
    }

}