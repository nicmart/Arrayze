<?php
/**
 * This file is part of Arrayze
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Nicolò Martini <nicmartnic@gmail.com>
 */

namespace NicMart\Arrayze;

class ArrayDecorator implements \ArrayAccess, \IteratorAggregate
{
    use ArrayDecoratorTrait;

    /**
     * @param mixed             $value
     * @param MapsCollection    $collection
     */
    public function __construct($value, MapsCollection $collection)
    {
        $this->collection = $collection;
        $this->value = $value;
    }
}