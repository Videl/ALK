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
        return $this->render('ALKSiteBundle:Admin:index.html.twig');
    }
}
