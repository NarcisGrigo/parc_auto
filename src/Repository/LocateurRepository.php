<?php

namespace App\Repository;

use App\Entity\Locateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Locateur>
 *
 * @method Locateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Locateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Locateur[]    findAll()
 * @method Locateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Locateur::class);
    }

//    /**
//     * @return Locateur[] Returns an array of Locateur objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Locateur
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
