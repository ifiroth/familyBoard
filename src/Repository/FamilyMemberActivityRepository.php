<?php

namespace App\Repository;

use App\Entity\FamilyMember;
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
class FamilyMemberActivityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlannedActivity::class);
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
}
