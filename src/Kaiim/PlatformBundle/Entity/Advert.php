<?php

namespace Kaiim\PlatformBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Advert
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Kaiim\PlatformBundle\Entity\AdvertRepository")
 */
class Advert
{
    /**
	 * @ORM\OneToMany(targetEntity="Kaiim\PlatformBundle\Entity\Application", mappedBy="advert")
     */
	private $applications; // Notez le « s », une annonce est liée à plusieurs candidatures
	
	
	/**
	 * @ORM\ManyToMany(targetEntity="Kaiim\PlatformBundle\Entity\Category", cascade={"persist"})
	 */
	private $categories;
	
	
	/**
     * @ORM\OneToOne(targetEntity="Kaiim\PlatformBundle\Entity\Image", cascade={"persist"})
     */
	private $image;
	
	
	/**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="published", type="boolean")
     */
	private $published = true;	
	
    
	// le constructeur
	public function __construct()
	{
		// Par défaut, la date de l'annonce est la date d'aujourd'hui
		$this->date = new \Datetime();
		$this->published = true;
		$this->categories = new ArrayCollection();
		
		$this->applications = new ArrayCollection();
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
     * Set date
     *
     * @param \DateTime $date
     * @return Advert
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Advert
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Advert
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Advert
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set published
     *
     * @param boolean $published
     * @return Advert
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return boolean 
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set image
     *
     * @param \Kaiim\PlatformBundle\Entity\Image $image
     * @return Advert
     */
    public function setImage(Image $image = null)
    {
        $this->image = $image;  // $image peut etre null (car la relation entre Advert et Image est facultatitive).
								// Une annonce peut contenir ou pas une image.
								
        return $this;
    }

    /**
     * Get image
     *
     * @return \Kaiim\PlatformBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add category
     *
     * @param \Kaiim\PlatformBundle\Entity\Category $category
     * @return Advert
     */
    public function addCategory(Category $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \Kaiim\PlatformBundle\Entity\Category $category
     */
    public function removeCategory(Category $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Add applications
     *
     * @param \Kaiim\PlatformBundle\Entity\Application $applications
     * @return Advert
     */
    public function addApplication(Application $applications)
    {
        $this->applications[] = $applications;
		
		// On lie l'annonce à la candidature
		$application->setAdvert($this);

        return $this;
    }

    /**
     * Remove applications
     *
     * @param \Kaiim\PlatformBundle\Entity\Application $applications
     */
    public function removeApplication(Application $applications)
    {
        $this->applications->removeElement($applications);
		
		// Et si notre relation était facultative (nullable=true, ce qui n'est pas notre cas ici attention) :
		// $application->setAdvert(null); // pour lier l'annonce à la candidature
    }

    /**
     * Get applications
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getApplications()
    {
        return $this->applications;
    }
}
