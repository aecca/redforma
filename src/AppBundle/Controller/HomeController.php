<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('home/index.html.twig', []);
    }

    /**
     * @Route("/blank", name="blankpage")
     */
    public function blankAction(Request $request)
    {
        return $this->render('home/blank.html.twig', []);
    }
}
