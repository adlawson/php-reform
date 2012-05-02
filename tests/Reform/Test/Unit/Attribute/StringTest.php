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
 * @covers Reform\Attribute\String
 */
class StringTest extends AttributeTestCase
{
    /**
     * Setup the test case
     */
    public function setUp()
    {
        $this->setAttributeClass( 'Reform\Attribute\Boolean' );
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