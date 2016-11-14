<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\ReviewRegisterType;
use Exception;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

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
                'redirect_url' => $this->generateUrl('register_review')
            ]);
        }

        $step = (int) $request->query->get('step', 1);

        switch ($step) {

            /**
             * Primera parte de la publicacion consta de solo de detalles
             * basicos.
             */
            case 1 :
                $form = $this->createForm(ReviewRegisterType::class);

                try {
                    $form->handleRequest($request);

                    if ($form->isValid()) {
                        $data = $form->getData();
                        $data->setAuthorId($this->getAuth()->getId());

                        $result = $this->get('review.service')->addReview($data);
                        return $this->redirectToRoute('register_review', [
                            'step' => 2,
                            'review_id' => $result
                        ]);
                    }

                } catch (Exception $ex) {
                    $form->addError(new FormError($ex->getMessage()));
                    $this->get('logger')->error($ex->getMessage(), $ex->getTrace());
                }
                break;

            /**
             * Paso 2 consta en publicar la incidencia y ademas poder registrar
             * evidencias en caso las hubiera.
             */
            case 2 :
                $reviewId = (int) $request->get('review_id');
                $form = $this->createForm(ReviewRegisterType::class);

                try {
                    $form->handleRequest($request);

                    if ($form->isValid()) {
                        return $this->redirectToRoute('register_review', [
                            'review_id' => $reviewId
                        ]);
                    }

                } catch (Exception $ex) {
                    $form->addError(new FormError($ex->getMessage()));
                    $this->get('logger')->error($ex->getMessage(), $ex->getTrace());
                }
                break;

            default:
                throw new BadRequestHttpException('La solicitud no es correcta');
        }


        return $this->render('reviews/review/register.html.twig', [
            'step' => $step,
            'form' => $form->createView()
        ]);
    }
}
