<?php

namespace Reform\Attribute;

/**
 * Boolean attribute
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 */
class Boolean extends Attribute
{
    /**
     * Set the value
     * @param float $value
     */
    public function setValue( $value )
    {
        $this->value = (boolean) $value;
    }

    /**
     * Get the string representation
     * @return string
     */
    public function __toString()
    {
        return $this->getValue() ? $this->getName() : '';
    }
}