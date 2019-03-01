<?php

use Diginet\Service\String\Converter\ConverterInterface;
use Diginet\Service\String\Generator\RandomString;
use PHPUnit\Framework\TestCase;

class RandomStringTest extends TestCase
{

    public function testGenerateRandomString()
    {
        $converter = $this->createMock(ConverterInterface::class);
        $converter->method('convert')
            ->willReturn($this->returnArgument(0)); // converter returns the same value

        $randomString = new RandomString(12, $converter);
        $result1 = $randomString->generateRandomString();
        $result2 = $randomString->generateRandomString();

        $this->assertEquals(12, strlen($result1)); // test string length
        $this->assertEquals(12, strlen($result2)); // test string length
        $this->assertNotEquals($result1, $result2); // strings are not the same
    }

    public function testGenerate()
    {
        $converter = $this->createMock(ConverterInterface::class);
        $converter->method('convert')
            ->willReturn('123456'); // converter returns the same value

        $randomString = new RandomString(12, $converter);
        $result1 = $randomString->generate();

        $this->assertEquals('123456', $result1);
    }
}