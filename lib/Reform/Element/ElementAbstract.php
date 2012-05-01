<?php

namespace Reform\Element;

use Reform\Attribute\Attribute,
    Reform\Attribute\Attributable,
    Reform\Renderer\Renderer,
    Reform\Renderer\Renderable;

/**
 * Element
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 */
abstract class ElementAbstract implements Attributable, Element, Renderable
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
     * The name
     * @var Reform\Attribute\Attribute
     */
    protected $name;

    /**
     * The renderer
     * @var Renderer
     */
    protected $renderer;

    /**
     * The value
     * @var Reform\Attribute\Attribute
     */
    protected $value;

    /**
     * Attach a modifier
     * @param mixed $modifier
     */
    public function attach( $modifier )
    {
        if ( $modifier instanceof Attribute )
        {
            $this->getAttributes()->push( $modifier );
        }
    }

    /**
     * Get the attributes
     * @return SplQueue
     */
    public function getAttributes()
    {
        if ( ! $this->attributes instanceof \Traversable )
        {
            $this->attributes = new \SplQueue;
        }

        return $this->attributes;
    }

    /**
     * Get the renderer
     * @return Renderer
     */
    public function getRenderer()
    {
        return $this->renderer;
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
        try
        {
            return $this->getRenderer()->render( $this );
        }
        catch ( \Exception $e )
        {
            trigger_error( $e->getMessage(), E_USER_ERROR );
        }
    }
}