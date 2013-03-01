<?php
namespace FlorianWolters\Component\Core;

/**
 * The interface {@see ComparableInterface} imposes a *total ordering* on the
 * objects of each class that implements it.
 *
 * This ordering is referred to as the class's *natural ordering*, and the
 * class's {@see compareTo} method is referred to as its *natural comparison
 * method*.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2011-2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Comparable
 * @since     Interface available since Release 0.1.0
 */
interface ComparableInterface
{
    /**
     * Compares this object with the specified object for order.
     *
     * Returns a negative integer, zero, or a positive integer as this object is
     * less than, equal to, or greater than the specified object.
     *
     * @param ComparableInterface $other The object to compare with this object.
     *
     * @return integer A negative integer, zero, or a positive integer as this
     *                 object is less than, equal to, or greater than the
     *                 specified object.
     */
    public function compareTo(self $other);
}
