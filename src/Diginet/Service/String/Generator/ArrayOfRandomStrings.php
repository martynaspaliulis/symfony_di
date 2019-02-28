<?php

namespace Diginet\Service\String\Generator;

use Diginet\Service\String\Converter\ConverterInterface;

class ArrayOfRandomStrings
{

    private $randomStringGenerator;
    private $converter;
    private $arrayLength;

    public function __construct($arrayLength = 10, RandomString $randomStringGenerator, ConverterInterface $converter)
    {
        $this->randomStringGenerator = $randomStringGenerator;
        $this->converter = $converter;
        $this->arrayLength = $arrayLength;

    }

    public function generate()
    {
        $array = array();

        for ($i = 0; $i < $this->arrayLength; $i++) {
            $array[] = $this->converter->convert($this->randomStringGenerator->generateRandomString());
        }

        return $array;
    }
}