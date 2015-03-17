<?php

namespace Movies\SeriesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Serie
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Movies\SeriesBundle\Entity\SerieRepository")
 */
class Serie
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
     * @ORM\Column(name="statut", type="string", length=255)
     */
    private $statut;
    
    /**
     * @Assert\File(maxSize="1M")
     */
    private $file;

    /**
     * @var integer
     *
     * @ORM\Column(name="duration", type="integer")
     */
    private $duration;
    
    /**
     *
     * @ORM\ManyToMany(targetEntity="Movies\MoviesBundle\Entity\Acteur")
     */
    private $acteurs;
    
    /**
     *
     * @ORM\ManyToMany(targetEntity="Movies\SeriesBundle\Entity\Episode")
     */
    private $episodes;
    
    /**
     *
     * @ORM\ManyToMany(targetEntity="Movies\MoviesBundle\Entity\Genre")
     */
    private $genres;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Movies\MoviesBundle\Entity\Commentaire")
     */
    private $commentaires;
    
    /**
     * @var string
     *
     * @ORM\Column(name="synopsis", type="text")
     */
    private $synopsis;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Movies\MoviesBundle\Entity\Realisateur")
     */
    private $realisateur;
    
    /**
     *
     * @var string
     *
     * @ORM\Column(name="jaquette", type="text",nullable=true)
     */
    private $image;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Movies\MoviesBundle\Entity\Votes")
     */
    private $votes;


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
     * @return Serie
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
     * Set statut
     *
     * @param string $statut
     * @return Serie
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string 
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     * @return Serie
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer 
     */
    public function getDuration()
    {
        return $this->duration;
    }
    
    public function upload()
    {
    	if (null === $this->file) {
    		return;
    	}
    	$this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());
    	$this->image = $this->getUploadDir().'/'.$this->file->getClientOriginalName();
    	$this->file = null;
    }
    
    public function getUploadRootDir()
    {
    	return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
     
    public function getUploadDir()
    {
    	return 'uploads/poster';
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->acteurs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->genres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set synopsis
     *
     * @param string $synopsis
     * @return Serie
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
     * Set image
     *
     * @param string $image
     * @return Serie
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add acteurs
     *
     * @param \Movies\MoviesBundle\Entity\Acteur $acteurs
     * @return Serie
     */
    public function addActeur(\Movies\MoviesBundle\Entity\Acteur $acteurs)
    {
        $this->acteurs[] = $acteurs;

        return $this;
    }

    /**
     * Remove acteurs
     *
     * @param \Movies\MoviesBundle\Entity\Acteur $acteurs
     */
    public function removeActeur(\Movies\MoviesBundle\Entity\Acteur $acteurs)
    {
        $this->acteurs->removeElement($acteurs);
    }

    /**
     * Get acteurs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActeurs()
    {
        return $this->acteurs;
    }

    /**
     * Add genres
     *
     * @param \Movies\MoviesBundle\Entity\Genre $genres
     * @return Serie
     */
    public function addGenre(\Movies\MoviesBundle\Entity\Genre $genres)
    {
        $this->genres[] = $genres;

        return $this;
    }

    /**
     * Remove genres
     *
     * @param \Movies\MoviesBundle\Entity\Genre $genres
     */
    public function removeGenre(\Movies\MoviesBundle\Entity\Genre $genres)
    {
        $this->genres->removeElement($genres);
    }

    /**
     * Get genres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGenres()
    {
        return $this->genres;
    }

    /**
     * Set commentaires
     *
     * @param \Movies\MoviesBundle\Entity\Commentaire $commentaires
     * @return Serie
     */
    public function setCommentaires(\Movies\MoviesBundle\Entity\Commentaire $commentaires = null)
    {
        $this->commentaires = $commentaires;

        return $this;
    }

    /**
     * Get commentaires
     *
     * @return \Movies\MoviesBundle\Entity\Commentaire 
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * Set realisateur
     *
     * @param \Movies\MoviesBundle\Entity\Realisateur $realisateur
     * @return Serie
     */
    public function setRealisateur(\Movies\MoviesBundle\Entity\Realisateur $realisateur = null)
    {
        $this->realisateur = $realisateur;

        return $this;
    }

    /**
     * Get realisateur
     *
     * @return \Movies\MoviesBundle\Entity\Realisateur 
     */
    public function getRealisateur()
    {
        return $this->realisateur;
    }

    /**
     * Set votes
     *
     * @param \Movies\MoviesBundle\Entity\Votes $votes
     * @return Serie
     */
    public function setVotes(\Movies\MoviesBundle\Entity\Votes $votes = null)
    {
        $this->votes = $votes;

        return $this;
    }

    /**
     * Get votes
     *
     * @return \Movies\MoviesBundle\Entity\Votes 
     */
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * Set episodes
     *
     * @param \Movies\SeriesBundle\Entity\Episode $episodes
     * @return Serie
     */
    public function setEpisodes(\Movies\SeriesBundle\Entity\Episode $episodes = null)
    {
        $this->episodes = $episodes;

        return $this;
    }

    /**
     * Get episodes
     *
     * @return \Movies\SeriesBundle\Entity\Episode 
     */
    public function getEpisodes()
    {
        return $this->episodes;
    }

    /**
     * Add episodes
     *
     * @param \Movies\SeriesBundle\Entity\Episode $episodes
     * @return Serie
     */
    public function addEpisode(\Movies\SeriesBundle\Entity\Episode $episodes)
    {
        $this->episodes[] = $episodes;

        return $this;
    }

    /**
     * Remove episodes
     *
     * @param \Movies\SeriesBundle\Entity\Episode $episodes
     */
    public function removeEpisode(\Movies\SeriesBundle\Entity\Episode $episodes)
    {
        $this->episodes->removeElement($episodes);
    }
}
