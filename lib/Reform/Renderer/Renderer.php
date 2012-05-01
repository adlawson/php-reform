<?php

namespace Reform\Renderer;

/**
 * Renderer interface
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 */
interface Renderer
{
    /**
     * Render the element
     * @param Renderable $element
     * @return string
     */
    public function render( Renderable $element );
}