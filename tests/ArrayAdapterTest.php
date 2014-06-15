<?php
/**
 * This file is part of library-template
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Nicolò Martini <nicmartnic@gmail.com>
 */

namespace NicMart\Arrayze\Test;


use NicMart\Arrayze\ArrayAdapter;
use NicMart\Arrayze\MapsCollection;

class ArrayAdapterTest extends \PHPUnit_Framework_TestCase
{
    protected $collection;

    /** @var  ArrayAdapter */
    protected $arayzed;

    protected $obj = [
        "a" => "aval",
        "b" => "bval"
    ];

    public function setUp()
    {
        $this->collection = new MapsCollection;

        $this->collection
            ->registerMap("foo", function($x) { return $x["a"]; })
            ->registerMap("bar", function($x) { return $x["b"]; });

        $this->arayzed = new ArrayAdapter($this->obj, $this->collection);
    }

    public function testOffsetExists()
    {
        $this->assertTrue(isset($this->arayzed["foo"]));
        $this->assertFalse(isset($this->arayzed["baz"]));
    }

    public function testOffsetGet()
    {
        $this->assertSame("aval", $this->arayzed["foo"]);
        $this->assertSame("bval", $this->arayzed["bar"]);

        $this->setExpectedException("InvalidArgumentException");
        $this->assertSame("bval", $this->arayzed["baz"]);
    }

    /**
     * @expectedException LogicException
     */
    public function testOffsetSetThrowsAnException()
    {
        $this->arayzed["foo"] = "bar";
    }

    /**
     * @expectedException LogicException
     */
    public function testOffsetUnsetThrowsAnException()
    {
        unset($this->arayzed["foo"]);
    }

    public function testIterator()
    {
        $ary = [];

        foreach ($this->arayzed as $key => $value)
            $ary[$key] = $value;

        $this->assertSame([
            "foo" => "aval", "bar" => "bval"
        ], $ary);
    }
}
 