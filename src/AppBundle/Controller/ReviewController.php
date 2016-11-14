<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class ReviewController
 *
 * @package AppBundle\Controller
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class ReviewController extends Controller
{
    /**
     * @Route("/reviews/register", name="register_review")
     */
    public function indexAction(Request $request)
    {
        if(!$this->hasIdentity()) {
            return $this->redirectToRoute('login', [
                'redirect_url' => $this->generateUrl('register_review', ['step' => 1])
            ]);
        }

        return $this->render('reviews/review/register.html.twig', []);
    }
}
