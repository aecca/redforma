<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

/**
 * Class Controller
 *
 * @package AppBundle\Controller
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class Controller extends BaseController
{
    public function getAuthentifier()
    {
        return $this->get('auth.authentifier');
    }

    public function hasIdentify()
    {
        return $this->getAuthentifier()->hasIdentity();
    }

    public function getAuth()
    {
        return $this->getAuthentifier()->getIdentity();
    }
}