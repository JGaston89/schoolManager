<?php

namespace App\Repository;

use App\Entity\Asignature;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Asignature>
 *
 * @method Asignature|null find($id, $lockMode = null, $lockVersion = null)
 * @method Asignature|null findOneBy(array $criteria, array $orderBy = null)
 * @method Asignature[]    findAll()
 * @method Asignature[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AsignatureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Asignature::class);
    }

//    /**
//     * @return Asignature[] Returns an array of Asignature objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Asignature
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
