<?php

namespace Reform\Attribute;

/**
 * Attribute queue
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 */
class Queue extends \SplQueue
{
    /**
     * Get the string representation
     * @return string
     */
    public function __toString()
    {
        $output = '';

        foreach ( $this as $attribute )
        {
            $output .= ' ' . $attribute;
        }

        return ltrim( $output, ' ' );
    }
}