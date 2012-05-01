<?php

namespace Reform\Test\Renderer;

use Reform\Renderer;

/**
 * Renderer test case
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 * 
 * @covers Reform\Renderer\Renderer
 * @covers Reform\Renderer\ViewScript
 */
class ViewScriptTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Reform\Renderer\ViewScript::__construct
     * @covers Reform\Renderer\ViewScript::setPath
     */
    public function testConstructor()
    {
        $renderer = $this->getMockBuilder( 'Reform\Renderer\ViewScript' )
            ->disableOriginalConstructor()
            ->getMock();

        $renderer->expects( $this->once() )
            ->method( 'setPath' );

        $renderer->__construct( 'path/to/view/script.phtml' );

        $this->assertInstanceOf( 'Reform\Renderer\Renderer', $renderer );
    }

    /**
     * @covers Reform\Renderer\ViewScript::getPath
     */
    public function testGetPath()
    {
        $path = 'path/to/view/script.phtml';
        $renderer = new Renderer\ViewScript( $path );

        $this->assertSame( $path, $renderer->getPath() );
    }

    /**
     * @covers Reform\Renderer\ViewScript::getPath
     * @covers Reform\Renderer\ViewScript::setPath
     */
    public function testSetPath()
    {
        $path = 'path/to/view/script.phtml';
        $renderer = new Renderer\ViewScript( 'temp/path' );
        $renderer->setPath( $path );

        $this->assertSame( $path, $renderer->getPath() );
    }

    /**
     * @covers Reform\Renderer\ViewScript::render
     */
    public function testRender()
    {
        $path = __DIR__ . '/views/working.phtml';
        $renderer = new Renderer\ViewScript( $path );
        $output = $renderer->render( $this->getMock( 'Reform\Renderer\Renderable' ) );

        $this->assertSame( $output, file_get_contents( $path ) );
    }

    /**
     * @covers Reform\Renderer\ViewScript::render
     * @expectedException UnexpectedValueException
     */
    public function testRender_WithException()
    {
        $path = __DIR__ . '/views/broken.phtml';
        $renderer = new Renderer\ViewScript( $path );
        $output = $renderer->render( $this->getMock( 'Reform\Renderer\Renderable' ) );
    }
}