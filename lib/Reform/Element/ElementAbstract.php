<?php

namespace Reform\Element;

use Reform\Attribute\Attributable;

/**
 * Element
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 */
abstract class ElementAbstract implements Attributable, Element
{
    /**
     * Atrribute names
     * @const string
     */
    const ATTRIBUTE_NAME  = 'name';
    const ATTRIBUTE_VALUE = 'value';

    /**
     * The attributes
     * @var SplQueue
     */
    protected $attributes;

    /**
     * The decorators
     * @var SplStack
     */
    protected $decorators;

    /**
     * The name
     * @var Reform\Attribute\Attribute
     */
    protected $name;

    /**
     * The value
     * @var Reform\Attribute\Attribute
     */
    protected $value;

    /**
     * Get the attributes
     * @return SplQueue
     */
    public function getAttributes()
    {
        return $this->attributes ?: new \SplQueue;
    }

    /**
     * Get the decorators
     * @return SplStack
     */
    public function getDecorators()
    {
        return $this->decorators ?: new \SplStack;
    }

    /**
     * Get the name
     * @return string
     */
    public function getName()
    {
        return $this->name->getValue();
    }

    /**
     * Set the name
     * @param string $name
     */
    public function setName( $name )
    {
        $this->name->setValue( $name ); 
    }

    /**
     * Get the value
     * @return mixed
     */
    public function getValue()
    {
        return $this->value->getValue();
    }

    /**
     * Set the value
     * @param mixed $value
     */
    public function setValue( $value )
    {
        $this->value->setValue( $value );
    }

    /**
     * Get the string representation
     * @return string
     */
    public function __toString()
    {
        //return $this->getRenderer()->render( $this );
    }
}