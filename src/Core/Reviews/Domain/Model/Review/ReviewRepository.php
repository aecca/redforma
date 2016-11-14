<?php

namespace Redforma\Reviews\Domain\Model\Review;

/**
 * Interface ReviewRepository
 *
 * @package Redforma\Reviews\Domain\Model\Review
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
interface ReviewRepository
{
    public function save(Review $review);
    public function update(Review $review);
    public function delete(Review $review);
    public function find($id);
    public function findByAuthor($authorId);
    public function findByCompany($companyId);
    public function findByCategory($categoryId);
}