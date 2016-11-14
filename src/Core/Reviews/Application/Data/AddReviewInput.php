<?php

namespace Redforma\Reviews\Application\Data;

use Redforma\Common\Adapter\Input\Input;

/**
 * Class AddReviewInput
 *
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2016
 *
 * @method string title()
 * @method string description()
 * @method int companyId()
 * @method string companyName()
 * @method int authorId()
 */
class AddReviewInput extends Input
{
    public $title;
    public $description;
    public $companyId;
    public $companyName;
    public $authorId;

    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
    }
}