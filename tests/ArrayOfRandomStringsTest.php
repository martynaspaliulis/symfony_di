<?php

use Diginet\Service\String\Converter\ConverterInterface;
use Diginet\Service\String\Generator\ArrayOfRandomStrings;
use Diginet\Service\String\Generator\RandomString;
use PHPUnit\Framework\TestCase;

class ArrayOfRandomStringsTest extends TestCase
{

    public function testArrayOfRandomStrings()
    {
        $converter = $this->createMock(ConverterInterface::class);
        $converter->method('convert')
            ->willReturn($this->returnArgument(0)); // converter returns tha same value

        $randomStringGenerator = $this->createMock(RandomString::class);
        $randomStringGenerator->method('generate')
            ->willReturn('123456'); // generator will return the same value every time

        $arrayOfRandomStrings = new ArrayOfRandomStrings(12, $randomStringGenerator, $converter);
        $array = $arrayOfRandomStrings->generate();
        
        $this->assertTrue(is_array($array));
        $this->assertCount(12, $array); // test number of array elements
    }
}