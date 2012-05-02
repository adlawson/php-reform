<?php

namespace Reform\Test\Integration\Element;

use Reform\Attribute,
    Reform\Decorator,
    Reform\Element;

/**
 * Attribute test case
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 */
class TextTest extends \PHPUnit_Framework_TestCase
{
    public function testAttributes()
    {
        $element = new Element\Text( 'element_name' );

        $foo = new Attribute\String( 'placeholder', 'placeholder_value' );
        $bar = new Attribute\Integer( 'maxlength', 32 );
        $baz = new Attribute\Boolean( 'required', true );

        $element->attach( $foo );
        $element->attach( $bar );
        $element->attach( $baz );

        $this->assertContains( $foo, $element->getAttributes() );
        $this->assertContains( $bar, $element->getAttributes() );
        $this->assertContains( $baz, $element->getAttributes() );
    }

    /**
     * @covers Reform\Element\Text::__toString
     */
    public function testToString()
    {
        $path = __DIR__ . '/views/working.phtml';
        $element = new Element\Text( 'element_name' );
        $element->getRenderer()->setPath( $path );

        $this->assertSame( (string) $element, file_get_contents( $path ) );
    }

    /**
     * @covers Reform\Element\Text::__toString
     * @expectedException Reform\Test\Integration\Element\MockException
     */
    public function testToString_WithException()
    {
        set_error_handler( function( $errno ) {

            if ( E_USER_ERROR === $errno )
            {
                throw new MockException( 'HACK HACK HACK' );
            }

        } );

        $path = __DIR__ . '/views/broken.phtml';
        $element = new Element\Text( 'element_name' );
        $element->getRenderer()->setPath( $path );

        $output = $element->__toString();

        restore_error_handler();
    }
}

/**
 * Mock exception
 */
class MockException extends \Exception
{

}