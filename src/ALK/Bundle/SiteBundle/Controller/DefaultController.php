<?php


namespace ALK\Bundle\SiteBundle\Controller;

use ALK\Bundle\SiteBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction()
    {
        return $this->render('ALKSiteBundle:Site:index.html.twig');
        //return $this->render('::base.html.twig', array('name' => $name));
    }

    public function helloAction($name)
    {
        return $this->render('ALKSiteBundle:Site:hello.html.twig', array('name' => $name));
    }

    public function articleAction()
    {
        // Création de l'entité
        $article = new Article();
        $article->setTitre('Mon dernier weekend');
        $article->setContenu("C'était vraiment super et on s'est bien amusé.");
        $article->setDate(new \Datetime());

        return $this->render('ALKSiteBundle:Site:article.html.twig', array('article' => $article));
    }
}
