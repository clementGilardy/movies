<?php

namespace Movies\MoviesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Movies
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Movies\MoviesBundle\Entity\MoviesRepository")
 */
class Movies
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
     * @ORM\Column(name="titre", type="string", length=255, unique=true)
     */
    private $titre;

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
     * @var \DateTime
     *
     * @ORM\Column(name="date_release", type="datetime")
     */
    private $dateRelease;
    
    /**
     * @Assert\File(maxSize="1M")
     */
    private $file;
    
    /**
     * 
     * @var integer
     * @ORM\Column(name="duration", type="integer")
     */
    private $duration;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="Movies\ActorBundle\Entity\Actor")
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

    public function __construct()
    {
        $actors = new ArrayCollection();
    }

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
     * @return Movies
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
     * Set commentaires
     *
     * @param array $commentaires
     * @return Movies
     */
    public function setCommentaires($commentaires)
    {
        $this->commentaires = $commentaires;

        return $this;
    }

    /**
     * Get commentaires
     *
     * @return array 
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * Set synopsis
     *
     * @param string $synopsis
     * @return Movies
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
     * Set dateRelease
     *
     * @param \DateTime $dateRelease
     * @return Movies
     */
    public function setDateRelease($dateRelease)
    {
        $this->dateRelease = $dateRelease;

        return $this;
    }

    /**
     * Get dateRelease
     *
     * @return \DateTime 
     */
    public function getDateRelease()
    {
        return $this->dateRelease;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Movies
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
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
    
    public function getFile()
    {
    	return $this->file;
    }
    
    public function setFile($file)
    {
    	$this->file = $file;
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

   public function addVote(Votes $vote)
   {
   		$this->votes[] = $vote;
   		return $this;
   }
   
   public function getVotes()
   {
   		return $this->votes;
   }
   
   public function removeVote(Vote $vote)
   {
   		$this->votes->removeElement($vote);	
   }
   
   public function addCommentaire(Commentaire $commentaire)
   {
	   	if(!$this->commentaires->contains($commentaire))
	   	{
	   		$this->commentaires->add($commentaire);
	   	}
   }
   
   public function removeCommentaire(Commentaire $commentaire)
   {
   		$this->commentaires->removeElement($commentaire);
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
     * Set votes
     *
     * @param \Movies\MoviesBundle\Entity\Votes $votes
     * @return Movies
     */
    public function setVotes(\Movies\MoviesBundle\Entity\Votes $votes = null)
    {
        $this->votes = $votes;

        return $this;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     * @return Movies
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

    /**
     * Add genres
     *
     * @param \Movies\MoviesBundle\Entity\Genre $genres
     * @return Movies
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
     * Set realisateur
     *
     * @param \Movies\MoviesBundle\Entity\Realisateur $realisateur
     * @return Movies
     */
    public function setRealisateur(\Movies\ActorBundle\Entity\Actor $realisateur = null)
    {
        $this->realisateur = $realisateur;

        return $this;
    }

    /**
     * Get realisateur
     *
     * @return \Movies\ActorBundle\Entity\Actor
     */
    public function getRealisateur()
    {
        return $this->realisateur;
    }


    /**
     * Add acteurs
     *
     * @param \Movies\ActorBundle\Entity\Actor $acteurs
     * @return Movies
     */
    public function addActeur(\Movies\ActorBundle\Entity\Actor $acteurs)
    {
        $this->acteurs[] = $acteurs;

        return $this;
    }

    /**
     * Remove acteurs
     *
     * @param \Movies\ActorBundle\Entity\Actor $acteurs
     */
    public function removeActeur(\Movies\ActorBundle\Entity\Actor $acteurs)
    {
        $this->acteurs->removeElement($acteurs);
    }
}
