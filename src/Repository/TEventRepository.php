<?php
namespace App\Repository;
use App\Entity\TEvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
/**
 * @method TEvent|null find($id, $lockMode = null, $lockVersion = null)
 * @method TEvent|null findOneBy(array $criteria, array $orderBy = null)
 * @method TEvent[]    findAll()
 * @method TEvent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TEventRepository extends ServiceEntityRepository
{

    const MAX_ITEMS_PER_PAGE = 5;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TEvent::class);
    }
    // /**
    //  * @return TEvent[] Returns an array of TEvent objects
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
    public function findOneBySomeField($value): ?TEvent
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function search( string $name, string $sort, int $page ) {

        $stmt = $this->createQueryBuilder( 'e' );
        $stmt->andWhere( 'e.name LIKE :bind' )
             ->setParameter( ':bind', '%'.$name.'%' )
             ->setFirstResult( self::MAX_ITEMS_PER_PAGE * ($page-1) )
             ->setMaxResults( self::MAX_ITEMS_PER_PAGE );

        if ( $sort == 'price' ) {
            $stmt->orderBy( 'e.price', 'ASC' );
        } elseif ( $sort == 'date' ) {
            $stmt->orderBy( 'e.createddate', 'DESC' );
        }

        return $stmt->getQuery()
                    ->getResult();
    }

    public function counter() {
        return $this->createQueryBuilder( 'e' )
            ->select( 'count(e)' )
            ->andWhere( 'e.dateeventStart > :bind' )
            ->setParameter( ':bind', new \DateTime() )
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function counterAll() {
        return $this->createQueryBuilder( 'e' )
            ->select( 'count(e)' )
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function countPageForPagination() {
        return round( $this->counterAll() / self::MAX_ITEMS_PER_PAGE ) + 1;
    }

}