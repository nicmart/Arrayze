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


trait ArrayDecoratorTrait
{
    /**
     * @var MapsCollection
     */
    private $collection;

    public function __construct(MapsCollection $collection)
    {
        $this->collection = $collection;
    }


} 