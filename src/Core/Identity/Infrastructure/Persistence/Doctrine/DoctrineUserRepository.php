<?php

namespace  Redforma\Identity\Infrastructure\Persistence\Doctrine;

use Redforma\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Redforma\Identity\Domain\Model\User\User;
use Redforma\Identity\Domain\Model\User\UserRepository;

/**
 * Class DoctrineUserRepository
 *
 * @package Redforma\Identity\Infrastructure\Persistence\Doctrine
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class DoctrineUserRepository extends DoctrineRepository implements UserRepository
{
    /**
     * {@inheritdoc}
     */
    public function find(int $id): User
    {
        return $this->repository->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function findByEmail(String $email): User
    {
        return $this->repository->findOneBy(['email' => $email]);
    }

    /**
     * {@inheritdoc}
     */
    public function findByEmailRole(String $email, String $role): User
    {
        $qbd = $this->repository->createQueryBuilder('u')
            ->select('u')
            ->where('u.email=:email')
            ->where('u.role=:role')
            ->setParameters([
                'email' =>$email,
                'role' => $role
            ])
            ->setMaxResults(1)
            ->getQuery();

        return $qbd->getOneOrNullResult();
    }

    /**
     * {@inheritdoc}
     */
    public function persist(User $user): bool
    {
        $this->em->persist($user);
        $this->em->flush($user);
    }

    /**
     * {@inheritdoc}
     */
    public function isUniqueEmail($email): bool
    {
        $qbd = $this->repository->createQueryBuilder('u')
            ->select('COUNT(1)')
            ->where('u.email=:email')
            ->setParameter('email', $email)
            ->getQuery();

        return $qbd->getSingleScalarResult() < 1 ;
    }
}