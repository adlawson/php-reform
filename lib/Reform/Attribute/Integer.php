<?php

namespace Reform\Attribute;

/**
 * Integer attribute
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 */
class Integer extends Attribute
{
    /**
     * Set the value
     * @param integer $value
     */
    public function setValue( $value )
    {
        $this->value = intval( $value );
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