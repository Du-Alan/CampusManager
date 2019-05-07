<?php

namespace App\Repository;

use App\Entity\CoursPlanifie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CoursPlanifie|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoursPlanifie|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoursPlanifie[]    findAll()
 * @method CoursPlanifie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoursPlanifieRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CoursPlanifie::class);
    }

    // /**
    //  * @return CoursPlanifie[] Returns an array of CoursPlanifie objects
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
    public function findOneBySomeField($value): ?CoursPlanifie
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
