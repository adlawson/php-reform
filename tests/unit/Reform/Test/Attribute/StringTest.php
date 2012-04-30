<?php

namespace Reform\Test\Attribute;

use Reform\Attribute;

require_once 'AttributeTestCase.php';

/**
 * Attribute test case
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 * 
 * @covers Reform\Attribute\String
 */
class StringTest extends AttributeTestCase
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

            array( 'value' ),
            array( 'extra-mega-long-value-with-hyphens' ),
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
     * @covers Reform\Attribute\String::getName
     * @covers Reform\Attribute\String::setName
     * @dataProvider nameDataProvider
     * @param mixed $name
     */
    public function testName( $name )
    {
        $attribute = new Attribute\String( $name );

        $this->assertSame( (string) $name, $attribute->getName() );
    }

    /**
     * @covers Reform\Attribute\String::setName
     * @dataProvider invalidNameDataProvider
     * @expectedException PHPUnit_Framework_Error
     * @param mixed $name
     */
    public function testInvalidName( $name )
    {
        $attribute = new Attribute\String( $name );
    }

    /**
     * @covers Reform\Attribute\String::getValue
     * @covers Reform\Attribute\String::setValue
     * @dataProvider valueDataProvider
     * @param mixed $value
     */
    public function testValue( $value )
    {
        $attribute = new Attribute\String( 'attribute_name', $value );

        $this->assertSame( (string) $value, $attribute->getValue() );
    }

    /**
     * @covers Reform\Attribute\String::setValue
     * @dataProvider invalidValueDataProvider
     * @expectedException PHPUnit_Framework_Error
     * @param mixed $value
     */
    public function testInvalidValue( $value )
    {
        $attribute = new Attribute\String( 'attribute_name', $value );
    }

    /**
     * @covers Reform\Attribute\String::__toString
     */
    public function testToString()
    {
        $name = 'attribute_name';
        $value = 'attribute_value';

        $attribute = new Attribute\String( $name, $value );

        $this->assertTrue( false !== strpos( (string) $attribute, $name ), 'String doesn\'t contain the attribute name.' );
        $this->assertTrue( false !== strpos( (string) $attribute, $value ), 'String doesn\'t contain the attribute value.' );
        $this->assertTrue( false !== strpos( (string) $attribute, '"' . $value . '"' ), 'String doesn\'t contain the attribute value in quotes.' );
    }
}