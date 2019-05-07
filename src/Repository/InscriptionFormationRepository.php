<?php

namespace App\Repository;

use App\Entity\InscriptionFormation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method InscriptionFormation|null find($id, $lockMode = null, $lockVersion = null)
 * @method InscriptionFormation|null findOneBy(array $criteria, array $orderBy = null)
 * @method InscriptionFormation[]    findAll()
 * @method InscriptionFormation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscriptionFormationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, InscriptionFormation::class);
    }

    // /**
    //  * @return InscriptionFormation[] Returns an array of InscriptionFormation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InscriptionFormation
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
