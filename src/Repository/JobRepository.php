<?php

namespace App\Repository;

use App\Entity\Job;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Job>
 *
 * @method Job|null find($id, $lockMode = null, $lockVersion = null)
 * @method Job|null findOneBy(array $criteria, array $orderBy = null)
 * @method Job[]    findAll()
 * @method Job[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Job::class);
    }

    public function add(Job $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Job $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Job[] Returns an array of Job objects
     */
    public function findAllFavouriteFirst(): array
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.top = :top')
            ->setParameter('top', false)
            ->orderBy('j.favourite', 'DESC')
            ->addOrderBy('j.appliedOn', 'ASC')
            ->setMaxResults(100)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Job[] Returns an array of Job objects
     */
    public function findByStatus($status): array
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.top = :top')
            ->setParameter('top', false)
            ->andWhere('j.status = :status')
            ->setParameter('status', $status)
            ->orderBy('j.favourite', 'DESC')
            ->addOrderBy('j.appliedOn', 'ASC')
            ->setMaxResults(100)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Job[] Returns an array of Job objects
     */
    public function findActiveJobs(): array
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.top = :top')
            ->setParameter('top', false)
            ->andWhere('j.status > :val')
            ->setParameter('val', 0)
            ->orderBy('j.favourite', 'DESC')
            ->addOrderBy('j.appliedOn', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /** @return Job[] */
    public function findTopJobs(): array
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.top = :top')
            ->setParameter('top', true)
            ->orderBy('j.appliedOn', 'ASC')
            ->getQuery()
            ->getResult();
    }

//    public function findOneBySomeField($value): ?Job
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

}
