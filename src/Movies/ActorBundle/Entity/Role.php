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
     * @ORM\ManyToMany(targetEntity="Movies\ActorBundle\Entity\Actor")
     */
    private $acteur;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Movies\MoviesBundle\Entity\Movies")
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
}
