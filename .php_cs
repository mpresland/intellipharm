<?php

// https://mlocati.github.io/php-cs-fixer-configurator/

// interfaces are forcing blank lines between methods

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2'                        => true,
        'array_syntax'                 => ['syntax' => 'short'],
        'blank_line_after_opening_tag' => true,

        'binary_operator_spaces' => [
            'default'   => 'single_space',
            'operators' => [
                '='  => 'align_single_space_minimal',
                '=>' => 'align_single_space_minimal',
            ],
        ],

        // 'binary_operator_spaces' => [
        //     // 'align_double_arrow' => true,
        //     // 'align_equals'       => true,
        //     // '+'            => ['single_space'],
        // ],

        'blank_line_before_statement' => ['statements' => ['return']],
        'cast_spaces'                 => ['space' => 'single'],
        'concat_space'                => ['spacing' => 'none'],
        // 'declare_equal_normalize'     => ['space' => 'single'],
        'lowercase_cast'         => true,
        'method_separation'      => true,
        'native_function_casing' => true,
        // 'new_with_braces'             => false,
        'no_extra_consecutive_blank_lines' => true,
        'no_leading_import_slash'          => true,
        // 'no_leading_namespace_whitespace'  => true,
        'no_spaces_around_offset'               => ['positions' => ['inside', 'outside']],
        'no_trailing_comma_in_singleline_array' => true,
        // 'no_unneeded_control_parentheses'       => true,
        'no_unneeded_curly_braces'              => true,
        'no_unused_imports'                     => true,
        'no_useless_else'                       => true,
        'no_useless_return'                     => true,
        'no_whitespace_before_comma_in_array'   => true,
        'no_whitespace_in_blank_line'           => true,
        // 'not_operator_with_space'               => true,
        // 'not_operator_with_successor_space'     => true,
        'object_operator_without_whitespace'  => true,
		'return_type_declaration' => ['space_before' => 'none'],
        'ordered_imports'                     => ['sortAlgorithm' => 'alpha'],
        'phpdoc_add_missing_param_annotation' => ['only_untyped' => false],
        'phpdoc_align'                        => ['tags' => ['param']],
        // 'phpdoc_types_order' => ...
        'phpdoc_no_empty_return'                     => true,
        'phpdoc_order'                               => true,
        'phpdoc_scalar'                              => true,
        'phpdoc_separation'                          => true,
        'phpdoc_single_line_var_spacing'             => true,
        'phpdoc_trim'                                => true,
        'phpdoc_types'                               => true,
        'phpdoc_var_without_name'                    => true,
        'phpdoc_indent'                              => true,
        'phpdoc_summary'                             => true,
        'short_scalar_cast'                          => true,
        // 'simplified_null_return'                     => true,
        'single_blank_line_before_namespace'         => true,
        'single_quote'                               => true,
        'standardize_not_equals'                     => true,
        'ternary_operator_spaces'                    => true,
        'trailing_comma_in_multiline_array'          => true,
        'trim_array_spaces'                          => true,
        'unary_operator_spaces'                      => true,
        'whitespace_after_comma_in_array'            => true,
        'no_singleline_whitespace_before_semicolons' => true,
        'no_multiline_whitespace_before_semicolons'  => true,
    ])
    ->setLineEnding("\n");
