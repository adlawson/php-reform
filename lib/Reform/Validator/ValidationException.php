<?php

namespace Reform\Validator;

/**
 * Validation exception
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 */
class ValidationException extends \UnexpectedValueException
{
    /**
     * The validator
     * @var Validator
     */
    private $validator;

    /**
     * Setup the exception
     * @param Validator $validator
     */
    public function __construct( Validator $validator )
    {
        parent::__construct( $validator->getMessage() );

        $this->validator = $validator;
    }

    /**
     * Get the validator
     * @return Validator
     */
    public function getValidator()
    {
        return $this->validator;
    }
}