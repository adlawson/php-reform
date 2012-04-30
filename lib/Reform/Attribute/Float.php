<?php

namespace Reform\Attribute;

/**
 * Float attribute
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 */
class Float extends Attribute
{
    /**
     * Set the value
     * @param float $value
     */
    public function setValue( $value )
    {
        $this->value = floatval( $value );
    }

    /**
     * Get the string representation
     * @return string
     */
    public function __toString()
    {
        return $this->getName() . '=' . $this->getValue() . '';
    }
}