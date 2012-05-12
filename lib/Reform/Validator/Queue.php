<?php

namespace Reform\Validator;

/**
 * Validator queue
 * 
 * @package   Reform
 * @copyright Copyright (c) 2012 Andrew Lawson <http://adlawson.com>
 * @license   New BSD License <LICENSE>
 */
class Queue extends \SplQueue
{
    /**
     * Appends the queue with a validator
     * @param Validator $validator
     */
    public function push( $validator )
    {
        return $validator instanceof Validator ? parent::push( $validator ) : null;
    }

    /**
     * Prepends the queue with a validator
     * @param Validator $validator
     */
    public function unshift( $validator )
    {
        return $validator instanceof Validator ? parent::unshift( $validator ) : null;
    }
}