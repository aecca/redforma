<?php

declare(strict_types=1);

namespace Redforma\Reviews\Domain\Model\Company;

/**
 * Class CompanyInfo
 *
 * @package Redforma\Reviews\Domain\Model\Company
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class ContactInformation
{
    protected $address;
    protected $phone1;
    protected $phone2;
    protected $facebook;
    protected $twitter;
    protected $webpage;

    /**
     * @return String
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return String
     */
    public function getPhone1()
    {
        return $this->phone1;
    }

    /**
     * @return String
     */
    public function getPhone2()
    {
        return $this->phone2;
    }

    /**
     * @return String
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @return String
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * @return String
     */
    public function getWebpage()
    {
        return $this->webpage;
    }


}