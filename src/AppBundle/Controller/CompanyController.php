<?php

namespace AppBundle\Controller;

/**
 * Class CompanyController
 *
 * @package AppBundle\Controller
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class CompanyController extends Controller
{
    public function indexAction($page = 1)
    {
        return $this->render(':reviews/company:index.html.twig', [
             // Solo listar 20 items por pagina
            'companies' => $this->get('company.service')->listCompanies(20, $page)
        ]);
    }

}