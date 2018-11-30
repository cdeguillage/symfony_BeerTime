<?php
namespace App\Repository;
use App\Entity\TTags;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
/**
 * @method TTags|null find($id, $lockMode = null, $lockVersion = null)
 * @method TTags|null findOneBy(array $criteria, array $orderBy = null)
 * @method TTags[]    findAll()
 * @method TTags[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TTagsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TTags::class);
    }
    // /**
    //  * @return TTags[] Returns an array of TTags objects
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
    public function findOneBySomeField($value): ?TTags
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