<?php

/**
 * Ideal Fish Tank Size Calculator
 * /biology/ideal-fish-tank-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Ideal Fish Tank Size Calculator',
    'meta' => ['title' => 'Ideal Fish Tank Size Calculator — Formula & Results', 'description' => 'Ideal Fish Tank Size turns Adult length of the largest fish, Number in the school and Temperament into Recommended volume and Minimum tank length.', 'h1' => 'Ideal Fish Tank Size Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'fish_length',
                            'label' => 'Adult length of the largest fish',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'school',
                            'label' => 'Number in the school',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                        [
                            'name' => 'temperament',
                            'label' => 'Temperament',
                            'type' => 'select',
                            'options' => ['Peaceful community' => '1', 'Semi-aggressive' => '1.4', 'Territorial' => '1.8'],
                            'default' => 'Peaceful community',
                        ],
                        [
                            'name' => 'min_volume',
                            'label' => 'Recommended volume',
                            'type' => 'number',
                            'suffix' => 'L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'min_length',
                            'label' => 'Minimum tank length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'min_depth',
                            'label' => 'Minimum tank depth',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gallons',
                            'label' => 'Recommended volume',
                            'type' => 'number',
                            'suffix' => 'US gal',
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
            'title' => 'Sizing',
            'results' => ['min_volume' => 'max(20,fish_length*fish_length*school*0.6*temperament/10+fish_length*school)', 'min_length' => 'max(45,fish_length*8)', 'min_depth' => 'max(30,fish_length*3)', 'gallons' => 'max(20,fish_length*fish_length*school*0.6*temperament/10+fish_length*school)/3.785'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Ideal Fish Tank Size turns Adult length of the largest fish, Number in the school and Temperament into Recommended volume and Minimum tank length. It is a single relationship that reads Recommended volume out of Adult length of the largest fish, not a table of canned results keyed by them. Units for Recommended volume default to L and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Ideal Fish Tank Size calculator works', 'html' => <<<'TXT'
            <p>The Ideal Fish Tank Size calculator applies one relationship to 3 numbers and reports Recommended volume, Minimum tank length and Minimum tank depth.</p><p>Written with the labels from the form, Recommended volume = max(20,Adult length of the largest fish × Adult length of the largest fish × Number in the school × 0.6 × Temperament ÷ 10 + Adult length of the largest fish × Number in the school).</p><p>The result panel carries Recommended volume, Minimum tank length, Minimum tank depth and Recommended volume, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Adult length of the largest fish</strong> — in cm</li><li><strong>Number in the school</strong> — a plain number, no unit</li><li><strong>Temperament</strong> — a plain number, no unit</li></ul><p>The answers come back as Recommended volume in L, Minimum tank length in cm, Minimum tank depth in cm, Recommended volume in US gal. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Adult length of the largest fish = 12 cm, Number in the school = 6 and Temperament = 1 gives &lt;strong&gt;Recommended volume&lt;/strong&gt; = 124 L, &lt;strong&gt;Minimum tank length&lt;/strong&gt; = 96 cm, &lt;strong&gt;Minimum tank depth&lt;/strong&gt; = 36 cm and &lt;strong&gt;Recommended volume&lt;/strong&gt; = 32.72 US gal.</p><ul><li><strong>Recommended volume</strong> = 124 L</li><li><strong>Minimum tank length</strong> = 96 cm</li><li><strong>Minimum tank depth</strong> = 36 cm</li><li><strong>Recommended volume</strong> = 32.72 US gal</li></ul><p>That is <strong>Recommended volume</strong> = <code>max(20,Adult length of the largest fish × Adult length of the largest fish × Number in the school × 0.6 × Temperament ÷ 10 + Adult length of the largest fish × Number in the school)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Recommended volume&lt;/strong&gt; = 124, &lt;strong&gt;Minimum tank length&lt;/strong&gt; = 96, &lt;strong&gt;Minimum tank depth&lt;/strong&gt; = 36 and &lt;strong&gt;Recommended volume&lt;/strong&gt; = 32.72 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Recommended volume takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Recommended volume</strong> = <code>max(20,Adult length of the largest fish × Adult length of the largest fish × Number in the school × 0.6 × Temperament ÷ 10 + Adult length of the largest fish × Number in the school)</code></li><li><strong>Minimum tank length</strong> = <code>max(45,Adult length of the largest fish × 8)</code></li><li><strong>Minimum tank depth</strong> = <code>max(30,Adult length of the largest fish × 3)</code></li></ul><p>Any one of Recommended volume, Minimum tank length and Minimum tank depth can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Adult length of the largest fish from 12 to 24, leaving every other box alone. The panel moves from &lt;strong&gt;Recommended volume&lt;/strong&gt; 124 L, &lt;strong&gt;Minimum tank length&lt;/strong&gt; 96 cm, &lt;strong&gt;Minimum tank depth&lt;/strong&gt; 36 cm and &lt;strong&gt;Recommended volume&lt;/strong&gt; 32.72 US gal to &lt;strong&gt;Recommended volume&lt;/strong&gt; 351 L, &lt;strong&gt;Minimum tank length&lt;/strong&gt; 192 cm, &lt;strong&gt;Minimum tank depth&lt;/strong&gt; 72 cm and &lt;strong&gt;Recommended volume&lt;/strong&gt; 92.83 US gal.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Recommended volume, Minimum tank length and Minimum tank depth are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Adult length of the largest fish and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Adult length of the largest fish, Number in the school and Temperament measured, Recommended volume and Minimum tank length wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/cell-surface-area-volume-ratio">Cell Surface Area to Volume Ratio Calculator — Formula &amp; Resul</a>, <a href="/biology/centimorgan-to-percentage">Centimorgan to Percentage Calculator</a> and <a href="/biology/centrifuge-rcf-rpm">Centrifuge RCF to RPM Converter Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Ideal Fish Tank Size calculator work out?', 'a' => <<<'TXT'
            Recommended volume, Minimum tank length, Minimum tank depth and Recommended volume, from Adult length of the largest fish, Number in the school and Temperament. The relationship is Recommended volume = max(20,Adult length of the largest fish × Adult length of the largest fish × Number in the school × 0.6 × Temperament ÷ 10 + Adult length of the largest fish × Number in the school).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Adult length of the largest fish (cm), Number in the school, Temperament. Enter fish_length, school and temperament; Recommended volume is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Recommended volume, Minimum tank length, Minimum tank depth and Recommended volume blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Recommended volume = 124 L, Minimum tank length = 96 cm, Minimum tank depth = 36 cm and Recommended volume = 32.72 US gal. Those are the defaults written into the form — move Adult length of the largest fish and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Recommended volume is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Adult length of the largest fish blank and the page solves for it, reporting Recommended volume instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Recommended volume keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/cell-surface-area-volume-ratio', 'name' => 'Cell Surface Area to Volume Ratio Calculator — Formula & Resul'],
            ['path' => '/biology/centimorgan-to-percentage', 'name' => 'Centimorgan to Percentage Calculator'],
            ['path' => '/biology/centrifuge-rcf-rpm', 'name' => 'Centrifuge RCF to RPM Converter Calculator'],
        ],
        'authors' => [],
    ],
];
