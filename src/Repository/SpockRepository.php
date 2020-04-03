<?php

namespace App\Repository;

use App\Entity\Spock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Spock|null find($id, $lockMode = null, $lockVersion = null)
 * @method Spock|null findOneBy(array $criteria, array $orderBy = null)
 * @method Spock[]    findAll()
 * @method Spock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Spock::class);
    }

    // /**
    //  * @return Spock[] Returns an array of Spock objects
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
    public function findOneBySomeField($value): ?Spock
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
