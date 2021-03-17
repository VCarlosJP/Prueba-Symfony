<?php

namespace App\Repository;

use App\Entity\TipoSensor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TipoSensor|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoSensor|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoSensor[]    findAll()
 * @method TipoSensor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoSensorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoSensor::class);
    }

    // /**
    //  * @return TipoSensor[] Returns an array of TipoSensor objects
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
    public function findOneBySomeField($value): ?TipoSensor
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
