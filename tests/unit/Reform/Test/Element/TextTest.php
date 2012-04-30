<?php

namespace Reform\Test\Element;

use Reform\Element;

/**
 * Element test case
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 * 
 * @covers Reform\Element\Element
 * @covers Reform\Element\Text
 */
class TextTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Name data provider
     * @return array
     */
    public function nameDataProvider()
    {
        return array(

            array( 'name' ),
            array( 'extra-mega-long-name-with-hyphens' ),
            array( 1 ),
            array( null ),
            array( true ),
            array( false ),
            array( '' ),
            array( array() )

        );
    }

    /**
     * Invalid name data provider
     * @return array
     */
    public function invalidNameDataProvider()
    {
        return array(

            array( new \stdClass )

        );
    }

    /**
     * Value data provider
     * @return array
     */
    public function valueDataProvider()
    {
        return array(

            array( 'name' ),
            array( 'extra-mega-long-name-with-hyphens' ),
            array( 1 ),
            array( null ),
            array( true ),
            array( false ),
            array( '' ),
            array( array() )

        );
    }

    /**
     * Invalid value data provider
     * @return array
     */
    public function invalidValueDataProvider()
    {
        return array(

            array( new \stdClass )

        );
    }

    /**
     * @covers Reform\Element\Text::__construct
     */
    public function testConstructor()
    {
        $element = $this->getMockBuilder( 'Reform\Element\Text' )
            ->disableOriginalConstructor()
            ->getMock();

        $element->__construct( 'element_name' );

        $this->assertInstanceOf( 'Reform\Element\Element', $element );
    }

    /**
     * @covers Reform\Element\Text::__construct
     */
    public function testConstructor_WithValue()
    {
        $element = $this->getMockBuilder( 'Reform\Element\Text' )
            ->disableOriginalConstructor()
            ->getMock();

        $element->__construct( 'element_name', 'element_value' );

        $this->assertInstanceOf( 'Reform\Element\Element', $element );
    }

    /**
     * @covers Reform\Element\Text::getName
     * @dataProvider nameDataProvider
     * @param mixed $name
     */
    public function testGetName( $name )
    {
        $element = new Element\Text( $name );

        $this->assertSame( (string) $name, $element->getName() );
    }

    /**
     * @covers Reform\Element\Text::getName
     * @covers Reform\Element\Text::setName
     * @dataProvider nameDataProvider
     * @param mixed $name
     */
    public function testSetName( $name )
    {
        $element = new Element\Text( 'temp_name' );
        $element->setName( $name );

        $this->assertSame( (string) $name, $element->getName() );
    }

    /**
     * @covers Reform\Element\Text::setName
     * @dataProvider invalidNameDataProvider
     * @expectedException PHPUnit_Framework_Error
     * @param mixed $name
     */
    public function testInvalidName( $name )
    {
        $element = new Element\Text( $name );
    }

    /**
     * @covers Reform\Element\Text::getValue
     * @dataProvider valueDataProvider
     * @param mixed $value
     */
    public function testGetValue( $value )
    {
        $element = new Element\Text( 'element_name', $value );

        $this->assertSame( (string) $value, $element->getValue() );
    }

    /**
     * @covers Reform\Element\Text::getValue
     * @covers Reform\Element\Text::setValue
     * @dataProvider valueDataProvider
     * @param mixed $value
     */
    public function testSetValue( $value )
    {
        $element = new Element\Text( 'element_name', 'temp_value' );
        $element->setValue( $value );

        $this->assertSame( (string) $value, $element->getValue() );
    }

    /**
     * @covers Reform\Element\Text::setValue
     * @dataProvider invalidValueDataProvider
     * @expectedException PHPUnit_Framework_Error
     * @param mixed $value
     */
    public function testInvalidValue( $value )
    {
        $element = new Element\Text( 'element_name', $value );
    }

    /**
     * @covers Reform\Element\Text::getAttributes
     */
    public function testGetAttributes()
    {
        $element = new Element\Text( 'element_name' );

        $this->assertInstanceOf( 'Traversable', $element->getAttributes() );
    }

    /**
     * @covers Reform\Element\Text::getDecorators
     */
    public function testGetDecorators()
    {
        $element = new Element\Text( 'element_name' );

        $this->assertInstanceOf( 'Traversable', $element->getDecorators() );
    }
}