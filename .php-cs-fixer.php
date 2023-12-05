<?php

declare(strict_types=1);

use Ergebnis\PhpCsFixer;

$config = PhpCsFixer\Config\Factory::fromRuleSet(new PhpCsFixer\Config\RuleSet\Php80(), [
    'binary_operator_spaces' => [
        'operators' => [
            '=' => 'align',
        ],
    ],
    'declare_strict_types' => false,
    'final_class' => false,
    'header_comment' => false,
    'phpdoc_no_package' => false,
    'phpdoc_separation' => false,
    'phpdoc_summary' => false,
]);

$config->getFinder()
    ->exclude([
        '.build/',
        '.github/',
        '.note/',
    ])
    ->ignoreDotFiles(false)
    ->in(__DIR__)
    ->name('.php-cs-fixer.php');

$config->setCacheFile(__DIR__ . '/.build/php-cs-fixer/.php-cs-fixer.cache');

return $config;
