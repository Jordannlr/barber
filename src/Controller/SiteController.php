<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Utilisateurs;
use App\Entity\Coupes;
use App\Entity\Rendezvous;
use App\Entity\Categorie;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class SiteController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function accueil()
    {
        return $this->render('site/accueil.html.twig', [
        ]);
    }


    /**
     * @Route("/hommes", name="hommes")
     */
    
    public function menHair () {

        //$categorieHomme = $repositoryCategory->findBy(array('sexe' => 'Homme'));
        //$coupesHommes = $repositoryCoupes->findBy(array('categorie' => $categorieHomme));

        //exit(var_dump($categorieHomme));

        $repositoryCoupes = $this->getDoctrine()->getRepository(Coupes::class);
        $repositoryCategory = $this->getDoctrine()->getRepository(Categorie::class);

        $categorieHomme = $repositoryCategory->findBySexe('Homme');
        $coupesHommes = $repositoryCoupes->findByCategorie($categorieHomme);
        

        return $this->render('site/men.html.twig', [
            'coupesH' => $coupesHommes
        ]);
    }
    
    /**
     * @Route("/femmes", name="femmes")
     */
    public function womenHair () {

        $repositoryCoupes = $this->getDoctrine()->getRepository(Coupes::class);
        $repositoryCategory = $this->getDoctrine()->getRepository(Categorie::class);
        
        $categorieFemme = $repositoryCategory->findBySexe('Femme');
        $coupesFemmes = $repositoryCoupes->findByCategorie($categorieFemme);
        

        return $this->render('site/women.html.twig', [
            'coupesF' => $coupesFemmes
        ]);
    }

    /**
     * @Route("/rendezvous", name="rendezvous")
     */
    public function rendezVous (Request $requete, ObjectManager $manager) {
        $rdv = new Rendezvous();

        $formulaire = $this->createFormBuilder($rdv)
        ->add('phoneNumber', TextType::class)
        ->add('date', DateType::class, [
            'format' => 'dd-MM-yyyy',
            ])
        ->getForm();

        $formulaire->handleRequest($requete);

        if ($formulaire->isSubmitted() && $formulaire->isValid()) 
        {

            $manager->persist($rdv);
            $manager->flush();

            return $this->redirectToRoute('accueil');
        }

        return $this->render('site/contact.html.twig', [
            'formulaireRdv' => $formulaire->createView()
        
        ]);
    }

    /**
     * @Route("/deconnexion", name="deconnexion")
     */
    public function deconnexion()
    {
    }
}