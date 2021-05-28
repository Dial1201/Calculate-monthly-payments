<?php

namespace App\Repository;

use App\Entity\CalculRate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CalculRate|null find($id, $lockMode = null, $lockVersion = null)
 * @method CalculRate|null findOneBy(array $criteria, array $orderBy = null)
 * @method CalculRate[]    findAll()
 * @method CalculRate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CalculRateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CalculRate::class);
    }

    // /**
    //  * @return CalculRate[] Returns an array of CalculRate objects
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
    public function findOneBySomeField($value): ?CalculRate
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
