<?php
namespace App\Repository;
use App\Entity\TProgram;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
/**
 * @method TProgram|null find($id, $lockMode = null, $lockVersion = null)
 * @method TProgram|null findOneBy(array $criteria, array $orderBy = null)
 * @method TProgram[]    findAll()
 * @method TProgram[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TProgramRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TProgram::class);
    }
    // /**
    //  * @return TProgram[] Returns an array of TProgram objects
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
    public function findOneBySomeField($value): ?TProgram
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