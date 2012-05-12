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

        $this->validator = $this->getMockBuilder( 'Reform\Validator\Validator' )
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
        $this->queue->push( $this->validator );

        $this->assertCount( 1, $this->queue );
        $this->assertSame( $this->validator, $this->queue->pop() );
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
        $this->queue->unshift( $this->validator );

        $this->assertCount( 1, $this->queue );
        $this->assertSame( $this->validator, $this->queue->shift() );
    }

    /**
     * @covers Reform\Validator\Queue::unshift
     */
    public function testUnshift_Invalid()
    {
        $this->queue->unshift( new \stdClass );

        $this->assertCount( 0, $this->queue );
    }

    /**
     * @covers Reform\Validator\Queue::validate
     */
    public function testValidate()
    {
        $clone = clone $this->validator;
        $this->queue->push( $this->validator );
        $this->queue->push( $clone );

        $this->validator->expects( $this->once() )
            ->method( 'validate' );

        $clone->expects( $this->once() )
            ->method( 'validate' );

        $this->queue->validate( $this->getMock( 'Reform\Validator\Validatable' ) );
    }

    /**
     * @covers Reform\Validator\Queue::validate
     * @expectedException Reform\Validator\ValidationException
     */
    public function testValidate_Invalid()
    {
        $clone = clone $this->validator;
        $this->queue->push( $this->validator );
        $this->queue->push( $clone );

        $exception = $this->getMockBuilder( 'Reform\Validator\ValidationException' )
            ->setConstructorArgs( array( $this->getMock( 'Reform\Validator\Validator' ) ) )
            ->getMock();

        $this->validator->expects( $this->once() )
            ->method( 'validate' )
            ->will( $this->throwException( $exception ) );

        $clone->expects( $this->never() )
            ->method( 'validate' );

        $this->queue->validate( $this->getMock( 'Reform\Validator\Validatable' ) );
    }

    /**
     * @covers Reform\Validator\Queue::validate
     */
    public function testValidate_EmptyQueue()
    {
        $this->assertNull( $this->queue->validate( $this->getMock( 'Reform\Validator\Validatable' ) ) );
    }
}