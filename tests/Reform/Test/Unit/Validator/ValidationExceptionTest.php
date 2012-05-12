<?php

namespace Reform\Test\Unit\Validator;

use Reform\Validator\ValidationException;

/**
 * Validation exception test case
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 * 
 * @covers Reform\Validator\ValidationException
 */
class ValidationExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Reform\Validator\ValidationException::__construct
     */
    public function testConstructor()
    {
        $exception = new ValidationException( $this->getMock( 'Reform\Validator\Validator' ) );

        $this->assertInstanceOf( 'UnexpectedValueException', $exception );
    }

    /**
     * @covers Reform\Validator\ValidationException::getValidator
     */
    public function testGetValidator()
    {
        $validator = $this->getMock( 'Reform\Validator\Validator' );
        $exception = new ValidationException( $validator );

        $this->assertSame( $validator, $exception->getValidator() );
    }
}