<?php

namespace Redforma\Reviews\Domain\Model\Company;

/**
 * Interface CompanyRepository
 *
 * @package Redforma\Reviews\Domain\Model\Company
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
interface CompanyRepository
{
    /**
     * Find a company by identifier
     *
     * @param $id
     * @return Company
     */
    public function find($id);

    /**
     * Find company by name
     *
     * @param $name
     * @return mixed
     */
    public function findByName($name);

    /**
     * Paginate all company from repository.
     *
     * @param $limit
     * @param int $page
     * @param mixed $order
     * @return Company[]
     */
    public function all($limit, $page = 1, $order = null);

    /**
     * Count all companies in repository
     *
     * @return int
     */
    public function count();

    /**
     * Return all featured categories based on companies
     *
     * @param $limit
     * @return Company[]
     */
    public function allFeatured($limit);
}