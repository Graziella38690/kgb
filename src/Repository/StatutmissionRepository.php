<?php

namespace App\Repository;

use App\Entity\Statumission;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Statumission|null find($id, $lockMode = null, $lockVersion = null)
 * @method Statumission|null findOneBy(array $criteria, array $orderBy = null)
 * @method Statumission[]    findAll()
 * @method Statumission[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatutmissionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Statumission::class);
    }

    // /**
    //  * @return Statumission[] Returns an array of Statumission objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Statumission
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
