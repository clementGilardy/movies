<?php

namespace Movies\MoviesBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * MoviesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MoviesRepository extends EntityRepository
{
	public function getMoviesWithActeurs(array $acteurs)
	{
		$qb = $this->createQueryBuilder('movies');
		
		$qb->join('movies.acteur','a')
		->addSelect('a');
		
		$qb->where($qb->expr()->in('a.nom', $acteurs));

		return $qb->getQuery()->getResult();
	}
}
