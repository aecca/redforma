<?php

namespace Redforma\Common\Adapter\Persistence\Doctrine;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/**
 * Class DoctrineRepository
 *
 * @package Redforma\Common\Adapter\Persistence\Doctrine
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class DoctrineRepository
{
    protected $em;
    protected $repository;

    public function __construct($entityName, EntityManager $entityManager)
    {
        $this->em = $entityManager;
        $this->repository = $this->em->getRepository($entityName);
    }

    public function getEntityManager(): EntityManager
    {
        return $this->em;
    }

    public function getRepository(): EntityRepository
    {
        return $this->repository;
    }
}