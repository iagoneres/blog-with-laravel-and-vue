<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ArticleValidator.
 *
 * @package namespace App\Validators;
 */
class ArticleValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'title'         => 'required',
            'description'   => 'required',
            'content'       => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [
//            'title'         => 'required',
//            'description'   => 'required',
//            'content'       => 'required',
        ],
    ];
}
