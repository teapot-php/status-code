<?php

declare(strict_types=1);

/**
 * Copyright (c) 2017-2023 Andreas Möller.
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/php-package-template
 */

use Ergebnis\PhpCsFixer;

$config = PhpCsFixer\Config\Factory::fromRuleSet(new PhpCsFixer\Config\RuleSet\Php80(), [
    'align_multiline_comment' => false,
    'binary_operator_spaces' => false,
    'class_attributes_separation' => false,
    'declare_strict_types' => false,
    'final_class' => false,
    'header_comment' => false,
    'no_blank_lines_after_class_opening' => false,
    'no_blank_lines_after_phpdoc' => false,
    'no_extra_blank_lines' => false,
    'ordered_interfaces' => false,
    'phpdoc_align' => false,
    'phpdoc_indent' => false,
    'phpdoc_no_alias_tag' => false,
    'phpdoc_no_package' => false,
    'phpdoc_separation' => false,
    'phpdoc_summary' => false,
    'phpdoc_trim_consecutive_blank_line_separation' => false,
    'single_blank_line_before_namespace' => false,
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
