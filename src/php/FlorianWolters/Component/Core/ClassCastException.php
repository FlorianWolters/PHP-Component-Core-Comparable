<?php
namespace FlorianWolters\Component\Core;

use \RuntimeException;

/**
 * Thrown to indicate that the code has attempted to cast an object to a
 * subclass of which it is not an instance.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2011-2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Comparable
 * @since     Class available since Release 0.2.0
 */
class ClassCastException extends RuntimeException
{
}
