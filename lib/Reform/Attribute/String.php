<?php

namespace Reform\Attribute;

/**
 * String attribute
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 */
class String extends Attribute
{
    /**
     * Set the value
     * @param string $value
     */
    public function setValue( $value )
    {
        $this->value = (string) $value;
    }

    /**
     * Get the string representation
     * @return string
     */
    public function __toString()
    {
        return $this->getName() . '="' . $this->getValue() . '"';
    }
}