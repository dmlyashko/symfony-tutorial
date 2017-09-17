<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class GenusNoteRepository extends EntityRepository
{
    public function findAllRecentNotesForGenus(Genus $genus)
    {
        return $this->createQueryBuilder('genusNote')
            ->andWhere('genusNote.genus = :genus')
            ->setParameter('genus', $genus)
            ->andWhere('genusNote.createdAt > :recentDate')
            ->setParameter('recentDate', new \DateTime('-3 months'))
            ->getQuery()
            ->execute();
    }
}
