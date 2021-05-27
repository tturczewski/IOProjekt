<?php

namespace App\Repository;

use App\Entity\Terminarz;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Terminarz|null find($id, $lockMode = null, $lockVersion = null)
 * @method Terminarz|null findOneBy(array $criteria, array $orderBy = null)
 * @method Terminarz[]    findAll()
 * @method Terminarz[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TerminarzRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Terminarz::class);
    }

    // /**
    //  * @return Terminarz[] Returns an array of Terminarz objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Terminarz
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
