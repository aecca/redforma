<?php

namespace Redforma\Identity\Application\Service;

use Redforma\Identity\Application\Data\RegisterUserInput;
use Redforma\Identity\Domain\Model\EncryptionService;
use Redforma\Identity\Domain\Model\User\Auth\Authentifier;
use Redforma\Identity\Domain\Model\User\Document;
use Redforma\Identity\Domain\Model\User\Person;
use Redforma\Identity\Domain\Model\User\RoleRepository;
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
    protected $roleRepository;
    protected $authentifier;
    protected $encryptionService;

    public function __construct(
        UserRepository $userRepository,
        RoleRepository $roleRepository,
        Authentifier $authentifier,
        EncryptionService $encryptionService)
    {
        $this->roleRepository = $roleRepository;
        $this->userRepository = $userRepository;
        $this->authentifier = $authentifier;
        $this->encryptionService = $encryptionService;
    }

    public function authenticate(User $user)
    {
        return $this->authentifier->authenticate($user);
    }

    public function register(RegisterUserInput $data): User
    {
        if (!$this->userRepository->isUniqueEmail($data->email())) {
            throw new \Exception('El email ya se encuentra en uso');
        }

        $user = new User();
        $user->setEmail($data->email());
        $user->setPassword($this->encryptedPassword($data->password()));
        $user->setRole($this->findRole($data->role()));

        $person = new Person($data->firstName(), $data->lastName());

        if ($data->documentNumber()) {
            $person->setDocument(new Document($data->documentNumber(), $data->documentType()));
        }

        $user->setPerson($person);
        $this->userRepository->persist($user);

        return $user;
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

    private function findRole($name)
    {
        $role = $this->roleRepository->findByName($name);

        if(null === $role) {
            throw new \Exception('El rol del usuario no existe o es incorrecto');
        }

        return $role;
    }

}