<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RootController extends AbstractController
{
   // #[Route('/{reactRouting}', name: 'app_root', default: '?')]
     /**
     * @Route("/{reactRouting}", name="app_root", defaults={"reactRouting": null})
     */
    public function index(): Response
    {
        return $this->render('root/index.html.twig');
    }
}
