<?php
/**
 * /math/uses-of-modulo — the dividend is a box again.
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
            sup_field(sup_num('dividend_x', 'Dividend — the number being divided')),
            sup_field(sup_num('divisor_y', 'Divisor — the number dividing it')),
        ]),
    ],
    'outputs' => [
        'remainder_euclid' => 'Remainder (Euclidean, always positive)',
        'reaminder_negative_x' => 'Remainder with a negative dividend',
        'reaminder_negative_y' => 'Remainder with a negative divisor',
    ],
];
