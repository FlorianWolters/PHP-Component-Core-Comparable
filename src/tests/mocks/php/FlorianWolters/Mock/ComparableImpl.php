<?php
namespace FlorianWolters\Mock;

use FlorianWolters\Component\Core\ComparableInterface;

/**
 * The class {@see ComparableImpl} demonstrates the usage of the interface {@see
 * ComparableInterface}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-Comparable
 * @since     Class available since Release 0.1.0
 */
class ComparableImpl implements ComparableInterface
{
    /**
     * The value of this object.
     *
     * @var mixed
     */
    private $value;

    /**
     * Constructs a new object with the specified value.
     *
     * @param mixed $value The value.
     */
    public function __construct($value = null)
    {
        $this->value = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function compareTo(ComparableInterface $other)
    {
        return ($this->value > $other->value)
            ? 1
            : -1;
    }
}
