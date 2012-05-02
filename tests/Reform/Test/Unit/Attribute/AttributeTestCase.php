<?php

namespace Reform\Test\Unit\Attribute;

use Reform\Attribute;

/**
 * Attribute test case
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 * 
 * @covers Reform\Attribute\Attribute
 */
abstract class AttributeTestCase extends \PHPUnit_Framework_Testcase
{
    /**
     * The attribute class name to test
     * @var string
     */
    private $attributeClass;

    /**
     * Set the attribute class name to test
     * @param string $class
     */
    public function setAttributeClass( $class )
    {
        $this->attributeClass = (string) $class;
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
     * @covers Reform\Attribute\Attribute::__construct
     */
    public function testConstructor()
    {
        $attribute = $this->getMockBuilder( $this->attributeClass )
            ->disableOriginalConstructor()
            ->getMock();

        $attribute->expects( $this->once() )
            ->method( 'setName' );

        $attribute->__construct( 'attribute_name' );

        $this->assertInstanceOf( 'Reform\Attribute\Attribute', $attribute );
    }

    /**
     * @covers Reform\Attribute\Attribute::__construct
     */
    public function testConstructor_WithValue()
    {
        $attribute = $this->getMockBuilder( $this->attributeClass )
            ->disableOriginalConstructor()
            ->getMock();

        $attribute->expects( $this->once() )
            ->method( 'setValue' );

        $attribute->__construct( 'attribute_name', 'attribute_value' );

        $this->assertInstanceOf( 'Reform\Attribute\Attribute', $attribute );
    }

    /**
     * @covers Reform\Attribute\Attribute::getName
     * @covers Reform\Attribute\Attribute::setName
     * @dataProvider nameDataProvider
     * @param mixed $name
     */
    public function testName( $name )
    {
        $class = $this->attributeClass;
        $attribute = new $class( $name );

        $this->assertSame( (string) $name, $attribute->getName() );
    }

    /**
     * @covers Reform\Attribute\Attribute::setName
     * @dataProvider invalidNameDataProvider
     * @expectedException PHPUnit_Framework_Error
     * @param mixed $name
     */
    public function testInvalidName( $name )
    {
        $class = $this->attributeClass;
        $attribute = new $class( $name );
    }
}