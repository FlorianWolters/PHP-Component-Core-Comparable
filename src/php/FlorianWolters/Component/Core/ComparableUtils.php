<?php
namespace FlorianWolters\Component\Core;

/**
 * The static class {@see ComparableUtils} offers comparison operations that
 * impose a *total ordering* on objects.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-Equality
 * @since     Class available since Release 0.1.0
 */
class ComparableUtils
{
    /**
     * Value if the first object is less than the second object.
     *
     * @var integer
     */
    const FIRST_LT_SECOND = -1;

    /**
     * Value if the first object is equal to the second object.
     *
     * @var integer
     */
    const EQUAL = 0;

    /**
     * Value if the first object is greater than the second object.
     *
     * @var integer
     */
    const FIRST_GT_SECOND = 1;

    // @codeCoverageIgnoreStart

    /**
     * {@see ComparableUtils} instances can **NOT** be constructed in standard
     * programming.
     *
     * Instead, the class should be used as:
     * /---code php
     * ComparableUtils::compare($firstObject, $secondObject);
     * \---
     */
    private function __construct()
    {
    }

    // @codeCoverageIgnoreEnd

    /**
     * Compares an object with another object for order.
     *
     * Returns a negative integer, zero, or a positive integer as the first
     * object is less than, equal to, or greater than the second object.
     *
     * The comparison of the objects is `null`-safe.
     *
     * @param ComparableInterface|null $first       The first object to compare.
     *                                              May be `null`.
     * @param ComparableInterface|null $second      The second object to
     *                                              compare. May be `null`.
     * @param boolean                  $nullGreater If `true` `null` is
     *                                              considered greater than a
     *                                              non-`null` value or if
     *                                              `false` `null` is considered
     *                                              less than a non-`null`
     *                                              value.
     *
     * @return integer A negative integer, zero, or a positive integer as the
     *                 first object is less than, equal to, or greater than the
     *                 second object.
     * @see ComparableInterface::compareTo
     */
    public static function compare(
        ComparableInterface $first = null,
        ComparableInterface $second = null,
        $nullGreater = false
    ) {
        if ($first === $second) {
            return self::EQUAL;
        } elseif (null === $first) {
            return $nullGreater
                ? self::FIRST_GT_SECOND
                : self::FIRST_LT_SECOND;
        } elseif (null === $second) {
            return $nullGreater
                ? self::FIRST_LT_SECOND
                : self::FIRST_GT_SECOND;
        }

        return $first->compareTo($second);
    }
}
