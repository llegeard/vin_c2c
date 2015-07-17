<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


// src/VinC2C/LandingPageBundle/Controller/LandingPageController.php

namespace VinC2C\LandingPageBundle\Controller;

// N'oubliez pas ce use :
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use VinC2C\LandingPageBundle\Form\AnnonceSearchType;
use VinC2C\LandingPageBundle\Entity\Offre;
use VinC2C\LandingPageBundle\Form\OffreType;
use Symfony\Component\HttpFoundation\Request;

class LandingPageController extends Controller {

    public function indexAction() {
        $content = $this->get('templating')->render('VinC2CLandingPageBundle:Default:layout.html.twig');
        return new Response($content);
    }

    public function accueilAction() {


//        $content = $this->get('templating')->render('VinC2CLandingPageBundle:Accueil:index.html.twig');
//        return new Response($content);
        //On crée le FormBuilder grâce à la méthode du contrôleur. Toujours sans entité

        $form = $this->createForm(new AnnonceSearchType());

        //On récupère la requête

        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {

            $form->bind($request);

            //On vérifie que les valeurs entrées sont correctes

            if ($form->isValid()) {



                $em = $this->getDoctrine()->getManager();

                //On récupère les données entrées dans le formulaire par l'utilisateur


                $data = $this->getRequest()->request->get('vinc2c_landingpagebundle_annoncesearch');


//                echo var_dump($data);
//                exit;
                //On va récupérer la méthode dans le repository afin de trouver toutes les annonces filtrées par les paramètres du formulaire

                $liste_annonces = $em->getRepository('VinC2CLandingPageBundle:Offre')->findAnnonceByParametres($data);

                //Puis on redirige vers la page de visualisation de cette liste d'annonces
                return $this->render('VinC2CLandingPageBundle:Search:index.html.twig', array('liste_annonces' => $liste_annonces, 'form' => $form->createView()));
            }
        }



        return $this->render('VinC2CLandingPageBundle:Accueil:index.html.twig', array('form' => $form->createView()));
    }

    public function searchAction() {

        //On crée le FormBuilder grâce à la méthode du contrôleur. Toujours sans entité

        $form = $this->createForm(new AnnonceSearchType());

        //On récupère la requête

        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {

            $form->bind($request);

            //On vérifie que les valeurs entrées sont correctes

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();

                //On récupère les données entrées dans le formulaire par l'utilisateur


                $data = $this->getRequest()->request->get('vinc2c_landingpagebundle_annoncesearch');


//                echo var_dump($data);
//                exit;
                //On va récupérer la méthode dans le repository afin de trouver toutes les annonces filtrées par les paramètres du formulaire

                $liste_annonces = $em->getRepository('VinC2CLandingPageBundle:Offre')->findAnnonceByParametres($data);

                //Puis on redirige vers la page de visualisation de cette liste d'annonces
                return $this->render('VinC2CLandingPageBundle:Search:index.html.twig', array('liste_annonces' => $liste_annonces, 'form' => $form->createView()));
            }
        }


        return $this->render('VinC2CLandingPageBundle:Search:index.html.twig', array('form' => $form->createView()));
    }

    public function annonceAction() {
        $request = $this->container->get('request');

        if ($request->isXmlHttpRequest()) {
            $id = '';
            $id = $request->request->get('id');

            $em = $this->container->get('doctrine')->getEntityManager();

            $repository = $this
                    ->getDoctrine()
                    ->getManager()
                    ->getRepository('VinC2CLandingPageBundle:Offre')

            ;

            $offre = $repository->find($id);



            return $this->container->get('templating')->renderResponse('VinC2CLandingPageBundle:Search:annonce.html.twig', array('offre' => $offre));
        }
    }

    public function posterAction(Request $request) {
        $offre = new Offre();
        $form = $this->get('form.factory')->create(new OffreType(), $offre);

        if ($form->handleRequest($request)->isValid()) {

//            $offre->getImage()->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($offre);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
//
//            return $this->redirect($this->generateUrl('annonce', array('id' => $advert->getId())));

            return $this->redirect($this->generateUrl('search'));
        }

        return $this->render('VinC2CLandingPageBundle:Search:poster.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

}
