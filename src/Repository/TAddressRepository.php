<?php
namespace App\Repository;
use App\Entity\TAddress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
/**
 * @method TAddress|null find($id, $lockMode = null, $lockVersion = null)
 * @method TAddress|null findOneBy(array $criteria, array $orderBy = null)
 * @method TAddress[]    findAll()
 * @method TAddress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TAddressRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TAddress::class);
    }
    // /**
    //  * @return TAddress[] Returns an array of TAddress objects
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
    public function findOneBySomeField($value): ?TAddress
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