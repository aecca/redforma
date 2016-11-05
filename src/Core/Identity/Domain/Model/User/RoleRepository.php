<?php

namespace Redforma\Identity\Domain\Model\User;

/**
 * Interface RoleRepository
 *
 * @package Redforma\Identity\Domain\Model\User
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
interface RoleRepository
{
    /**
     * Find user by identifier
     *
     * @param int $id
     * @return Role
     */
    public function find(int $id) ;

    /**
     * Find role by name
     *
     * @param String $name
     * @return Role
     */
    public function findByName(String $name);
}