<?php

namespace App\Repository;

use App\Entity\GuestBlog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GuestBlog|null find($id, $lockMode = null, $lockVersion = null)
 * @method GuestBlog|null findOneBy(array $criteria, array $orderBy = null)
 * @method GuestBlog[]    findAll()
 * @method GuestBlog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuestBlogRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GuestBlog::class);
    }

    // /**
    //  * @return GuestBlog[] Returns an array of GuestBlog objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GuestBlog
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
