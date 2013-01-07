<?php
namespace FlorianWolters\Component\Core;

use FlorianWolters\Mock\ComparableImplMock;

/**
 * Test class for {@link ComparableUtils}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-Component-Core-Comparable
 * @since     Class available since Release 0.1.0
 *
 * @covers FlorianWolters\Component\Core\ComparableUtils
 */
class ComparableUtilsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    public static function providerCompare()
    {
        $objWithNullValue = new ComparableImplMock;
        $firstObjWithValue = new ComparableImplMock(13);
        $secondObjWithValue = new ComparableImplMock(42);

        return [
            // First is equal to second.
            [ComparableUtils::EQUAL, null, null],
            [ComparableUtils::EQUAL, $objWithNullValue, $objWithNullValue],
            [ComparableUtils::EQUAL, $firstObjWithValue, $firstObjWithValue],
            // First is less than second.
            [ComparableUtils::FIRST_LT_SECOND, null, $objWithNullValue],
            [
                ComparableUtils::FIRST_LT_SECOND,
                $objWithNullValue,
                $firstObjWithValue
            ], [
                ComparableUtils::FIRST_LT_SECOND,
                $firstObjWithValue,
                $secondObjWithValue
            ],
            // First is greater than second.
            [ComparableUtils::FIRST_GT_SECOND, $objWithNullValue, null],
            [
                ComparableUtils::FIRST_GT_SECOND,
                $firstObjWithValue,
                $objWithNullValue
            ], [
                ComparableUtils::FIRST_GT_SECOND,
                $secondObjWithValue,
                $firstObjWithValue
            ]
        ];
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
