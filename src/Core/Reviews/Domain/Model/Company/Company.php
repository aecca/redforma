<?php

namespace Redforma\Reviews\Domain\Model\Company;

use DateTime;
use Redforma\Common\Util\Strings;
use Redforma\Identity\Domain\Model\User\User;

/**
 * Class Company
 *
 * @package Redforma\Reviews\Domain\Model\Company
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class Company
{
    protected $id;
    protected $creator;
    protected $name;
    protected $slug;
    protected $ruc;
    protected $stats = 0;
    protected $stars = 0;
    protected $isFeatured = false;
    protected $image;
    protected $banner;
    protected $category;
    protected $contactInfo;
    protected $createdAt;
    protected $updateAt;

    public function __construct(string $name, string $ruc, Category $category)
    {
        $this->name = $name;
        $this->slug = Strings::slugify($name);
        $this->ruc = $ruc;
        $this->category = $category;
        $this->createdAt = new DateTime();
        $this->updateAt = new DateTime();
    }

    public function getName(): String
    {
        return $this->name;
    }

    public function getSlug(): String
    {
        return $this->slug;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function getCreator(): User
    {
        return $this->creator;
    }

    public function isFeatured(): bool
    {
        return $this->isFeatured;
    }
}