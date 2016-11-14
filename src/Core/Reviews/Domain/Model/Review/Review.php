<?php

namespace Redforma\Reviews\Domain\Model\Review;

use DateTime;
use Redforma\Common\Domain\Model\Entity;
use Redforma\Common\Util\Strings;
use Redforma\Identity\Domain\Model\User\User;
use Redforma\Reviews\Domain\Model\Company\Company;

/**
 * Class Review
 *
 * @package Redforma\Reviews\Domain\Model\Review
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class Review extends Entity
{
    protected $title;
    protected $slug;
    protected $author;
    protected $company;
    protected $companyName;
    protected $description;
    protected $images = [];
    protected $numFavs = 0;
    protected $numStats = 0;
    protected $createdAt;
    protected $updatedAt;
    protected $state;

    public function __construct(String $title, String $description, User $author, Company $company)
    {
        $this->title = $title;
        $this->slug = Strings::slugify($title);
        $this->description = $description;
        $this->author = $author;
        $this->company = $company;
        $this->createdAt = new DateTime();
        $this->updatedAt  = new DateTime();
    }

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return $this->author;
    }

    /**
     * @return Company
     */
    public function getCompany(): Company
    {
        return $this->company;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @return array
     */
    public function getImages(): array
    {
        return $this->images;
    }

    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }

}