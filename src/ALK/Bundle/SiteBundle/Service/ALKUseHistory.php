<?php
// src/Sdz/BlogBundle/Service/SdzAntispam.php

namespace ALK\Bundle\SiteBundle\Service;
use Symfony\Bundle\DoctrineBundle\Registry;



/**
 * Use the history table.
 *
 * @author Videl
 */
class ALKUseHistory
{
    /**
     * @var Symfony\Bundle\DoctrineBundle\Registry
     */
    protected $em;

    public function __construct(Registry $doctrine)
    {
        $this->em = $doctrine->getEntityManager();
    }

    public function push($nom, $adresse)
    {
        $history = new \ALK\Bundle\SiteBundle\Entity\History();

        $history->setLink($adresse);
        $history->setName($nom);

        $this->em->persist($history);

        $this->em->flush();
    }

    public function getHistory()
    {
        $repository = $this->em->getRepository('ALKSiteBundle:History');
        $history = new \Doctrine\Common\Collections\ArrayCollection();

        $history = $repository->myFindAll(10);

        return $history;
    }

}