<?php

namespace Movies\ActorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActorRoleMovie
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Movies\ActorBundle\Entity\ActorRoleMovieRepository")
 */
class ActorRoleMovie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="Movies\ActorBundle\Entity\Role")
     */
    private $roles;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="Movies\MoviesBundle\Entity\Movies")
     */
    private $movies;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="Movies\ActorBundle\Entity\Actor")
     */
    private $actors;
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
