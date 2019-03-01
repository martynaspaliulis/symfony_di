<?php

use Diginet\Service\String\Converter\Rot13;
use PHPUnit\Framework\TestCase;

class Rot13Test extends TestCase
{

    /**
     * @dataProvider providerTestConvert
     */
    public function testConvert($string, $convertedString)
    {
        $rot13 = new Rot13();
        $result = $rot13->convert($string);

        $this->assertEquals($result, $convertedString);
    }

    public function providerTestConvert()
    {
        return [
            ['diginet is cool', 'qvtvarg vf pbby'],
            ['another string to test', 'nabgure fgevat gb grfg'],
        ];
    }
}