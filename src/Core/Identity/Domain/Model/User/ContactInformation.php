<?php

namespace Redforma\Identity\Domain\Model\User;

/**
 * Class ContactInformation
 *
 * @package Redforma\Identity\Domain\Model\User
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class ContactInformation
{
    protected $address;
    protected $cellphone;
    protected $phone;
    protected $facebook;
    protected $twitter;

    public function getAddress(): String
    {
        return $this->address;
    }

    public function setAddress(String $address)
    {
        $this->address = $address;
    }

    public function getCellphone(): String
    {
        return $this->cellphone;
    }

    public function setCellphone(String $cellphone)
    {
        $this->cellphone = $cellphone;
    }

    public function getPhone(): String
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
}