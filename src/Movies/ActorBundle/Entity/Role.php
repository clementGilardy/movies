<?php

namespace Movies\ActorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Movies\ActorBundle\Entity\RoleRepository")
 */
class Role
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
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255)
     */
    private $role;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Movies\ActorBundle\Entity\Actor")
     */
    private $acteur;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Movies\MoviesBundle\Entity\Movies")
     */
    private $movie;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return Role
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->acteur = new \Doctrine\Common\Collections\ArrayCollection();
        $this->movie = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add acteur
     *
     * @param \Movies\ActorBundle\Entity\Actor $acteur
     * @return Role
     */
    public function addActeur(\Movies\ActorBundle\Entity\Actor $acteur)
    {
        $this->acteur[] = $acteur;

        return $this;
    }

    /**
     * Remove acteur
     *
     * @param \Movies\ActorBundle\Entity\Actor $acteur
     */
    public function removeActeur(\Movies\ActorBundle\Entity\Actor $acteur)
    {
        $this->acteur->removeElement($acteur);
    }

    /**
     * Get acteur
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActeur()
    {
        return $this->acteur;
    }

    /**
     * Add movie
     *
     * @param \Movies\MoviesBundle\Entity\Movies $movie
     * @return Role
     */
    public function addMovie(\Movies\MoviesBundle\Entity\Movies $movie)
    {
        $this->movie[] = $movie;

        return $this;
    }

    /**
     * Remove movie
     *
     * @param \Movies\MoviesBundle\Entity\Movies $movie
     */
    public function removeMovie(\Movies\MoviesBundle\Entity\Movies $movie)
    {
        $this->movie->removeElement($movie);
    }

    /**
     * Get movie
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMovie()
    {
        return $this->movie;
    }

    public function setActeur(Actor $a)
    {
        $this->acteur = $a;
    }

    public function setMovie(\Movies\MoviesBundle\Entity\Movies $m)
    {
        $this->movie = $m;
    }
}
