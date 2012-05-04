<?php

namespace Reform\Attribute;

/**
 * Attributable interface
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 */
interface Attributable
{
    /**
     * Get the attributes
     * @return Queue
     */
    public function getAttributes();
}