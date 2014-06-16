<?php
/*
 * This file is part of Arrayze.
 *
 * (c) 2013 Nicolò Martini
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace NicMart\Arrayze\Test;

use NicMart\Arrayze\MapsCollection;

/**
 * Unit tests for class FirstClass
 */
class MapsCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testRegisterAndGetMap()
    {
        $collection = new MapsCollection;

        $collection
            ->registerMap('foo', $foo = function(){ return "foo"; })
            ->registerMap('bar', $bar = function(){ return "bar"; })
        ;

        $this->assertSame($foo, $collection->getMap("foo"));

        $this->assertSame([
            'foo' => $foo,
            'bar' => $bar,
        ], $collection->getMaps());
    }

    public function testRegisterMaps()
    {
        $collection = new MapsCollection;

        $collection->registerMaps($maps = [
            'foo' => function(){ return "foo"; },
            'bar' => function(){ return "bar"; }
        ]);

        $this->assertSame($maps, $collection->getMaps());
    }

    public function testGetMap()
    {
        $collection = new MapsCollection;

        $collection->registerMap("foo", $foo = function($x){ return "foo" . $x; });

        $this->assertSame($foo, $collection->getMap("foo"));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetThrowsInvalidArgumentException()
    {
        $collection = new MapsCollection;

        $collection->getMap("foo");
    }

    public function testApply()
    {
        $collection = new MapsCollection;

        $collection->registerMap("foo", function($x, $y){ return "foo" . $x . $y; });

        $this->assertSame("foobarbaz", $collection->apply("foo", "bar", "baz"));
    }

    public function testMapValue()
    {
        $collection = new MapsCollection;

        $collection->registerMaps($maps = [
            'foo' => function(){ return "fooval"; },
            'bar' => function(){ return "barval"; }
        ]);

        $ary = [];

        foreach ($collection->map("") as $key => $value)
            $ary[$key] = $value;

        $this->assertSame([
            "foo" => "fooval", "bar" => "barval"
        ], $ary);
    }
}