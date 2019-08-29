<?php

namespace App\Repository;

use App\Entity\Coupes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Coupes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Coupes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Coupes[]    findAll()
 * @method Coupes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoupesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Coupes::class);
    }

    // /**
    //  * @return Coupes[] Returns an array of Coupes objects
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
    public function findOneBySomeField($value): ?Coupes
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
