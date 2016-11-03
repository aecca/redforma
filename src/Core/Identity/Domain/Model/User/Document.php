<?php

namespace Redforma\Identity\Domain\Model\User;

use Assert\Assertion;

/**
 * Class Document
 *
 * @package Redforma\Identity\Domain\Model\User
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 */
class Document extends Assertion
{
    protected $number;
    protected $type;

    public function __construct(int $number = null, String $type = DocumentType::DNI)
    {
        $this->number = $number;
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param int $number
     */
    public function setNumber(int $number)
    {
        $this->numeric($number, 'El número de documento es incorrecto');
        $this->number = $number;
    }

    /**
     * @return String
     */
    public function getType(): String
    {
        return $this->type;
    }

    /**
     * @param String $type
     */
    public function setType(String $type)
    {
        $this->same(true, DocumentType::isValidValue($type), 'El tipo de documento no es correcto');
        $this->type = $type;
    }


}