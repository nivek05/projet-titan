<?php

namespace App\Repository;

use App\Entity\UsersRegistration;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UsersRegistration|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsersRegistration|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsersRegistration[]    findAll()
 * @method UsersRegistration[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersRegistrationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsersRegistration::class);
    }

    // /**
    //  * @return UsersRegistration[] Returns an array of UsersRegistration objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UsersRegistration
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
