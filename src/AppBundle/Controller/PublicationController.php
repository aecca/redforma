<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class PublicationController extends Controller
{
    /**
     * @Route("/publication", name="publicationpage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('publication/index.html.twig', []);
    }
}
