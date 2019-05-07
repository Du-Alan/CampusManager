<?php

namespace App\Repository;

use App\Entity\ParcoursFormation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ParcoursFormation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParcoursFormation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParcoursFormation[]    findAll()
 * @method ParcoursFormation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParcoursFormationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ParcoursFormation::class);
    }

    // /**
    //  * @return ParcoursFormation[] Returns an array of ParcoursFormation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ParcoursFormation
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
