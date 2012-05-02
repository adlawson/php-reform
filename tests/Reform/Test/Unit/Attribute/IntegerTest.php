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
     * Setup the test case
     */
    public function setUp()
    {
        $this->setAttributeClass( 'Reform\Attribute\Boolean' );
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