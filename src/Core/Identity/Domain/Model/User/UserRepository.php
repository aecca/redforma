<?php

namespace Redforma\Identity\Domain\Model\User;

/**
 * Interface UserRepository
 *
 * @package Redforma\Identity\Domain\Model\User
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
interface UserRepository
{
    /**
     * Find user by identifier
     *
     * @param int $id
     * @return User
     */
    public function find(int $id);

    /**
     * Find user by email
     *
     * @param String $email
     * @return User
     */
    public function findByEmail(String $email);

    /**
     * Find user by email and role
     *
     * @param String $email
     * @param String $role
     * @return User
     */
    public function findByEmailRole(String $email, String $role);

    /**
     * Persist user into repository
     *
     * @param User $user
     * @return bool
     */
    public function persist(User $user);

    /**
     * Check if email exists in repository
     *
     * @param $email
     * @return mixed
     */
    public function isUniqueEmail($email): bool;
}