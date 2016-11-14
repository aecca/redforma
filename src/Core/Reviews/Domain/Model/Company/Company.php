<?php

namespace Redforma\Reviews\Domain\Model\Company;

use DateTime;
use Redforma\Common\Domain\Model\Entity;
use Redforma\Common\Util\Strings;
use Redforma\Identity\Domain\Model\User\User;

/**
 * Class Company
 *
 * @package Redforma\Reviews\Domain\Model\Company
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class Company extends Entity
{
    const EMPTY_CATEGORIES   = 'Sin Categorias';
    const OTHER_COMPANY_NAME = 'Other';

    protected $creator;
    protected $name;
    protected $slug;
    protected $ruc;
    protected $numStats = 0;
    protected $numFavs = 0;
    protected $numReviews = 0;
    protected $isFeatured = false;
    protected $image;
    protected $banner;
    protected $contactInfo;
    protected $createdAt;
    protected $updatedAt;
    protected $state;
    protected $categories = [];

    public function __construct(string $name, string $ruc)
    {
        $this->name = $name;
        $this->slug = Strings::slugify($name);
        $this->ruc = $ruc;
        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
    }

    public function getName(): String
    {
        return $this->name;
    }

    public function getSlug(): String
    {
        return $this->slug;
    }

    public function getCreator(): User
    {
        return $this->creator;
    }

    public function isFeatured(): bool
    {
        return $this->isFeatured;
    }

    /**
     * @return Category[]
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param Category $category
     */
    public function addCategory(Category $category)
    {
        $this->categories[] = $category;
    }

    public function prettyCategories($separator = ' , ')
    {
        if(!$this->getCategories()) {
            return static::EMPTY_CATEGORIES;
        }

        $arr = [];
        foreach ($this->getCategories() as $category ) {
            $arr[] = $category->getName();
        }

        return implode($separator, $arr);
    }

    public function getContactInformation(): ContactInformation
    {
        return $this->contactInfo;
    }

    public function getNumReviews()
    {
        return $this->numReviews;
    }

    public function isOther(): bool
    {
        return $this->name == static::OTHER_COMPANY_NAME;
    }

}