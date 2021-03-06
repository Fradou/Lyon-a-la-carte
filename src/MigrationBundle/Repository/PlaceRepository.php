<?php

namespace MigrationBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PlaceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PlaceRepository extends EntityRepository
{
    public function checkExistence($idopen, $idsitra, $gid){
        $qb = $this->createQueryBuilder('p')
            ->select('p')
            ->where('p.idopen = :idopen')
            ->orWhere('p.id_sitra1 = :idsitra')
            ->orWhere('p.gid = :gid')
            ->setParameters(array("idopen" => $idopen, "idsitra" => $idsitra, "gid" => $gid))
            ->getQuery();

        return $qb->getResult();

    }
}
