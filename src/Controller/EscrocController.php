<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EscrocController extends AbstractController
{
    #[Route('/escroc', name: 'app_escroc')]
    public function index(): Response
    {
        return $this->render('escroc/index.html.twig');
    }

    #[Route('/auth', name: 'app_auth')]
    #[IsGranted('ROLE_USER')]
    public function auth()
    {
        return $this->render('auth/index.html.twig');
    }
}
