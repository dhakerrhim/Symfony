<?php

namespace App\Repository;

use App\Entity\Paymentflouci;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Paymentflouci>
 *
 * @method Paymentflouci|null find($id, $lockMode = null, $lockVersion = null)
 * @method Paymentflouci|null findOneBy(array $criteria, array $orderBy = null)
 * @method Paymentflouci[]    findAll()
 * @method Paymentflouci[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaymentflouciRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Paymentflouci::class);
    }

    public function save(Paymentflouci $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Paymentflouci $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Paymentflouci[] Returns an array of Paymentflouci objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Paymentflouci
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
