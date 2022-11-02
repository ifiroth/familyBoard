<?php

namespace App\Repository;

use App\Entity\Activity;
use App\Entity\PlannedActivity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PlannedActivity>
 *
 * @method PlannedActivity|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlannedActivity|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlannedActivity[]    findAll()
 * @method PlannedActivity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlannedActivityRepository extends ServiceEntityRepository
{
    public const DAY_START = 6;
    public const DAY_END = 21;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Activity::class);
    }

    public function add(PlannedActivity $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PlannedActivity $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findAllWithDate(): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT * FROM planned_activity p
            WHERE p.date IS NOT NULL
            ORDER BY p.date ASC
            ';
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }

    public function findAllWithDayOfWeek(): array
    {
        return $this->getEntityManager()->createQuery('
            SELECT p FROM App\Entity\PlannedActivity p
            INNER JOIN p.activity a
            WHERE p.dayOfWeek IS NOT NULL
            ORDER BY p.dayOfWeek ASC, p.time_start ASC
            
        ')->getResult();
    }

    public function findIt(int $id): ?PlannedActivity
    {
        return $this->getEntityManager()->createQuery('
            SELECT p FROM App\Entity\PlannedActivity p
            WHERE p.id = '. $id .'
            ORDER BY p.dayOfWeek ASC, p.time_start ASC
            
        ')->getOneOrNullResult();
    }
}
