<?php

namespace Reform\Element;

/**
 * Element interface
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 */
interface Element
{
    /**
     * Setup the element
     * @param string $name
     * @param mixed $value
     */
    public function __construct( $name, $value = null );

    /**
     * Get the name
     * @return string
     */
    public function getName();

    /**
     * Set the name
     * @param string $name
     */
    public function setName( $name );

    /**
     * Get the value
     * @return mixed
     */
    public function getValue();

    /**
     * Set the value
     * @param mixed $value
     */
    public function setValue( $value );
}