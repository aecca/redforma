<?php

namespace Redforma\Reviews\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\Query\Expr;
use Redforma\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Redforma\Reviews\Domain\Model\Company\CategoryRepository;

/**
 * Class DoctrineCategoryRepository
 *
 * @package Redforma\Reviews\Infrastructure\Persistence\Doctrine
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class DoctrineCategoryRepository extends DoctrineRepository  implements CategoryRepository
{
    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return $this->repository->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return $this->repository->findAll();
    }
}