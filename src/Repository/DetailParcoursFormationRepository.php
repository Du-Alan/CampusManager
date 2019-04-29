<?php

namespace App\Repository;

use App\Entity\DetailParcoursFormation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DetailParcoursFormation|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetailParcoursFormation|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetailParcoursFormation[]    findAll()
 * @method DetailParcoursFormation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetailParcoursFormationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DetailParcoursFormation::class);
    }

    // /**
    //  * @return DetailParcoursFormation[] Returns an array of DetailParcoursFormation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DetailParcoursFormation
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
