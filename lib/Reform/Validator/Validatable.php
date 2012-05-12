<?php

namespace Reform\Validator;

use Reform\Element\Element;

/**
 * Validatable interface
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 */
interface Validatable extends Element
{
    /**
     * Get the validation message
     * @return string
     */
    public function getMessage();

    /**
     * Get the validators
     * @return Queue
     */
    public function getValidators();

    /**
     * Validate the element
     * @return boolean
     */
    public function isValid();
}