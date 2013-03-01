<?php
namespace FlorianWolters\Component\Core;

use FlorianWolters\Mock\ComparableImpl;

/**
 * Test class for {@see ComparableUtils}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-Comparable
 * @since     Class available since Release 0.1.0
 *
 * @covers    FlorianWolters\Component\Core\ComparableUtils
 */
class ComparableUtilsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    public static function providerCompare()
    {
        $objWithNullValue = new ComparableImpl;
        $firstObjWithValue = new ComparableImpl(13);
        $secondObjWithValue = new ComparableImpl(42);

        return array( // First is equal to second.
            array(ComparableUtils::EQUAL, null, null),
            array(ComparableUtils::EQUAL, $objWithNullValue, $objWithNullValue),
            array(
                ComparableUtils::EQUAL,
                $firstObjWithValue,
                $firstObjWithValue
            ), // First is less than second.
            array(ComparableUtils::FIRST_LT_SECOND, null, $objWithNullValue),
            array(
                ComparableUtils::FIRST_LT_SECOND,
                $objWithNullValue,
                $firstObjWithValue
            ), array(
                ComparableUtils::FIRST_LT_SECOND,
                $firstObjWithValue,
                $secondObjWithValue
            ),
            // First is greater than second.
            array(ComparableUtils::FIRST_GT_SECOND, $objWithNullValue, null),
            array(
                ComparableUtils::FIRST_GT_SECOND,
                $firstObjWithValue,
                $objWithNullValue
            ), array(
                ComparableUtils::FIRST_GT_SECOND,
                $secondObjWithValue,
                $firstObjWithValue
            )
        );
    }

    /**
     * @param integer                  $expected
     * @param ComparableInterface|null $first
     * @param ComparableInterface|null $second
     *
     * @return void
     *
     * @coversDefaultClass compare
     * @dataProvider providerCompare
     * @test
     */
    public function testCompare(
        $expected,
        ComparableInterface $first = null,
        ComparableInterface $second = null
    ) {
        $actual = ComparableUtils::compare($first, $second);

        $this->assertEquals($expected, $actual);
    }
}
