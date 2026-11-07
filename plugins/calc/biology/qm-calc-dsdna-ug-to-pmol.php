<?php

/**
 * dsDNA µg to pmol Calculator
 * /biology/dsdna-ug-to-pmol
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'dsDNA µg to pmol Calculator',
    'meta' => ['title' => 'dsDNA µg to pmol Calculator — Formula & Results', 'description' => <<<'TXT'
    Units for Amount default to pmol and can be changed on the answer itself. The length of the dsDNA moleculeMass — in µg. It is a single relationship that reads…
    TXT, 'h1' => 'dsDNA µg to pmol Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'Fragment length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'help' => 'The length of the dsDNA molecule',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'mass_ug',
                            'label' => 'Mass',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'help' => 'Leave the other box blank to solve from it instead',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'pmol',
                            'label' => 'Amount',
                            'type' => 'number',
                            'suffix' => 'pmol',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'molecules',
                            'label' => 'Number of molecules',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ng',
                            'label' => 'Mass',
                            'type' => 'number',
                            'suffix' => 'ng',
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
            'title' => 'Convert',
            'results' => ['pmol' => 'mass_ug*1000000/(660*length)', 'mass_ug' => 'pmol*660*length/1000000', 'ng' => 'mass_ug*1000', 'molecules' => 'mass_ug*912445569696970/length'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        dsDNA µg to pmol takes Fragment length and Mass and returns Amount and Number of molecules. It is a single relationship that reads Amount out of Fragment length, not a table of canned results keyed by them. Units for Amount default to pmol and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the dsDNA µg to pmol calculator works', 'html' => <<<'TXT'
            <p>dsDNA µg to pmol answers one question from 2 numbers, and the answer is Amount, Number of molecules and Mass.</p><p>Written with the labels from the form, Amount = Mass × 1000000 ÷ (660 × Fragment length).</p><p>The answers are Amount, Number of molecules and Mass; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Fragment length</strong> — in bp. The length of the dsDNA molecule</li><li><strong>Mass</strong> — in µg. Leave the other box blank to solve from it instead</li></ul><p>What you get back is Amount in pmol, Number of molecules, Mass in ng, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>None of the boxes on this page carries a unit chip: Amount takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Amount</strong> = <code>Mass × 1000000 ÷ (660 × Fragment length)</code></li><li><strong>Mass</strong> = <code>Amount × 660 × Fragment length ÷ 1000000</code></li><li><strong>Number of molecules</strong> = <code>Mass × 912445569696970 ÷ Fragment length</code></li></ul><p>Any one of Amount, Mass and Mass can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Amount, Number of molecules and Mass are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Fragment length is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Fragment length and Mass is what you already know and Amount and Number of molecules is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/how-big-will-my-cat-get">How big will my cat get Calculator</a>, <a href="/biology/huglin-index">Huglin Index Calculator</a> and <a href="/biology/hunting-tooth-ratio">Hunting Tooth Ratio Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the dsDNA µg to pmol calculator work out?', 'a' => 'Amount, Number of molecules and Mass, from Mass and Fragment length. The relationship is Amount = Mass × 1000000 ÷ (660 × Fragment length).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Fragment length (bp), Mass (µg). With length and mass_ug in place, Amount can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Amount, Mass, Mass and Number of molecules blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Amount is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Fragment length blank and the page solves for it, reporting Amount instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Amount keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/how-big-will-my-cat-get', 'name' => 'How big will my cat get Calculator'],
            ['path' => '/biology/huglin-index', 'name' => 'Huglin Index Calculator'],
            ['path' => '/biology/hunting-tooth-ratio', 'name' => 'Hunting Tooth Ratio Calculator'],
        ],
        'authors' => [],
    ],
];
