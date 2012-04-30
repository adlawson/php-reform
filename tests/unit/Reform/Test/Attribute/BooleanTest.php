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
 * @covers Reform\Attribute\Boolean
 */
class BooleanTest extends AttributeTestCase
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
            array( array() ),
            array( new \stdClass )

        );
    }

    /**
     * @covers Reform\Attribute\Boolean::getName
     * @covers Reform\Attribute\Boolean::setName
     * @dataProvider nameDataProvider
     * @param mixed $name
     */
    public function testName( $name )
    {
        $attribute = new Attribute\Boolean( $name );

        $this->assertSame( (string) $name, $attribute->getName() );
    }

    /**
     * @covers Reform\Attribute\Boolean::setName
     * @dataProvider invalidNameDataProvider
     * @expectedException PHPUnit_Framework_Error
     * @param mixed $name
     */
    public function testInvalidName( $name )
    {
        $attribute = new Attribute\Boolean( $name );
    }

    /**
     * @covers Reform\Attribute\Boolean::getValue
     * @covers Reform\Attribute\Boolean::setValue
     * @dataProvider valueDataProvider
     * @param mixed $value
     */
    public function testValue( $value )
    {
        $attribute = new Attribute\Boolean( 'attribute_name', $value );

        $this->assertSame( (boolean) $value, $attribute->getValue() );
    }

    /**
     * @covers Reform\Attribute\Boolean::__toString
     */
    public function testToString_CaseTrue()
    {
        $name = 'attribute_name';
        $value = true;

        $attribute = new Attribute\Boolean( $name, $value );

        $this->assertTrue( false !== strpos( (string) $attribute, $name ), 'String doesn\'t contain the attribute name.' );
        $this->assertTrue( false === strpos( (string) $attribute, $value ), 'String contains the attribute value.' );
    }

    /**
     * @covers Reform\Attribute\Boolean::__toString
     */
    public function testToString_CaseFalse()
    {
        $name = 'attribute_name';
        $value = false;

        $attribute = new Attribute\Boolean( $name, $value );

        $this->assertTrue( false === strpos( (string) $attribute, $name ), 'String contains the attribute name.' );
        $this->assertTrue( false === strpos( (string) $attribute, $value ), 'String contains the attribute value.' );
    }
}