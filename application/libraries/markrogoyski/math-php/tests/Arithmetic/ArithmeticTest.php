<?php
namespace MathPHP\Tests\Arithmetic;

use MathPHP\Arithmetic;

class ArithmeticTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @testCase     cubeRoot returns the expected value.
     * @dataProvider dataProviderForCubeRoot
     * @param  number $x
     * @param  number $cube_root
     */
    public function testCubeRoot($x, $cube_root)
    {
        $this->assertEquals($cube_root, Arithmetic::cubeRoot($x), '', 0.000000001);
    }

    /**
     * @return array
     */
    public function dataProviderForCubeRoot(): array
    {
        return [
            [0, 0],
            [1, 1],
            [-1, -1],
            [2, 1.259921049894873],
            [-2, -1.259921049894873],
            [3, 1.442249570307408],
            [-3, -1.442249570307408],
            [8, 2],
            [-8, -2],
            [27, 3],
            [-27, -3],
            [64, 4],
            [-64, -4],
            [125, 5],
            [-125, -5],
            [245.362, 6.260405067916984],
            [-245.362, -6.260405067916984],
            [0.0548, 0.379833722265818],
            [-0.0548, -0.379833722265818],
        ];
    }

    /**
     * @testCase     digitSum returns the expected sum of digits
     * @dataProvider dataProviderForDigitSum
     * @param        int $x
     * @param        int $b
     * @param        int $expected
     */
    public function testDigitSum(int $x, int $b, int $expected)
    {
        $this->assertEquals($expected, Arithmetic::digitSum($x, $b));
    }

    public function dataProviderForDigitSum(): array
    {
        return [
            // Base 10
            [0, 10, 0],
            [1, 10, 1],
            [2, 10, 2],
            [3, 10, 3],
            [4, 10, 4],
            [5, 10, 5],
            [6, 10, 6],
            [7, 10, 7],
            [8, 10, 8],
            [9, 10, 9],
            [10, 10, 1],
            [11, 10, 2],
            [12, 10, 3],
            [13, 10, 4],
            [14, 10, 5],
            [15, 10, 6],
            [16, 10, 7],
            [17, 10, 8],
            [18, 10, 9],
            [19, 10, 10],
            [20, 10, 2],
            [21, 10, 3],
            [22, 10, 4],
            [23, 10, 5],
            [24, 10, 6],
            [25, 10, 7],
            [26, 10, 8],
            [27, 10, 9],
            [28, 10, 10],
            [29, 10, 11],
            [30, 10, 3],
            [31, 10, 4],
            [32, 10, 5],
            [33, 10, 6],
            [34, 10, 7],
            [111, 10, 3],
            [222, 10, 6],
            [123, 10, 6],
            [999, 10, 27],
            [152, 10, 8],
            [84001, 10, 13],
            [18, 10, 9],
            [27, 10, 9],
            [36, 10, 9],
            [45, 10, 9],
            [54, 10, 9],
            [63, 10, 9],
            [72, 10, 9],
            [81, 10, 9],
            [90, 10, 9],
            [99, 10, 18],
            // Base 2
            [0b0, 2, 0],
            [0b1, 2, 1],
            [0b10, 2, 1],
            [0b11, 2, 2],
            [0b100, 2, 1],
            [0b101, 2, 2],
            [0b110, 2, 2],
            [0b111, 2, 3],
            [0b1000, 2, 1],
            [0b1001, 2, 2],
            [0b1010, 2, 2],
            [0b1011, 2, 3],
            [0b1100, 2, 2],
            [0b1101, 2, 3],
            [0b111, 2, 3],
        ];
    }

    /**
     * @testCase     digitalRoot returns the expected root
     * @dataProvider dataProviderForDigitalRoot
     * @param        int $x
     * @param        int $expected_root
     */
    public function testDigitalRoot(int $x, int $expected_root)
    {
        $this->assertEquals($expected_root, Arithmetic::digitalRoot($x));
    }

    public function dataProviderForDigitalRoot(): array
    {
        return [
            [0, 0],
            [1, 1],
            [2, 2],
            [3, 3],
            [4, 4],
            [5, 5],
            [6, 6],
            [7, 7],
            [8, 8],
            [9, 9],
            [10, 1],
            [11, 2],
            [12, 3],
            [13, 4],
            [14, 5],
            [15, 6],
            [16, 7],
            [17, 8],
            [18, 9],
            [19, 1],
            [20, 2],
            [21, 3],
            [22, 4],
            [23, 5],
            [24, 6],
            [25, 7],
            [26, 8],
            [27, 9],
            [28, 1],
            [29, 2],
            [30, 3],
            [31, 4],
            [32, 5],
            [33, 6],
            [34, 7],
            [111, 3],
            [222, 6],
            [123, 6],
            [999, 9],
            [152, 8],
            [84001, 4],
            [65536, 7],
            [18, 9],
            [27, 9],
            [36, 9],
            [45, 9],
            [54, 9],
            [63, 9],
            [72, 9],
            [81, 9],
            [90, 9],
            [99, 9],
            [108, 9],
        ];
    }
}
