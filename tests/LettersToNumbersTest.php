<?php

use Diginet\Service\String\Converter\LettersToNumbers;
use PHPUnit\Framework\TestCase;


class LettersToNumbersTest extends TestCase
{

    /**
     * @dataProvider providerTestConvert
     */
    public function testConvert($string, $convertedString)
    {
        $lettersToNumbers = new LettersToNumbers();
        $result = $lettersToNumbers->convert($string);

        $this->assertEquals($result, $convertedString);
    }

    public function providerTestConvert()
    {
        return [
            ['22abcdx', '22/1/2/3/4/24'],
            ['66labas', '66/12/1/2/1/19'],
        ];
    }
}