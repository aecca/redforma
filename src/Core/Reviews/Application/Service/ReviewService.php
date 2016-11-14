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
        $company = $this->companyRepository->find($data->companyId());

        if (null === $company) {
            throw new InvalidArgumentException('La empresa no existe o no es correcta');
        }

        $author = $this->userRepository->find($data->authorId());

        if (null == $author) {
            throw new InvalidArgumentException('El usuario no existe o no es correcto');
        }

        $review = new Review(
            $data->title(),
            $data->description(),
            $author,
            $company
        );

        $review->setCompanyName($data->companyName() ??  $company->getName());

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

}