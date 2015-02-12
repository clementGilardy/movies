<?php

namespace Movies\MoviesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Series
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Movies\MoviesBundle\Entity\SeriesRepository")
 */
class Series
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="synopsis", type="text")
     */
    private $synopsis;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Movies\MoviesBundle\Entity\Episode")
     */
    private $episodes;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Movies\MoviesBundle\Entity\Votes")
     */
    private $vote;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Movies\MoviesBundle\Entity\Commentaire")
     */
    private $commentaire;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Movies\MoviesBundle\Entity\Acteur")
     */
    private $acteur;


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
     * Set titre
     *
     * @param string $titre
     * @return Series
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set synopsis
     *
     * @param string $synopsis
     * @return Series
     */
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * Get synopsis
     *
     * @return string 
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * Set episodes
     *
     * @param array $episodes
     * @return Series
     */
    public function setEpisodes($episodes)
    {
        $this->episodes = $episodes;

        return $this;
    }

    /**
     * Get episodes
     *
     * @return array 
     */
    public function getEpisodes()
    {
        return $this->episodes;
    }

    /**
     * Set vote
     *
     * @param array $vote
     * @return Series
     */
    public function setVote($vote)
    {
        $this->vote = $vote;

        return $this;
    }

    /**
     * Get vote
     *
     * @return array 
     */
    public function getVote()
    {
        return $this->vote;
    }

    /**
     * Set commentaire
     *
     * @param array $commentaire
     * @return Series
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return array 
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set acteur
     *
     * @param array $acteur
     * @return Series
     */
    public function setActeur($acteur)
    {
        $this->acteur = $acteur;

        return $this;
    }

    /**
     * Get acteur
     *
     * @return array 
     */
    public function getActeur()
    {
        return $this->acteur;
    }
}