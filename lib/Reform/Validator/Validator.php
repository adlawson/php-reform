<?php

namespace Reform\Validator;

/**
 * Validator interface
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 */
interface Validator
{
    /**
     * Validate the element
     * @param Validatable $element
     * @throws ValidationException If the element is not valid
     */
    public function validate( Validatable $element );

    /**
     * Get the error message
     * @return string
     */
    public function getMessage();

    /**
     * 
     * Set the error message
     * @param string $message
     */
    public function setMessage( $message );
}