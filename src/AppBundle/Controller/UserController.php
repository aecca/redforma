<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/user/connect", name="connectpage")
     */
    public function connectAction(Request $request)
    {
        return $this->render('user/connect.html.twig', []);
    }

    /**
     * @Route("/user/register", name="registerpage")
     */
    public function registerAction(Request $request)
    {
        return $this->render('user/register.html.twig', []);
    }
    
}
