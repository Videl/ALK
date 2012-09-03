<?php
// src/Sdz/BlogBundle/Service/SdzAntispam.php

namespace ALK\Bundle\SiteBundle\Service;
use Symfony\Bundle\DoctrineBundle\Registry;



/**
 * Use the article table.
 *
 * @author Videl
 */
class ALKOurArticle extends \Twig_Extension
{
    /**
     * @var Symfony\Bundle\DoctrineBundle\Registry
     */
    protected $em;

    public function __construct(Registry $doctrine)
    {
        $this->em = $doctrine->getEntityManager();
    }

    public function getName()
    {
        return 'ALKOurLastArticle';
    }

    public function getFunctions()
    {
        return array(
            'lastarticle' => new \Twig_Function_Method($this, 'lastArticle')
        );

        // 'antispam_check' est le nom de la fonction qui sera disponible sous Twig
        // 'new \Twig_Function_Method($this, 'isSpam') ' est la façon de dire que cette fonction va exécuter notre méthode isSpam ci-dessous
    }

    public function lastArticle()
    {
        $repository = $this->em->getRepository('ALKSiteBundle:Article');

        //$article = $repository->findBy(array(), array('id'=>'DESC'), 1);


        return $repository->myLastArticle();
    }

    public function getFilters()
    {
        return array(
            'shortify' => new \Twig_Filter_Method($this, 'lemmeShortify'),
        );
    }

    public function lemmeShortify($string, $limit = 30)
    {
        $words = explode(' ', strip_tags($string), $limit+1);
        $short = "";

        for($i=0;$i< $limit; $i++)
        {
            $short .= ' ' . $words[$i];
        }
        $short .= '...';

        return trim($short);
    }


}