<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Utilisateurs;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;


use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscription(Request $requete, ObjectManager $manager,UserPasswordEncoderInterface $encoder)
    {


        $user = new Utilisateurs();

        $formulaire = $this->createFormBuilder($user)
        ->add('nom', TextType::class)
        ->add('prenom', TextType::class)
        ->add('email', TextType::class)
        ->add('password', PasswordType::class)
        ->add('confirm_password', PasswordType::class)
        ->getForm();

        $formulaire->handleRequest($requete);

        if ($formulaire->isSubmitted() && $formulaire->isValid()) 
        {
            $hash=$encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);

            $manager->persist($user);
            $manager->flush();


            return $this->redirectToRoute('connexion');

        }

        return $this->render ('security/inscription.html.twig', [
            'formulaireIns' => $formulaire->createView()
        ]);
    }

    /**
     * @Route("/connexion", name="connexion")
     */
    public function connexion () 
    {
        return $this->render ('security/connexion.html.twig', [
        ]);

    }
}
