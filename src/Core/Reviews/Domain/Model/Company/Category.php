<?php

namespace Redforma\Reviews\Domain\Model\Company;

use Redforma\Common\Domain\Model\Entity;
use Redforma\Common\Util\Strings;

/**
 * Class Category
 *
 * @package Redforma\Reviews\Domain\Model\Company
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class Category extends Entity
{
    const STATE_ACTIVE  = 1;
    const STATE_INACTIVE = 0;

    protected $slug;
    protected $name;
    protected $image;
    protected $state;

    public function __construct(String $name, String $image = null)
    {
        $this->name = $name;
        $this->slug = Strings::slugify($name);
        $this->image = $image;
    }

    /**
     * @return String
     */
    public function getSlug(): String
    {
        return $this->slug;
    }

    /**
     * @param String $slug
     */
    public function setSlug(String $slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return String
     */
    public function getName(): String
    {
        return $this->name;
    }

    /**
     * @param String $name
     */
    public function setName(String $name)
    {
        $this->name = $name;
    }

    /**
     * @return String
     */
    public function getImage(): String
    {
        return $this->image;
    }

    /**
     * @param String $image
     */
    public function setImage(String $image)
    {
        $this->image = $image;
    }




}