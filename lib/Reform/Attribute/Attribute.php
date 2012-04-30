<?php

namespace Reform\Attribute;

/**
 * Attribute
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 */
abstract class Attribute
{
    /**
     * The name
     * @var string
     */
    protected $name;

    /**
     * The value
     * @var string
     */
    protected $value;

    /**
     * Set the value
     * @param string $value
     */
    abstract public function setValue( $value );

    /**
     * Get the string representation
     * @return string
     */
    abstract public function __toString();

    /**
     * Setup the attribute
     * @param string $name
     * @param string $value
     */
    public function __construct( $name, $value = null )
    {
        $this->setName( $name );
        $this->setValue( $value );
    }

    /**
     * Get the name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the name
     * @param string $name
     */
    public function setName( $name )
    {
        $this->name = (string) $name;
    }

    /**
     * Get the value
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}