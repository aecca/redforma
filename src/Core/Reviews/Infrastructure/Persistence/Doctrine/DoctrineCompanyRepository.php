<?php

namespace Redforma\Reviews\Infrastructure\Persistence\Doctrine;

use Redforma\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Redforma\Reviews\Domain\Model\Company\CompanyRepository;

/**
 * Class DoctrineCompanyRepository
 *
 * @package Redforma\Reviews\Infrastructure\Persistence\Doctrine
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class DoctrineCompanyRepository extends DoctrineRepository  implements CompanyRepository
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
    public function findByName($name)
    {
        return $this->repository->findOneBy(['name' => $name]);
    }

    /**
     * {@inheritdoc}
     */
    public function all($limit, $page = 1, $order = null)
    {
        $qdb = $this->repository->createQueryBuilder('c')
            ->select('c, cat')
            ->join('c.categories', 'cat')
            ->setMaxResults($limit);

        if($page > 1) {
            $qdb->setFirstResult(($page - 1) * $limit);
        }

        if($order) {
            $qdb->orderBy($order);
        }

        return $qdb->getQuery()->getResult();
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        $qbd = $this->repository->createQueryBuilder('c')
            ->select('COUNT(1)')
            ->getQuery();

        return (int) $qbd->getSingleScalarResult();
    }

    /**
     * {@inheritdoc}
     */
    public function allFeatured($limit)
    {
        $qbd  = $this->repository->createQueryBuilder('c')
            ->select('c, cat')
            ->join('c.categories', 'cat')
            ->addOrderBy('c.numStats', 'desc')
            ->addOrderBy('c.numFavs', 'desc')
            ->addOrderBy('c.numReviews', 'desc')
            ->getQuery();

        return $qbd->getResult();

    }
}