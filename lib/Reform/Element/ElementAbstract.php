<?php

namespace Reform\Element;

use Reform\Attribute,
    Reform\Attribute\Attributable,
    Reform\Renderer\Renderer,
    Reform\Renderer\Renderable,
    Reform\Validator,
    Reform\Validator\Validatable,
    Reform\Validator\ValidationException;

/**
 * Element
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 */
abstract class ElementAbstract implements Attributable, Element, Renderable, Validatable
{
    /**
     * Atrribute names
     * @const string
     */
    const ATTRIBUTE_NAME  = 'name';
    const ATTRIBUTE_VALUE = 'value';

    /**
     * The attributes
     * @var Attribute\Queue
     */
    protected $attributes;

    /**
     * The validators
     * @var Validator\Queue
     */
    protected $validators;

    /**
     * The validation exception
     * @var ValidationException
     */
    protected $exception;

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
        if ( $modifier instanceof Attribute\Attribute )
        {
            $this->getAttributes()->push( $modifier );
        }

        if ( $modifier instanceof Validator\Validator )
        {
            $this->getValidators()->push( $modifier );
        }
    }

    /**
     * Get the attributes
     * @return Attribute\Queue
     */
    public function getAttributes()
    {
        if ( ! $this->attributes instanceof \Traversable )
        {
            $this->attributes = new Attribute\Queue;
        }

        return $this->attributes;
    }

    /**
     * Get the validators
     * @return Validator\Queue
     */
    public function getValidators()
    {
        if ( ! $this->validators instanceof \Traversable )
        {
            $this->validators = new Validator\Queue;
        }

        return $this->validators;
    }

    /**
     * Get the validation message
     * @return string
     */
    public function getMessage()
    {
        return $this->exception instanceof ValidationException ? $this->exception->getMessage() : null;
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
     * Validate the element
     * @return boolean
     */
    public function isValid()
    {
        try
        {
            $this->getValidators()->validate( $this );
            $this->exception = null;
        }
        catch ( ValidationException $e )
        {
            $this->exception = $e;

            return false;
        }

        return true;
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