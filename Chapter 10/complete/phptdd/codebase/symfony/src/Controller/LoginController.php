<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(AuthenticationUtils $utils): Response
    {
        return $this->render('login/index.html.twig', [
            'controller_name'   => 'LoginController',
            'last_username'     => $utils->getLastUserName(),
            'error'             => $utils->getLastAuthenticationError(),
        ]);
    }
}
