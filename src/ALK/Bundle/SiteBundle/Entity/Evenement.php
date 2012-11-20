<?php

namespace ALK\Bundle\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ALK\Bundle\SiteBundle\Entity\Evenement
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ALK\Bundle\SiteBundle\Entity\EvenementRepository")
 */
class Evenement
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
     * @var string $Type
     *
     * @ORM\Column(name="Type", type="string", length=255)
     */
    private $Type;

    /**
     * @var date $Date
     *
     * @ORM\Column(name="Date", type="date")
     */
    private $Date;

    /**
     * @var date $Duree
     *
     * @ORM\Column(name="Duree", type="date")
     */
    private $Duree;

    /**
     * @var string $Content
     *
     * @ORM\Column(name="Content", type="string", length=255)
     */
    private $Content;


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
     * Set Type
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->Type = $type;
    }

    /**
     * Get Type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * Set Date
     *
     * @param date $date
     */
    public function setDate($date)
    {
        $this->Date = $date;
    }

    /**
     * Get Date
     *
     * @return date 
     */
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * Set Duree
     *
     * @param date $duree
     */
    public function setDuree($duree)
    {
        $this->Duree = $duree;
    }

    /**
     * Get Duree
     *
     * @return date 
     */
    public function getDuree()
    {
        return $this->Duree;
    }

    /**
     * Set Content
     *
     * @param string $content
     */
    public function setContent($content)
    {
        $this->Content = $content;
    }

    /**
     * Get Content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->Content;
    }
}