<?php

namespace Redforma\Reviews\Application\Service;

use InvalidArgumentException;
use Redforma\Identity\Domain\Model\User\UserRepository;
use Redforma\Reviews\Application\Data\AddReviewInput;
use Redforma\Reviews\Domain\Model\Company\CompanyRepository;
use Redforma\Reviews\Domain\Model\Review\Review;
use Redforma\Reviews\Domain\Model\Review\ReviewRepository;

/**
 * Class ReviewService
 *
 * @package Redforma\Reviews\Application\Service
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class ReviewService
{
    protected $reviewRepository;
    protected $companyRepository;
    protected $userRepository;

    public function __construct(
        ReviewRepository $repository,
        CompanyRepository $companyRepository,
        UserRepository $userRepository)
    {
        $this->reviewRepository = $repository;
        $this->companyRepository = $companyRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Add Review
     */
    public function addReview(AddReviewInput $data)
    {
        $author = $this->userRepository->find($data->authorId());

        if (null == $author) {
            throw new InvalidArgumentException('El usuario no existe o no es correcto');
        }

        $company = $this->findCompany($data->companyId());

        $review = new Review(
            $data->title(),
            $data->description(),
            $author,
            $company
        );

        $review->setCompanyName($company->isOther() ? $data->companyName() : $company->getName());

        $this->reviewRepository->save($review);

        return $review->getId();
    }

    /**
     * List Reviews By Author
     */
    public function listReviewsByAuthor($authorId, $limit = 10, $page = 1, $order = [])
    {
        return $this->reviewRepository->findByAuthor($authorId);
    }

    private function findCompany($companyId)
    {
        switch (true) {
            case isset($company) :
                $company = $this->companyRepository->find($companyId);
                break;
            default:
                $company = $this->companyRepository->getOtherCompany();
                break;
        }

        if (null === $company) {
            throw new InvalidArgumentException('La empresa no existe o no es correcta');
        }

        return $company;
    }

}