<?php

namespace App\Repository;

use App\Entity\MedicionesTipoVino;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MedicionesTipoVino|null find($id, $lockMode = null, $lockVersion = null)
 * @method MedicionesTipoVino|null findOneBy(array $criteria, array $orderBy = null)
 * @method MedicionesTipoVino[]    findAll()
 * @method MedicionesTipoVino[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedicionesTipoVinoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MedicionesTipoVino::class);
    }


    // /**
    //  * @return MedicionesTipoVino[] Returns an array of MedicionesTipoVino objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MedicionesTipoVino
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
