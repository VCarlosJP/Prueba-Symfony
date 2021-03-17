<?php

namespace App\Repository;

use App\Entity\MedicionesVino;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MedicionesVino|null find($id, $lockMode = null, $lockVersion = null)
 * @method MedicionesVino|null findOneBy(array $criteria, array $orderBy = null)
 * @method MedicionesVino[]    findAll()
 * @method MedicionesVino[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedicionesVinoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MedicionesVino::class);
    }

    public function findAllMeasurements(): array
    {
        $query = $this->_em->createQuery(
            'SELECT m, v, t
                         FROM App\Entity\MedicionesVino m
                         INNER JOIN m.variedad v
                         INNER JOIN m.tipo t
                         ORDER BY m.id ASC');
        return $query->getArrayResult();
    }

    // /**
    //  * @return MedicionesVino[] Returns an array of MedicionesVino objects
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
    public function findOneBySomeField($value): ?MedicionesVino
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
