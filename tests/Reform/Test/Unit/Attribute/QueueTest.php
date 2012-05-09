<?php

namespace Reform\Test\Unit\Attribute;

use Reform\Attribute;

/**
 * Attribute queue test case
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 * 
 * @covers Reform\Attribute\Queue
 */
class QueueTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Setup the test case
     */
    public function setUp()
    {
        $this->queue = new Attribute\Queue;

        $this->attribute = $this->getMockBuilder( 'Reform\Attribute\Attribute' )
            ->setConstructorArgs( array( 'attribute_name', 'attribute_value' ) )
            ->getMock();
    }

    /**
     * @covers Reform\Attribute\Queue
     */
    public function testInstance()
    {
        $this->assertInstanceOf( 'Traversable', $this->queue );
        $this->assertInstanceOf( 'SplDoublyLinkedList', $this->queue );
    }

    /**
     * @covers Reform\Attribute\Queue::push
     */
    public function testPush()
    {
        $this->queue->push( $this->attribute );

        $this->assertCount( 1, $this->queue );
        $this->assertSame( $this->attribute, $this->queue->pop() );
    }

    /**
     * @covers Reform\Attribute\Queue::push
     */
    public function testPush_Invalid()
    {
        $this->queue->push( new \stdClass );

        $this->assertCount( 0, $this->queue );
    }

    /**
     * @covers Reform\Attribute\Queue::unshift
     */
    public function testUnshift()
    {
        $this->queue->unshift( $this->attribute );

        $this->assertCount( 1, $this->queue );
        $this->assertSame( $this->attribute, $this->queue->shift() );
    }

    /**
     * @covers Reform\Attribute\Queue::unshift
     */
    public function testUnshift_Invalid()
    {
        $this->queue->unshift( new \stdClass );

        $this->assertCount( 0, $this->queue );
    }

    /**
     * @covers Reform\Attribute\Queue::__toString
     */
    public function testToString()
    {
        $this->queue->push( $this->attribute );

        $this->assertTrue( is_string( (string) $this->queue ) );
    }

    /**
     * @covers Reform\Attribute\Queue::__toString
     */
    public function testToString_IsTrimmed()
    {
        $this->queue->push( $this->attribute );

        $this->assertSame( trim( (string) $this->queue, ' ' ), (string) $this->queue );
    }

    /**
     * @covers Reform\Attribute\Queue::__toString
     */
    public function testToString_Empty()
    {
        $this->assertTrue( '' === (string) $this->queue );
    }
}