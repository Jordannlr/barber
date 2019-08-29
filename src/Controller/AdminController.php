<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Rendezvous;


class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {

        $repository = $this->getDoctrine()->getRepository(Rendezvous::class);

        $listeRdv = $repository->findAll();
        //exit(var_dump($listeRdv));

        return $this->render('admin/admin.html.twig', [
            'controller_name' => 'AdminController',
            'liste' => $listeRdv
        ]);
    }
}
