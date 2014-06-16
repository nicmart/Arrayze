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
 * Trait ArrayAdapterTrait
 * @package NicMart\Arrayze
 */
trait ArrayAdapterTrait
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
        return $this->collection->map($this->value, $this);
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
        return $this->collection->apply($offset, $this->value, $this);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value)
    {
        throw new \LogicException("ArrayAdapter offsets are read only");
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset)
    {
        throw new \LogicException("ArrayAdapter offsets are read only");
    }
} 