<?php
/**
 * This file is part of library-template
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Nicolò Martini <nicmartnic@gmail.com>
 */

namespace NicMart\Arrayze;


class MapsCollection
{
    private $maps = [];

    /**
     * @param $name
     * @param callable $map
     *
     * @return $this
     */
    public function registerMap($name, callable $map)
    {
        $this->maps[$name] = $map;

        return $this;
    }

    /**
     * @param callable[] $maps
     *
     * @return $this
     */
    public function registerMaps(array $maps)
    {
        foreach ($maps as $name => $map) {
            $this->maps[$name] = $map;
        }

        return $this;
    }

    /**
     * @param $mapName
     *
     * @return callable
     *
     * @throws \InvalidArgumentException
     */
    public function getMap($mapName)
    {
        if (isset($this->maps[$mapName]))
            return $this->maps[$mapName];

        throw new \InvalidArgumentException("No map registered with name $mapName");
    }

    /**
     * @return callable[]
     */
    public function getMaps()
    {
        return $this->maps;
    }

    /**
     * @param string $mapName
     * @param mixed $value
     *
     * @return mixed
     */
    public function apply($mapName, $value)
    {
        $map = $this->getMap($mapName);

        return $map($value);
    }

    /**
     * @param $value
     *
     * @return \Generator
     */
    public function mapValue($value)
    {
        foreach ($this->getMaps() as $name => $map)
        {
            yield $name => $map($value);
        }
    }
} 