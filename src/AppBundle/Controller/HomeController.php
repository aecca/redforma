<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class HomeController
 *
 * @package AppBundle\Controller
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class HomeController extends Controller
{

    public function indexAction(Request $request)
    {
        return $this->render(':reviews/home:index.html.twig', [
            // Listar categorias destacadas
            'categories' => $this->get('company.service')->listFeaturedCategories(20)
        ]);
    }

}
