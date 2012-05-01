<?php

namespace Reform\Renderer;

/**
 * Renderer
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 */
class ViewScript implements Renderer
{
    /**
     * Setup the renderer
     * @param string $path
     */
    public function __construct( $path )
    {
        $this->setPath( $path );
    }

    /**
     * Render the element
     * @param Renderable $element
     * @return string
     */
    public function render( Renderable $element )
    {
        ob_start();

        require $this->getPath();

        return ob_get_clean();
    }

    /**
     * Get the path
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set the path
     * @param string $path
     */
    public function setPath( $path )
    {
        $this->path = (string) $path;
    }
}