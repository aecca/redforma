<?php

namespace Redforma\Reviews\Infrastructure\Persistence\Doctrine;

use Redforma\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Redforma\Reviews\Domain\Model\Review\Review;
use Redforma\Reviews\Domain\Model\Review\ReviewRepository;

/**
 * Class DoctrineReviewRepository
 *
 * @package Redforma\Reviews\Infrastructure\Persistence\Doctrine
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class DoctrineReviewRepository extends DoctrineRepository  implements ReviewRepository
{
    /**
     * {@inheritdoc}
     */
    public function save(Review $review)
    {
        $this->em->persist($review);
        $this->em->flush($review);
    }

    /**
     * {@inheritdoc}
     */
    public function update(Review $review)
    {
        $this->em->merge($review);
        $this->em->flush($review);
    }

    /**
     * {@inheritdoc}
     */
    public function delete(Review $review)
    {
        $this->em->remove($review);
        $this->em->flush($review);
    }

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
    public function findByAuthor($authorId)
    {
        $qbd = $this->repository->createQueryBuilder('r')
            ->select('r, a, c')
            ->join('r.author', 'a')
            ->join('r.company', 'c')
            ->where('r.author =:author')
            ->setParameter([
                'author' => $authorId
            ])
            ->getQuery();

        return $qbd->getResult();
    }

    /**
     * {@inheritdoc}
     */
    public function findByCompany($companyId)
    {
        $qbd = $this->repository->createQueryBuilder('r')
            ->select('r, a, c')
            ->join('r.author', 'a')
            ->join('r.company', 'c')
            ->where('r.company =:company')
            ->setParameter([
                'company' => $companyId
            ])
            ->getQuery();

        return $qbd->getResult();
    }

    /**
     * {@inheritdoc}
     */
    public function findByCategory($categoryId)
    {
        $qbd = $this->repository->createQueryBuilder('r')
            ->select('r, a, c')
            ->join('r.author', 'a')
            ->join('r.company', 'c')
            ->join('c.categories', 'category')
            ->where('category =:category')
            ->setParameter([
                'category' => $categoryId
            ])
            ->getQuery();

        return $qbd->getResult();
    }
}