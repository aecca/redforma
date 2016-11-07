<?php

namespace Redforma\Reviews\Domain\Model\Company;

/**
 * Interface CategoryRepository
 *
 * @package Redforma\Reviews\Domain\Model\Company
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
interface CategoryRepository
{
    /**
     * Return category by identifier
     *
     * @param $id
     * @return Category
     */
    public function find($id);

    /**
     * Return all categories
     *
     * @return Category[]
     */
    public function all();

    /**
     * Return all featured categories
     *
     * @param $limit
     * @return Category[]
     */
    public function allFeatured($limit);
}