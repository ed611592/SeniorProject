<?php
namespace MathPHP\Tests\Functions;

use MathPHP\Functions\Bitwise;

class BitwiseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProviderForBitwiseAdd
     * @param        int   $a
     * @param        int   $b
     * @param        array $expected
     */
    public function testBitwiseAdd(int $a, int $b, array $expected)
    {
        $results = Bitwise::add($a, $b);
        $this->assertEquals($expected, $results);
    }

    public function dataProviderForBitwiseAdd(): array
    {
        return [
            [
                1, 1, [
                    'overflow' => false,
                    'value'    => 2,
                ],
            ],
            [
                1, -1, [
                    'overflow' => true,
                    'value'    => 0,
                ],
            ],
            [
                \PHP_INT_MAX, 1, [
                    'overflow' => false,
                    'value'    => \PHP_INT_MIN,
                ],
            ],
            [
                -1, -1, [
                    'overflow' => true,
                    'value'    => -2,
                ],
            ],
            [
                \PHP_INT_MIN, \PHP_INT_MIN, [
                    'overflow' => true,
                    'value'    => 0,
                ],
            ],
            [
                \PHP_INT_MIN, \PHP_INT_MAX, [
                    'overflow' => false,
                    'value'    => -1,
                ],
            ],
            [
                0, 0, [
                    'overflow' => false,
                    'value'    => 0,
                ],
            ],

        ];
    }
}
