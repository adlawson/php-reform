<?php

namespace Reform\Test\Unit\Attribute;

use Reform\Attribute;

require_once 'AttributeTestCase.php';

/**
 * Attribute test case
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 * 
 * @covers Reform\Attribute\Integer
 */
class IntegerTest extends AttributeTestCase
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
     * @covers Reform\Attribute\Integer::getName
     * @covers Reform\Attribute\Integer::setName
     * @dataProvider nameDataProvider
     * @param mixed $name
     */
    public function testName( $name )
    {
        $attribute = new Attribute\Integer( $name );

        $this->assertSame( (string) $name, $attribute->getName() );
    }

    /**
     * @covers Reform\Attribute\Integer::setName
     * @dataProvider invalidNameDataProvider
     * @expectedException PHPUnit_Framework_Error
     * @param mixed $name
     */
    public function testInvalidName( $name )
    {
        $attribute = new Attribute\Integer( $name );
    }

    /**
     * @covers Reform\Attribute\Integer::getValue
     * @covers Reform\Attribute\Integer::setValue
     * @dataProvider valueDataProvider
     * @param mixed $value
     */
    public function testValue( $value )
    {
        $attribute = new Attribute\Integer( 'attribute_name', $value );

        $this->assertSame( (integer) $value, $attribute->getValue() );
    }

    /**
     * @covers Reform\Attribute\Integer::setValue
     * @dataProvider invalidValueDataProvider
     * @expectedException PHPUnit_Framework_Error
     * @param mixed $value
     */
    public function testInvalidValue( $value )
    {
        $attribute = new Attribute\Integer( 'attribute_name', $value );
    }

    /**
     * @covers Reform\Attribute\Integer::__toString
     */
    public function testToString()
    {
        $name = 'attribute_name';
        $value = 1;

        $attribute = new Attribute\Integer( $name, $value );

        $this->assertTrue( false !== strpos( (string) $attribute, $name ), 'String doesn\'t contain the attribute name.' );
        $this->assertTrue( false !== strpos( (string) $attribute, (string) $value ), 'String doesn\'t contain the attribute value.' );
        $this->assertTrue( false === strpos( (string) $attribute, '"' . $value . '"' ), 'String contains the attribute value in quotes.' );
    }
}