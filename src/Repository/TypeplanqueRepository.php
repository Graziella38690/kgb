<?php

namespace App\Repository;

use App\Entity\Typeplanque;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Typeplanque|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typeplanque|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typeplanque[]    findAll()
 * @method Typeplanque[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeplanqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typeplanque::class);
    }

    // /**
    //  * @return Typeplanque[] Returns an array of Typeplanque objects
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
    public function findOneBySomeField($value): ?Typeplanque
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
