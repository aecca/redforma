<?php

namespace Redforma\Reviews\Application\Service;

use Redforma\Reviews\Domain\Model\Company\Category;
use Redforma\Reviews\Domain\Model\Company\CategoryRepository;
use Redforma\Reviews\Domain\Model\Company\CompanyRepository;

/**
 * Class CompanyService
 *
 * @package Redforma\Reviews\Application\Service
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class CompanyService
{
    protected $companyRepository;
    protected $categoryRepository;

    public function __construct(CompanyRepository $repository, CategoryRepository $categoryRepository)
    {
        $this->companyRepository = $repository;
        $this->categoryRepository = $categoryRepository;
    }

    public function listCompanies($limit, $page = 1)
    {
        return $this->companyRepository->all($limit, $page);
    }

    public function searchByName($name, $limit, $page = 1)
    {
        $data =  $this->companyRepository->searchByName($name);
        $result = [];

        foreach ($data as $item) {
           $result[] = [
               'id'         => $item['id'],
               'name'       => $item['name'],
               'slug'       => $item['slug'],
               'categories' => $item['categories'],
               'num_favs'   => $item['numFavs'],
               'num_reviews'=> $item['numReviews']
           ];
        }

        return $result;
    }

    /**
     * @param $limit
     * @return Category[]
     */
    public function listFeaturedCategories($limit)
    {
        $companies = $this->companyRepository->allFeatured($limit);

        $categories = [];

        foreach ($companies as $company) {
            foreach ($company->getCategories() as $category) {
                $categories[$category->getId()] = $category;
            }
        }

        return array_values($categories);
    }
}