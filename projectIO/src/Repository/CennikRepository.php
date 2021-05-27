<?php

namespace App\Repository;

use App\Entity\Cennik;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Cennik|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cennik|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cennik[]    findAll()
 * @method Cennik[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CennikRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cennik::class);
    }

    // /**
    //  * @return Cennik[] Returns an array of Cennik objects
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
    public function findOneBySomeField($value): ?Cennik
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
