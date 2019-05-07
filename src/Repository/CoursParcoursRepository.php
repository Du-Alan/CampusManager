<?php

namespace App\Repository;

use App\Entity\CoursParcours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CoursParcours|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoursParcours|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoursParcours[]    findAll()
 * @method CoursParcours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoursParcoursRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CoursParcours::class);
    }

    // /**
    //  * @return CoursParcours[] Returns an array of CoursParcours objects
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
    public function findOneBySomeField($value): ?CoursParcours
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
