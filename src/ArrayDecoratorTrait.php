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

/**
 * Trait ArrayDecoratorTrait
 * @package NicMart\Arrayze
 */
trait ArrayDecoratorTrait
{
    /**
     * @var MapsCollection
     */
    private $collection;

    /**
     * @var mixed
     */
    private $value;

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return $this->collection->mapValue($this->value);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset)
    {
        return $this->collection->hasMap($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset)
    {
        return $this->collection->apply($offset, $this->value);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value)
    {
        throw new \LogicException("ArrayDecorator offsets are read only");
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset)
    {
        throw new \LogicException("ArrayDecorator offsets are read only");
    }
} 