<?php

namespace App\Repository;

use App\Entity\SettingsOpt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SettingsOpt>
 */
class SettingsOptRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SettingsOpt::class);
    }

    //    /**
    //     * @return SettingsOpt[] Returns an array of SettingsOpt objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?SettingsOpt
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }


    public function findProcessedSettings(): array
    {
        $settings = $this->findAll();
        $processedData = array($settings[0]);
        $processedData[] = str_replace([' ','(',')','-'],'',$settings[0]->getPhoneNumber());
        return $processedData;
    }
}
