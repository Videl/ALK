<?php


namespace ALK\Bundle\SiteBundle\Controller;

use ALK\Bundle\SiteBundle\Entity\Article;
use ALK\Bundle\SiteBundle\Entity\Image;
use ALK\Bundle\SiteBundle\Entity\Tag;

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

    public function articleAction($id)
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
        // On crée un objet Article.
        $article = new Article();

        // On crée le FormBuilder grâce à la méthode du contrôleur.
        $formBuilder = $this->createFormBuilder($article);

        // On ajoute les champs de l'entité que l'on veut à notre formulaire.
        $formBuilder
          ->add('date',    'date')
          ->add('titre',   'text')
          ->add('contenu', 'textarea');
        // Pour l'instant, pas de tags, on les gérera plus tard.

        // On récupère la requête.
        $request = $this->get('request');

        // On vérifie qu'elle est de type « POST ».
        if( $request->getMethod() == 'POST' )
        {
            // On fait le lien Requête <-> Formulaire.
            $form->bindRequest($request);

            // On vérifie que les valeurs rentrées sont correctes.
            // (Nous verrons la validation des objets en détail plus bas dans ce chapitre.)
            if( $form->isValid() )
            {
                // On l'enregistre notre objet $article dans la base de données.
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($article);
                $em->flush();

                // On redirige vers la page d'accueil, par exemple.
                return $this->redirect($this->generateUrl('ALKSiteBundle_homepage'));
            }
        }

        // À partir du formBuilder, on génère le formulaire.
        $form = $formBuilder->getForm();

        return $this->render('ALKSiteBundle:Site:formulaire.html.twig', array('form' => $form->createView()));
    }
}
