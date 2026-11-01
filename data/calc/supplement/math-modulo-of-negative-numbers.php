<?php
/**
 * /math/modulo-of-negative-numbers — the dividend is a box again.
 *
 * The harvest put the boxes in the wrong places: `dividend_x` was marked as a
 * result, so the visitor had one usable field and the page could never be
 * asked a question, while one of the answers was rendered as a box to type
 * into. The equations themselves are the reference page's own and are kept —
 * only the form is rebuilt, with the two numbers as inputs and the remainders
 * as results.
 */
require_once __DIR__ . '/_builder.php';

return [
    'replaceGroups' => true,
    'hideTexts' => true,
    'groups' => [
        sup_group('supp-modulo-inputs', '', [
            sup_field(sup_num('dividend', 'Dividend — the number being divided')),
            sup_field(sup_num('divisor', 'Divisor — the number dividing it')),
        ]),
    ],
    'outputs' => [
        'remainder' => 'Remainder (Euclidean, always positive)',
        'remainder_negative_dividend' => 'Remainder with a negative dividend',
        'remainder_negative_divisor' => 'Remainder with a negative divisor',
    ],
];
