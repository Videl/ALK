<?php


namespace ALK\Bundle\SiteBundle\Controller;

use ALK\Bundle\SiteBundle\Entity\Article;
use ALK\Bundle\SiteBundle\Entity\Tag;
use ALK\Bundle\SiteBundle\Form\ArticleType;
use ALK\Bundle\SiteBundle\Form\ArticleHandler;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction()
    {
        $repository = $this->getDoctrine()
                       ->getEntityManager()
                       ->getRepository('ALKSiteBundle:Article');
        $article = $repository->find(4);

        return $this->render('ALKSiteBundle:Site:index.html.twig', array('article' =>
    $article));
        //return $this->render('::base.html.twig', array('name' => $name));
    }

    public function helloAction($name)
    {
        return $this->render('ALKSiteBundle:Site:hello.html.twig', array('name' => $name));
    }

    public function voirarticleAction($id)
    {
        // On récupère le repository
        $repository = $this->getDoctrine()
                       ->getEntityManager()
                       ->getRepository('ALKSiteBundle:Article');

        // On récupère l'entité correspondant à l'id $id
        $article = $repository->find($id);

        // $article est donc une instance de Sdz\BlogBundle\Entity\Article

        // Ou null si aucun article n'a été trouvé avec l'id $id
        if($article === null)
        {
            throw $this->createNotFoundException('Article[id='.$id.'] inexistant.');
        }
        return $this->render('ALKSiteBundle:Site:article.html.twig', array('article' => $article));
    }

    public function ajouterAction()
    {
        $article = new Article;

        $article->setTitre("Titre");
        $article->setContenu("Nouveau contenu");

        $form        = $this->createForm(new ArticleType, $article);
        $formHandler = new ArticleHandler($form, $this->get('request'), $this->getDoctrine()->getEntityManager());

        if($formHandler->process())
        {
            return $this->redirect( $this->generateUrl('ALKSiteBundle_voirarticle', array('id' => $article->getId())) );
        }

        return $this->render('ALKSiteBundle:Site:formulaire.html.twig', array('form' => $form->createView()));
    }

    public function modifierArticleAction($id)
    {
        // On récupère le repository
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('ALKSiteBundle:Article');

        // On récupère l'entité correspondant à l'id $id
        $article = $repository->find($id);

        $form   = $this->createForm(new ArticleType, $article);
        $formHandler = new ArticleHandler($form, $this->get('request'), $em);

        if($formHandler->process())
        {
            return $this->redirect( $this->generateUrl('ALKSiteBundle_voirarticle', array('id' => $id)));
        }

        return $this->render('ALKSiteBundle:Site:formulaire.html.twig', array('form' => $form->createView()));
    }

    public function listeArticlesAction($tag, $page)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('ALKSiteBundle:Article');

        if($tag == "Default")
        {
            $articles = $repository->myFindAllArticles();

        } else
        {
            $articles = $repository->myFindByTags(array($tag));
        }

        return $this->render('ALKSiteBundle:Site:listedesarticles.html.twig', array('articles' => $articles));

    }

}
