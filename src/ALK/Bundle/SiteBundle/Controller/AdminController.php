<?php


namespace ALK\Bundle\SiteBundle\Controller;

use ALK\Bundle\SiteBundle\Entity\Article;
use ALK\Bundle\SiteBundle\Entity\Tag;
use ALK\Bundle\SiteBundle\Form\ArticleType;
use ALK\Bundle\SiteBundle\Form\ArticleHandler;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        //return $this->render('ALKSiteBundle:Admin:index.html.twig');
        return $this->listeArticlesAction();
    }

    public function listeArticlesAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('ALKSiteBundle:Article');


        $articles = $repository->myFindAllArticles();


        return $this->render('ALKSiteBundle:Admin:listedesarticles.html.twig', array(
        'articles' => $articles,
        'histories' => $this->get('alk_site.history')->getHistory()
        ));
    }

}
