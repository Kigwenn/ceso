<?php

namespace App\Repository;

use App\Entity\CentresFormations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CentresFormations|null find($id, $lockMode = null, $lockVersion = null)
 * @method CentresFormations|null findOneBy(array $criteria, array $orderBy = null)
 * @method CentresFormations[]    findAll()
 * @method CentresFormations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CentresFormationsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CentresFormations::class);
    }

    // /**
    //  * @return CentresFormations[] Returns an array of CentresFormations objects
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
    public function findOneBySomeField($value): ?CentresFormations
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
