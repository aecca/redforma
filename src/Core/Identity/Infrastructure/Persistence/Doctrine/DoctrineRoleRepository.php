<?php

namespace  Redforma\Identity\Infrastructure\Persistence\Doctrine;

use Redforma\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Redforma\Identity\Domain\Model\User\RoleRepository;

/**
 * Class DoctrineRoleRepository
 *
 * @package Redforma\Identity\Infrastructure\Persistence\Doctrine
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class DoctrineRoleRepository extends DoctrineRepository implements RoleRepository
{
    /**
     * {@inheritdoc}
     */
    public function find(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function findByName(String $name)
    {
        return $this->repository->findOneBy(['name' => $name]);
    }
}