<?php

namespace Diginet\Service\String\Converter;

class LettersToNumbers implements ConverterInterface
{

    public function convert($string)
    {

        $alphabet = range('a', 'z');

        return preg_replace_callback(
            '|[a-z]|',
            function ($matches) use ($alphabet) {
                return '/' . (array_keys($alphabet, $matches[0])[0] + 1);
            },
            $string
        );

    }
}



