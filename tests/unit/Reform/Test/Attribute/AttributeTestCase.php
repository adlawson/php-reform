<?php

namespace Reform\Test\Attribute;

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
     * @covers Reform\Attribute\Attribute::__construct
     */
    public function testConstructor()
    {
        $attribute = $this->getMockBuilder( 'Reform\Attribute\Attribute' )
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
        $attribute = $this->getMockBuilder( 'Reform\Attribute\Attribute' )
            ->disableOriginalConstructor()
            ->getMock();

        $attribute->expects( $this->once() )
            ->method( 'setValue' );

        $attribute->__construct( 'attribute_name', 'attribute_value' );

        $this->assertInstanceOf( 'Reform\Attribute\Attribute', $attribute );
    }
}