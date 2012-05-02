<?php

namespace Reform\Test\Unit\Renderer;

use Reform\Renderer;

/**
 * Renderer test case
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 * 
 * @covers Reform\Renderer\Renderer
 */
class RendererTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * The renderer class name to test
     * @var string
     */
    private $rendererClass;

    /**
     * Set the renderer class name to test
     * @param string $class
     */
    public function setRendererClass( $class )
    {
        $this->rendererClass = (string) $class;
    }

    /**
     * @covers Reform\Renderer\Renderer::__construct
     */
    public function testConstructor()
    {
        $class = $this->rendererClass;
        $renderer = new $class;

        $this->assertInstanceOf( 'Reform\Renderer\Renderer', $renderer );
    }
}