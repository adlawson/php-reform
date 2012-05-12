<?php

namespace Reform\Test\Unit\Element;

use Reform\Element;

/**
 * Element test case
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 * 
 * @covers Reform\Element\Element
 * @covers Reform\Element\ElementAbstract
 */
class ElementTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * The element class name to test
     * @var string
     */
    private $elementClass;

    /**
     * Set the element class name to test
     * @param string $class
     */
    public function setElementClass( $class )
    {
        $this->elementClass = (string) $class;
    }

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
            array( .1 ),
            array( 0.12345 ),
            array( -199999 ),
            array( -0.12345 ),
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
            array( .1 ),
            array( 0.12345 ),
            array( -199999 ),
            array( -0.12345 ),
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
     * @covers Reform\Element\ElementAbstract::__construct
     */
    public function testConstructor()
    {
        $element = $this->getMockBuilder( $this->elementClass )
            ->disableOriginalConstructor()
            ->getMock();

        $element->__construct( 'element_name' );

        $this->assertInstanceOf( 'Reform\Element\Element', $element );
    }

    /**
     * @covers Reform\Element\ElementAbstract::__construct
     */
    public function testConstructor_WithValue()
    {
        $element = $this->getMockBuilder( $this->elementClass )
            ->disableOriginalConstructor()
            ->getMock();

        $element->__construct( 'element_name', 'element_value' );

        $this->assertInstanceOf( 'Reform\Element\Element', $element );
    }

    /**
     * @covers Reform\Element\ElementAbstract::getRenderer
     */
    public function testGetRenderer()
    {
        $class = $this->elementClass;
        $element = new $class( 'element_name' );

        $this->assertInstanceOf( 'Reform\Renderer\Renderer', $element->getRenderer() );
    }

    /**
     * @covers Reform\Element\ElementAbstract::getName
     * @dataProvider nameDataProvider
     * @param mixed $name
     */
    public function testGetName( $name )
    {
        $class = $this->elementClass;
        $element = new $class( $name );

        $this->assertSame( (string) $name, $element->getName() );
    }

    /**
     * @covers Reform\Element\ElementAbstract::getName
     * @covers Reform\Element\ElementAbstract::setName
     * @dataProvider nameDataProvider
     * @param mixed $name
     */
    public function testSetName( $name )
    {
        $class = $this->elementClass;
        $element = new $class( 'temp_name' );
        $element->setName( $name );

        $this->assertSame( (string) $name, $element->getName() );
    }

    /**
     * @covers Reform\Element\ElementAbstract::setName
     * @dataProvider invalidNameDataProvider
     * @expectedException PHPUnit_Framework_Error
     * @param mixed $name
     */
    public function testInvalidName( $name )
    {
        $class = $this->elementClass;
        $element = new $class( $name );
    }

    /**
     * @covers Reform\Element\ElementAbstract::getValue
     * @dataProvider valueDataProvider
     * @param mixed $value
     */
    public function testGetValue( $value )
    {
        $class = $this->elementClass;
        $element = new $class( 'element_name', $value );

        $this->assertSame( (string) $value, $element->getValue() );
    }

    /**
     * @covers Reform\Element\ElementAbstract::getValue
     * @covers Reform\Element\ElementAbstract::setValue
     * @dataProvider valueDataProvider
     * @param mixed $value
     */
    public function testSetValue( $value )
    {
        $class = $this->elementClass;
        $element = new $class( 'element_name', 'temp_value' );
        $element->setValue( $value );

        $this->assertSame( (string) $value, $element->getValue() );
    }

    /**
     * @covers Reform\Element\ElementAbstract::setValue
     * @dataProvider invalidValueDataProvider
     * @expectedException PHPUnit_Framework_Error
     * @param mixed $value
     */
    public function testInvalidValue( $value )
    {
        $class = $this->elementClass;
        $element = new $class( 'element_name', $value );
    }

    /**
     * @covers Reform\Element\ElementAbstract::getAttributes
     */
    public function testGetAttributes()
    {
        $class = $this->elementClass;
        $element = new $class( 'element_name' );

        $this->assertInstanceOf( 'Traversable', $element->getAttributes() );
    }

    /**
     * @covers Reform\Element\ElementAbstract::getValidators
     */
    public function testGetValidators()
    {
        $class = $this->elementClass;
        $element = new $class( 'element_name' );

        $this->assertInstanceOf( 'Traversable', $element->getValidators() );
    }

    /**
     * @covers Reform\Element\ElementAbstract::getMessage
     */
    public function testGetMessage_Empty()
    {
        $class = $this->elementClass;
        $element = new $class( 'element_name' );

        $this->assertNull( $element->getMessage() );
    }

    /**
     * @covers Reform\Element\ElementAbstract::attach
     * @covers Reform\Element\ElementAbstract::isValid
     */
    public function testIsValid()
    {
        $validator = $this->getMock( 'Reform\Validator\Validator' );

        $validator->expects( $this->once() )
            ->method( 'validate' );

        $class = $this->elementClass;
        $element = new $class( 'element_name' );
        $element->attach( $validator );

        $this->assertTrue( $element->isValid() );
    }

    /**
     * @covers Reform\Element\ElementAbstract::isValid
     */
    public function testIsValid_NoValidators()
    {
        $class = $this->elementClass;
        $element = new $class( 'element_name' );

        $this->assertTrue( $element->isValid() );
    }

    /**
     * @covers Reform\Element\ElementAbstract::attach
     * @covers Reform\Element\ElementAbstract::isValid
     */
    public function testIsValid_Invalid()
    {
        $exception = $this->getMockBuilder( 'Reform\Validator\ValidationException' )
            ->setConstructorArgs( array( $this->getMock( 'Reform\Validator\Validator' ) ) )
            ->getMock();

        $validator = $this->getMock( 'Reform\Validator\Validator' );

        $validator->expects( $this->once() )
            ->method( 'validate' )
            ->will( $this->throwException( $exception ) );

        $class = $this->elementClass;
        $element = new $class( 'element_name' );
        $element->attach( $validator );

        $this->assertFalse( $element->isValid() );
    }
}