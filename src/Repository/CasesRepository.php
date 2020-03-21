<?php

namespace App\Repository;

use App\Entity\Cases;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Cases|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cases|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cases[]    findAll()
 * @method Cases[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CasesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cases::class);
    }

    // /**
    //  * @return Cases[] Returns an array of Cases objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Cases
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
