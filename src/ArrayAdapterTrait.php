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
        foreach ($this->collection->getMaps() as $name => $map) {
            yield $name => $map($this->value, $this);
        }
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
        $map = $this->collection->getMap($offset);

        return $map($this->value, $this);
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

    /**
     * Converts the object to an array
     *
     * @return array
     */
    public function toArray()
    {
        $ary = [];

        foreach ($this as $key => $value) {
            $ary[$key] = $value;
        }

        return $ary;
    }
} 