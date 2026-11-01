<?php
/**
 * /conversion/tsp-to-grams — the density index behind the ingredient pickers, pinned.
 *
 * The harvest keeps the reference site's ingredient drop-downs and the integer
 * index (`more`) its own UI writes into them. Rendered here they are controls
 * that change nothing: the formula reads the index, the index is 30, and the
 * four density boxes it might have pointed at are empty. Worse, a row of
 * drop-downs that does nothing is exactly the meaningless form furniture the
 * brief asks to be rid of.
 *
 * The index is pinned to 0, which makes `get_density` return the density the
 * visitor types, and every control that cannot affect the answer is hidden.
 * What is left — density, and the two quantities — is the conversion the page
 * promises, and it works.
 */
require_once __DIR__ . '/_builder.php';

return [
    'vars' => [
        'more' => ['type' => 'dependent', 'defaults' => [['value' => '0']]],
    ],
    'hideVars' => ['more', 'd2', 'd3', 'd4', 'd5', 'flour', 'ingredients', 'nuts', 'oil', 'sugar'],
    'hideTexts' => true,
];
