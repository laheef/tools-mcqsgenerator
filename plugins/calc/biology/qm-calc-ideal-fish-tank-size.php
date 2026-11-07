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
    'meta' => ['title' => 'Ideal Fish Tank Size Calculator: Steps & Units', 'description' => 'Ideal Fish Tank Size Calculator turns adult length of the largest fish, number in the school and temperament into recommended volume and minimum tank length.', 'h1' => 'Ideal Fish Tank Size Calculator', 'updated' => '2026-10-29'],
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
        Ideal Fish Tank Size turns Adult length of the largest fish, Number in the school and Temperament into Recommended volume and Minimum tank length. It is a single relationship that reads recommended volume out of adult length of the largest fish, not a table of canned results keyed by them. Units for Recommended volume default to L and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Ideal Fish Tank Size calculator works', 'html' => <<<'TXT'
            <p>The Ideal Fish Tank Size calculator applies one relationship to 3 numbers and reports Recommended volume, Minimum tank length and Minimum tank depth.</p><p>Written with the labels from the form, Recommended volume = max(20,Adult length of the largest fish × Adult length of the largest fish × Number in the school × 0.6 × Temperament ÷ 10 + Adult length of the largest fish × Number in the school).</p><p>The result panel carries Recommended volume, Minimum tank length, Minimum tank depth and Recommended volume, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Adult length of the largest fish</strong> — in cm</li><li><strong>Number in the school</strong> — a plain number, no unit</li><li><strong>Temperament</strong> — a plain number, no unit</li></ul><p>The answers come back as Recommended volume in L, Minimum tank length in cm, Minimum tank depth in cm, Recommended volume in US gal. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Adult length of the largest fish = 12 cm, Number in the school = 6 and Temperament = 1 gives <strong>Recommended volume</strong> = 124 L, <strong>Minimum tank length</strong> = 96 cm, <strong>Minimum tank depth</strong> = 36 cm and <strong>Recommended volume</strong> = 32.72 US gal.</p><ul><li><strong>Recommended volume</strong> = 124 L</li><li><strong>Minimum tank length</strong> = 96 cm</li><li><strong>Minimum tank depth</strong> = 36 cm</li><li><strong>Recommended volume</strong> = 32.72 US gal</li></ul><p>That is <strong>Recommended volume</strong> = <code>max(20,Adult length of the largest fish × Adult length of the largest fish × Number in the school × 0.6 × Temperament ÷ 10 + Adult length of the largest fish × Number in the school)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Recommended volume</strong> = 124, <strong>Minimum tank length</strong> = 96, <strong>Minimum tank depth</strong> = 36 and <strong>Recommended volume</strong> = 32.72 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Recommended volume takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Recommended volume</strong> = <code>max(20,Adult length of the largest fish × Adult length of the largest fish × Number in the school × 0.6 × Temperament ÷ 10 + Adult length of the largest fish × Number in the school)</code></li><li><strong>Minimum tank length</strong> = <code>max(45,Adult length of the largest fish × 8)</code></li><li><strong>Minimum tank depth</strong> = <code>max(30,Adult length of the largest fish × 3)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Recommended volume</strong> = <code>max(20,Adult length of the largest fish × Adult length of the largest fish × Number in the school × 0.6 × Temperament ÷ 10 + Adult length of the largest fish × Number in the school)</code> — the form to use when Adult length of the largest fish, Number in the school and Temperament are the values you have.</li><li><strong>Minimum tank length</strong> = <code>max(45,Adult length of the largest fish × 8)</code> — the form to use when Adult length of the largest fish are the values you have.</li><li><strong>Minimum tank depth</strong> = <code>max(30,Adult length of the largest fish × 3)</code> — the form to use when Adult length of the largest fish are the values you have.</li><li><strong>Recommended volume</strong> = <code>max(20,Adult length of the largest fish × Adult length of the largest fish × Number in the school × 0.6 × Temperament ÷ 10 + Adult length of the largest fish × Number in the school) ÷ 3.785</code> — the form to use when Adult length of the largest fish, Number in the school and Temperament are the values you have.</li></ul><p>Any one of Recommended volume, Minimum tank length and Minimum tank depth can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Adult length of the largest fish from 12 to 24, leaving every other box alone. The panel moves from <strong>Recommended volume</strong> 124 L, <strong>Minimum tank length</strong> 96 cm, <strong>Minimum tank depth</strong> 36 cm and <strong>Recommended volume</strong> 32.72 US gal to <strong>Recommended volume</strong> 351 L, <strong>Minimum tank length</strong> 192 cm, <strong>Minimum tank depth</strong> 72 cm and <strong>Recommended volume</strong> 92.83 US gal.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Recommended volume, Minimum tank length and Minimum tank depth are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Adult length of the largest fish left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Adult length of the largest fish is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Number in the school left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number in the school is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Temperament left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Temperament is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Adult length of the largest fish and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Ideal Fish Tank Size form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Adult length of the largest fish</strong> is measured in cm. Change it and Recommended volume, Minimum tank length and Minimum tank depth changes with it. Fill it from a measurement rather than a memory — Adult length of the largest fish is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number in the school</strong> takes a plain number with no unit attached. Change it and Recommended volume and Recommended volume changes with it. Fill it from a measurement rather than a memory — Number in the school is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Temperament</strong> takes a plain number with no unit attached. Change it and Recommended volume and Recommended volume changes with it. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Temperament is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Recommended volume</strong> is a plain number and the page's own defaults put it at 124. It is worked out from Adult length of the largest fish, Number in the school and Temperament. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Minimum tank length</strong> is a plain number and the page's own defaults put it at 96. It is worked out from Adult length of the largest fish. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Minimum tank depth</strong> is a plain number and the page's own defaults put it at 36. It is worked out from Adult length of the largest fish. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Recommended volume</strong> is a plain number and the page's own defaults put it at 32.72. It is worked out from Adult length of the largest fish, Number in the school and Temperament. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Recommended volume</th><th>Minimum tank length</th><th>Minimum tank depth</th><th>Recommended volume</th></tr></thead><tbody><tr><td><strong>Adult length of the largest fish</strong> +10%</td><td>+14.6%</td><td>+10%</td><td>+10%</td><td>+14.6%</td></tr><tr><td><strong>Number in the school</strong> +10%</td><td>+10%</td><td>+0%</td><td>+0%</td><td>+10%</td></tr><tr><td><strong>Temperament</strong> +10%</td><td>+4.19%</td><td>+0%</td><td>+0%</td><td>+4.19%</td></tr></tbody></table><p>Ranked by leverage, Adult length of the largest fish sits at the top — a ten per cent error in that box shows up as roughly 14.6 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Adult length of the largest fish = 6 cm, Number in the school = 3 and Temperament = 0.5 and the page reports <strong>Recommended volume</strong> = 21.24 L, <strong>Minimum tank length</strong> = 48 cm, <strong>Minimum tank depth</strong> = 30 cm and <strong>Recommended volume</strong> = 5.61 US gal.</li><li>Feed in Adult length of the largest fish = 36 cm, Number in the school = 6 and Temperament = 1 and the page reports <strong>Recommended volume</strong> = 683 L, <strong>Minimum tank length</strong> = 288 cm, <strong>Minimum tank depth</strong> = 108 cm and <strong>Recommended volume</strong> = 180 US gal.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Recommended volume follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
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
            Adult length of the largest fish (cm), Number in the school, Temperament. Enter adult length of the largest fish, number in the school and temperament; Recommended volume is the box to leave alone unless it is the value you came for.
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
