<?php

require 'vendor/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;

$containerBuilder = new ContainerBuilder();

$loader = new PhpFileLoader($containerBuilder, new FileLocator(__DIR__));
$loader->load('services.php');

// randomise generators
$generators = [
    'array_of_random_strings',
    'random_string',
];

for ($i = 0; $i < 50; $i++) {

    // get random generator, Generate and Convert
    $randomGeneratorIndex = array_rand($generators);
    $generator = $containerBuilder->get($generators[$randomGeneratorIndex]);
    $result = $generator->generate();

    print_r($result);
    echo "\n";
    echo "\n";
}


