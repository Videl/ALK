<?php

namespace ALK\Bundle\SiteBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;



use Doctrine\ORM\Mapping as ORM;

/**
 * ALK\Bundle\SiteBundle\Entity\Article
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ALK\Bundle\SiteBundle\Entity\ArticleRepository")
 */
class Article
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var datetime $date
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var text $contenu
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @ORM\ManyToMany(targetEntity="ALK\Bundle\SiteBundle\Entity\Tag")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tags;

    /**
     * @var string $titre
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    public function __construct()
    {
        $this->date = new \Datetime();
        $this->tags = new ArrayCollection();
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
     * @param datetime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get date
     *
     * @return datetime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set contenu
     *
     * @param text $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * Get contenu
     *
     * @return text
     */
    public function getContenu()
    {
        return $this->contenu;
    }


    /**
     * Set titre
     *
     * @param string $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
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
     * @ORM\OneToOne(targetEntity="ALK\Bundle\SiteBundle\Entity\Image")
     * @ORM\JoinColumn(nullable=false)
     */
    private $image;

    public function setImage(\ALK\Bundle\SiteBundle\Entity\Image $image = null)
    {
        $this->image = $image;
    }

    /**
     * @return ALK\Bundle\SiteBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }

    public function setTags(\ALK\Bundle\SiteBunde\Entity\Tag $tags = null)
    {
        $this->tags[] = $tags;
    }

    public function getTags()
    {
        return $this->tags;
    }

}