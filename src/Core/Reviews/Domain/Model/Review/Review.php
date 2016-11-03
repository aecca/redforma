<?php

namespace Redforma\Reviews\Domain\Model\Claim;

use DateTime;
use Redforma\Common\Domain\Model\Entity;
use Redforma\Reviews\Domain\Model\Company\Company;
use Redforma\Identity\Domain\Model\User\User;

/**
 * Class Review
 *
 * @package Redforma\Reviews\Domain\Model\Review
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class Review extends Entity
{
    protected $user;
    protected $company;
    protected $description;
    protected $createdAt;
    protected $updateAt;
    protected $images = [];

    public function __construct(string $description, User $user, Company $company)
    {
        $this->description = $description;
        $this->user = $user;
        $this->company = $company;
        $this->createdAt = new DateTime();
        $this->updateAt  = new DateTime();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
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
    public function getUpdateAt(): DateTime
    {
        return $this->updateAt;
    }

    /**
     * @return array
     */
    public function getImages(): array
    {
        return $this->images;
    }

}