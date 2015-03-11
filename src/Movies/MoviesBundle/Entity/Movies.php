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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

   /**
    * 
    * @ORM\ManyToMany(targetEntity="Movies\MoviesBundle\Entity\Acteur")
    */
    private $acteur;

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
    
    public function addActeur(Acteur $acteur)
    {
    	$this->acteur[] = $acteur;
    	return $this;
    }
    
    public function removeActeur(Acteur $acteur)
    {
    	$this->acteur->removeElement($acteur);
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
     * Set acteur
     *
     * @param array $acteur
     * @return Movies
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
    	$this->image = $this->file->getClientOriginalName();
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
}
