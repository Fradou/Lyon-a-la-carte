<?php

namespace CarteBundle\Repository;

use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\ORM\EntityRepository;

/**
 * LocationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LocationRepository extends EntityRepository
{
    public function searchloca($categories, $localisations){
        $qb = $this->createQueryBuilder('l');
        $qb->select('l');
        if(isset($categories) && $categories != [""]){
            $i=0;
            $req='';
            foreach($categories as $category){
                if($i>0){
                    $req.=' OR ';
                }
                $req.= 'l.type = :catego'.$i;
                $qb->setParameter('catego'.$i, $category);
                $i++;
            }
            $qb->where($req);
        }
        if(isset($localisations) && $localisations != []){
            $i=0;
            $req='';
            foreach($localisations as $localisation){
                if($i>0){
                    $req.=' OR ';
                }
                $req.= 'l.postalcode = :local'.$i;
                $qb->setParameter('local'.$i, $localisation->getPostalcode());
                $i++;
            }
            $qb->andWhere($req);
        }

        return $qb->getQuery()->getResult();
    }


    public function getpostalcodes(){
        $qb = $this->createQueryBuilder('l')
            ->select('DISTINCT l.postalcode')
            ->orderBy('l.postalcode')
            ->getQuery();
        $qb->getResult();
    }
}