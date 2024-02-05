<?php

declare(strict_types=1);

use Ergebnis\PhpCsFixer;

$ruleSet = PhpCsFixer\Config\RuleSet\Php74::create()->withRules(PhpCsFixer\Config\Rules::fromArray([
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
]));

$config = PhpCsFixer\Config\Factory::fromRuleSet($ruleSet);

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
