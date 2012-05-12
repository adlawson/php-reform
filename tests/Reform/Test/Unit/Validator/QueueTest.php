<?php

namespace Reform\Test\Unit\Validator;

use Reform\Validator;

/**
 * Validator queue test case
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 * 
 * @covers Reform\Validator\Queue
 */
class QueueTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Setup the test case
     */
    public function setUp()
    {
        $this->queue = new Validator\Queue;

        $this->attribute = $this->getMockBuilder( 'Reform\Validator\Validator' )
            ->setConstructorArgs( array( 'attribute_name', 'attribute_value' ) )
            ->getMock();
    }

    /**
     * @covers Reform\Validator\Queue
     */
    public function testInstance()
    {
        $this->assertInstanceOf( 'Traversable', $this->queue );
        $this->assertInstanceOf( 'SplDoublyLinkedList', $this->queue );
    }

    /**
     * @covers Reform\Validator\Queue::push
     */
    public function testPush()
    {
        $this->queue->push( $this->attribute );

        $this->assertCount( 1, $this->queue );
        $this->assertSame( $this->attribute, $this->queue->pop() );
    }

    /**
     * @covers Reform\Validator\Queue::push
     */
    public function testPush_Invalid()
    {
        $this->queue->push( new \stdClass );

        $this->assertCount( 0, $this->queue );
    }

    /**
     * @covers Reform\Validator\Queue::unshift
     */
    public function testUnshift()
    {
        $this->queue->unshift( $this->attribute );

        $this->assertCount( 1, $this->queue );
        $this->assertSame( $this->attribute, $this->queue->shift() );
    }

    /**
     * @covers Reform\Validator\Queue::unshift
     */
    public function testUnshift_Invalid()
    {
        $this->queue->unshift( new \stdClass );

        $this->assertCount( 0, $this->queue );
    }
}