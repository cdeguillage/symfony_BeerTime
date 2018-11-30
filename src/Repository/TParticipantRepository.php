<?php
namespace App\Repository;
use App\Entity\TParticipant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
/**
 * @method TParticipant|null find($id, $lockMode = null, $lockVersion = null)
 * @method TParticipant|null findOneBy(array $criteria, array $orderBy = null)
 * @method TParticipant[]    findAll()
 * @method TParticipant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TParticipantRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TParticipant::class);
    }
    // /**
    //  * @return TParticipant[] Returns an array of TParticipant objects
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
    public function findOneBySomeField($value): ?TParticipant
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