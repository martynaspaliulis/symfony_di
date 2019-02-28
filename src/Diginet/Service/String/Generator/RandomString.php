<?php

namespace Diginet\Service\String\Generator;

use Diginet\Service\String\Converter\ConverterInterface;

class RandomString
{

    private $stringLength;
    private $converter;

    public function __construct($stringLength = 10, ConverterInterface $converter)
    {
        $this->stringLength = $stringLength;
        $this->converter = $converter;
    }

    public function generate()
    {
        return $this->converter->convert($this->generateRandomString());
    }

    public function generateRandomString(){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $this->stringLength; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}