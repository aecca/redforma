<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\UserLoginType;
use AppBundle\Form\Type\UserRegisterType;
use Exception;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class UserController
 *
 * @package AppBundle\Controller
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class UserController extends Controller
{
    /**
     * Logout user
     */
    public function logoutAction()
    {
        if ($this->hasIdentity()) {
            $this->getAuthentifier()->logout();
        }

        return $this->redirectToRoute('homepage');
    }

    /**
     * Login user Action
     */
    public function loginAction(Request $request)
    {
        if ($this->hasIdentity()) {
            return $this->redirectToRoute('homepage');
        }

        $form = $this->createForm(UserLoginType::class);

        try {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $user = $form->getData();
                $errors = $this->get('validator')->validate($user);

                if (count($errors) > 0) {
                    throw new Exception((string)$errors);
                }

                $this->get('user.identity')->authenticate($user);

                return $this->redirectToRoute('homepage');
            }

        } catch (Exception $ex) {
            $form->addError(new FormError($ex->getMessage()));
        }

        return $this->render(':reviews/user:connect.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * Register user
     */
    public function registerAction(Request $request)
    {
        $form = $this->createForm(UserRegisterType::class);

        try {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $this->get('user.identity')->register($form->getData());
                return $this->redirectToRoute('homepage');
            }

        } catch (Exception $ex) {
            $form->addError(new FormError($ex->getMessage()));
        }

        return $this->render(':reviews/user:register.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
