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


interface ArrayAdapterInterface extends \ArrayAccess, \IteratorAggregate
{
    /**
     * Convert the object to an array
     *
     * @return array
     */
    public function toArray();
} 