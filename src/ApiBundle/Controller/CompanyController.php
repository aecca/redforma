<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class CompanyController
 *
 * @package ApiBundle\Controller
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class CompanyController extends Controller
{
    /**
     * @Route("/companies/search")
     */
    public function searchAction(Request $request)
    {
        $items = $this->get('company.service')->searchByName($request->get('q'), 10);

        return new JsonResponse([
            'message' => 'Se listaron correctamente las empresas',
            'total' => count($items),
            'data' => $items
        ]);
    }
}