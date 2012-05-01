<?php

namespace Reform\Renderer;

/**
 * Renderable interface
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 */
interface Renderable
{
    /**
     * Get the string representation
     * @return string
     */
    public function __toString();
}