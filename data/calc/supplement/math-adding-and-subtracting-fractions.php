<?php
/**
 * /math/adding-and-subtracting-fractions — the radio and the arithmetic.
 *
 * The page shows an Addition/Subtraction pair of buttons and six number boxes,
 * and its script defines the working as three helpers: `get_n_operated`,
 * `get_d_operated` and `get_sign`. The harvested record kept the helpers and no
 * formula that calls them, so pressing Calculate had nothing to run and the page
 * could not answer `1/2 + 1/3` at any set of numbers.
 *
 * `operator` is the 0/1 the helpers expect (0 = addition, 1 = subtraction); it
 * is what the radio sets. The two results are the numerator and denominator of
 * the answer as the page reduces them.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideVars' => ['operator'],
    'vars' => [
        'operator' => ['type' => 'dependent'],
        'n_operated' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'd_operated' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'eq' => [
        ['formula' => 'operator = operation',
         'var' => [['l' => 'operator', 'f' => 'operation', 'r' => ['operation']]]],
        ['formula' => 'n_operated = get_n_operated(n1, d1, n2, d2, operator)',
         'var' => [['l' => 'n_operated', 'f' => 'get_n_operated(n1, d1, n2, d2, operator)',
                    'r' => ['n1', 'd1', 'n2', 'd2', 'operator']]]],
        ['formula' => 'd_operated = get_d_operated(n1, d1, n2, d2, operator)',
         'var' => [['l' => 'd_operated', 'f' => 'get_d_operated(n1, d1, n2, d2, operator)',
                    'r' => ['n1', 'd1', 'n2', 'd2', 'operator']]]],
    ],
    'outputs' => [
        'n_operated' => ['label' => 'Numerator of the result', 'precision' => '0'],
        'd_operated' => ['label' => 'Denominator of the result', 'precision' => '0'],
    ],
];
