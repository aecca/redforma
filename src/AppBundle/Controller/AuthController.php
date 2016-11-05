<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\UserLoginType;
use Exception;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;

class AuthController extends Controller
{
    /**
     * @Route("/auth/logout", name="logout")
     */
    public function logoutAction()
    {
        if($this->hasIdentify()) {
           $this->getAuthentifier()->logout();
        }

        return $this->redirectToRoute('homepage');

    }

    /**
     * @Route("/auth/login", name="login")
     */
    public function loginAction(Request $request)
    {
        if($this->hasIdentify()) {
            return $this->redirectToRoute('homepage');
        }

        $form = $this->createForm(UserLoginType::class);

        try {
            $form->handleRequest($request);

            if( $form->isValid()) {
                $user = $form->getData();
                $errors = $this->get('validator')->validate($user);

                if (count($errors) > 0) {
                    throw new Exception((string) $errors);
                }

                $this->get('user.identity')->authenticate($user);

                return $this->redirectToRoute('homepage');
            }

        } catch (Exception $ex) {
            $form->addError(new FormError($ex->getMessage()));
        }

        return $this->render('user/connect.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/user/register", name="registerpage")
     */
    public function registerAction(Request $request)
    {
        return $this->render('user/register.html.twig', []);
    }

}
