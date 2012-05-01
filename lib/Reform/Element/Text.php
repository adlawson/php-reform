<?php

namespace Reform\Element;

use Reform\Attribute\String,
    Reform\Renderer\ViewScript;

/**
 * Text element
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 */
class Text extends ElementAbstract
{
    /**
     * Setup the element
     * @param string $name
     * @param mixed $value
     */
    public function __construct( $name, $value = null )
    {
        $this->name  = new String( self::ATTRIBUTE_NAME, $name );
        $this->value = new String( self::ATTRIBUTE_VALUE, $value );
        $this->renderer = new ViewScript( dirname( dirname( __DIR__ ) ) . '/views/text.phtml' );
    }
}