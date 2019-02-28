<?php

namespace Diginet\Service\String\Converter;

class Rot13 implements ConverterInterface
{

    public function convert($string)
    {
        return str_rot13($string);
    }
}



