<?php

$containerBuilder->setParameter('random_string.length', 12);
$containerBuilder->setParameter('array_of_random_strings.length', 12);


// Register Converters
$containerBuilder->register('letters_to_numbers', '\Diginet\Service\String\Converter\LettersToNumbers');
$containerBuilder->register('rot12', '\Diginet\Service\String\Converter\Rot13');

$containerBuilder->setParameter('random_string.converter', $containerBuilder->get('letters_to_numbers'));
$containerBuilder->setParameter('array_of_random_strings.converter', $containerBuilder->get('rot12'));

// Register Random string generator
$containerBuilder->register('random_string', '\Diginet\Service\String\Generator\RandomString')
    ->addArgument('%random_string.length%')
    ->addArgument('%random_string.converter%');

// Register Array of random strings generator
$containerBuilder->register('array_of_random_strings', '\Diginet\Service\String\Generator\ArrayOfRandomStrings')
    ->addArgument('%array_of_random_strings.length%')
    ->addArgument($containerBuilder->get('random_string'))
    ->addArgument('%array_of_random_strings.converter%');