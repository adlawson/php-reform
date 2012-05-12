<?php

namespace Reform\Test\Unit\Element;

use Reform\Element;

require_once 'ElementTestCase.php';

/**
 * Element test case
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 * 
 * @covers Reform\Element\Text
 */
class TextTest extends ElementTestCase
{
    /**
     * Setup the test case
     */
    public function setUp()
    {
        $this->setElementClass( 'Reform\Element\Text' );
    }
}