<?php

/**
 * Medullary Index Calculator
 * /biology/medullary-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Medullary Index Calculator',
    'meta' => ['title' => 'Medullary Index Calculator — Formula & Results', 'description' => 'Medullary Index takes Medulla diameter and Hair shaft diameter and returns Medullary index and Medullary index. It is a single relationship that reads…', 'h1' => 'Medullary Index Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'medulla',
                            'label' => 'Medulla diameter',
                            'type' => 'number',
                            'suffix' => 'µm',
                            'help' => 'Width of the central medulla',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                        [
                            'name' => 'shaft',
                            'label' => 'Hair shaft diameter',
                            'type' => 'number',
                            'suffix' => 'µm',
                            'help' => 'Total width of the hair, cuticle to cuticle',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '70',
                        ],
                        [
                            'name' => 'index',
                            'label' => 'Medullary index',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'index_pct',
                            'label' => 'Medullary index',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Medullary index',
            'results' => ['index' => 'medulla/shaft', 'index_pct' => 'medulla/shaft*100', 'medulla' => 'index*shaft', 'shaft' => 'medulla/index'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Medullary Index takes Medulla diameter and Hair shaft diameter and returns Medullary index and Medullary index. It is a single relationship that reads Medullary index out of Medulla diameter, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Medullary Index calculator works', 'html' => <<<'TXT'
            <p>Medullary Index answers one question from 2 numbers, and the answer is Medullary index and Medullary index.</p><p>Written with the labels from the form, Medullary index = Medulla diameter ÷ Hair shaft diameter.</p><p>The result panel carries Medullary index and Medullary index, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Medulla diameter</strong> — in µm. Width of the central medulla</li><li><strong>Hair shaft diameter</strong> — in µm. Total width of the hair, cuticle to cuticle</li></ul><p>The result boxes are Medullary index, Medullary index in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Medullary index takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Medullary index</strong> = <code>Medulla diameter ÷ Hair shaft diameter</code></li><li><strong>Medulla diameter</strong> = <code>Medullary index × Hair shaft diameter</code></li><li><strong>Hair shaft diameter</strong> = <code>Medulla diameter ÷ Medullary index</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Medullary index, Medullary index and Medulla diameter can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Medullary index and Medullary index are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Medulla diameter and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Medulla diameter and Hair shaft diameter and the number you are missing is Medullary index and Medullary index.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/dog-harness-size">Dog harness size</a>, <a href="/biology/dog-heat-cycle">Dog heat cycle</a> and <a href="/biology/dog-life-expectancy">Dog life expectancy Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Medullary Index calculator work out?', 'a' => <<<'TXT'
            Medullary index and Medullary index, from Medulla diameter and Hair shaft diameter. The relationship is Medullary index = Medulla diameter ÷ Hair shaft diameter.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Medulla diameter (µm), Hair shaft diameter (µm). With medulla and shaft in place, Medullary index can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Medullary index, Medullary index, Medulla diameter and Hair shaft diameter can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Medullary index is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Medulla diameter left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Medullary index keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dog-harness-size', 'name' => 'Dog harness size'],
            ['path' => '/biology/dog-heat-cycle', 'name' => 'Dog heat cycle'],
            ['path' => '/biology/dog-life-expectancy', 'name' => 'Dog life expectancy Calculator'],
        ],
        'authors' => [],
    ],
];
