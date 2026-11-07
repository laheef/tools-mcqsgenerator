<?php

/**
 * Tramadol for dogs
 * /biology/tramadol-for-dogs
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Tramadol for dogs',
    'meta' => ['title' => 'Tramadol for dogs: Formula, Steps & Results', 'description' => 'Tramadol for dogs works out minimum dose and maximum dose and reports both. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Tramadol for dogs Calculator', 'updated' => '2026-05-22'],
    'raw' => [
        'vars' => [
            'Maximum_dose_allowed' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'Minimum_dose_tablets' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'maximum_dose' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'minimum_dose' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'R5NgzIXC2E3ugLPv35SR6',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'weight',
                                    'vt' => 'numerical',
                                    'l' => 'Your dog\'s weight',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, ' Fill in the field above to receive the recommended tramadol dose for your dog.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, ' Recommended dosage: {{minimum_dose.formattedValue}}-{{maximum_dose.formattedValue}} mg.  Tramadol should be given every 8-12 hours (2-3 times per day).'],
                                        ['minimum_dose >= 49', 'The minimal dosage requires a total of {{Minimum_dose_tablets.formattedValue}} tablets (strength: 50 mg) per day.'],
                                        ['minimum_dose < 49', '&nbsp;'],
                                        [null, ' Maximum dose allowed: {{Maximum_dose_allowed.formattedValue}} mg/day.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'U4_6YFGzRBQ3BSnmiVhRC',
                'title' => 'hidden group',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'maximum_dose', 'vt' => 'numerical', 'l' => 'Max dose'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'minimum_dose', 'vt' => 'numerical', 'l' => 'Min dose'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'Maximum_dose_allowed', 'vt' => 'numerical', 'l' => 'Maximum dose allowed'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'Minimum_dose_tablets', 'vt' => 'numerical', 'l' => 'Minimal dose allowed'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'minimum_dose = 0.9 * weight ',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => '(10/9)*minimum_dose',
                        'r' => ['minimum_dose'],
                    ],
                    [
                        'l' => 'minimum_dose',
                        'f' => '(9/10)*weight',
                        'r' => ['weight'],
                    ],
                ],
            ],
            [
                'formula' => 'maximum_dose = 2.25 * weight',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => '(4/9)*maximum_dose',
                        'r' => ['maximum_dose'],
                    ],
                    [
                        'l' => 'maximum_dose',
                        'f' => '(9/4)*weight',
                        'r' => ['weight'],
                    ],
                ],
            ],
            [
                'formula' => 'Maximum_dose_allowed = 4.54 * weight',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => '(50/227)*Maximum_dose_allowed',
                        'r' => ['Maximum_dose_allowed'],
                    ],
                    [
                        'l' => 'Maximum_dose_allowed',
                        'f' => '(227/50)*weight',
                        'r' => ['weight'],
                    ],
                ],
            ],
            [
                'formula' => 'Minimum_dose_tablets = minimum_dose / 25',
                'var' => [
                    [
                        'l' => 'Minimum_dose_tablets',
                        'f' => '(1/25)*minimum_dose',
                        'r' => ['minimum_dose'],
                    ],
                    [
                        'l' => 'minimum_dose',
                        'f' => '25*Minimum_dose_tablets',
                        'r' => ['Minimum_dose_tablets'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Your dog's weight into Tramadol for dogs and the answer comes back as Minimum dose and Maximum dose. Nothing is looked up on this page: minimum dose is computed from your dog's weight and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Tramadol for dogs calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Tramadol for dogs: it takes 1 number and reports Minimum dose, Maximum dose and Maximum dose allowed.</p><p>In the form&#039;s own words, Minimum dose = (9 ÷ 10) × Your dog&#039;s weight.</p><p>The result panel carries Minimum dose, Maximum dose, Maximum dose allowed and Minimum dose tablets, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Your dog&#039;s weight</strong> — in kilograms</li></ul><p>The result boxes are Minimum dose, Maximum dose, Maximum dose allowed, Minimum dose tablets; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Your dog&amp;#039;s weight = 10 kg — through the same formula and the panel reports <strong>Minimum dose</strong> = 9, <strong>Maximum dose</strong> = 22.5, <strong>Maximum dose allowed</strong> = 45.4 and <strong>Minimum dose tablets</strong> = 0.36.</p><ul><li><strong>Minimum dose</strong> = 9</li><li><strong>Maximum dose</strong> = 22.5</li><li><strong>Maximum dose allowed</strong> = 45.4</li><li><strong>Minimum dose tablets</strong> = 0.36</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Minimum dose</strong> = <code>(9 ÷ 10) × Your dog&#039;s weight</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Minimum dose</strong> = 9, <strong>Maximum dose</strong> = 22.5, <strong>Maximum dose allowed</strong> = 45.4 and <strong>Minimum dose tablets</strong> = 0.36. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Your dog&#039;s weight lists 27 options and opens on kilograms. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Minimum dose</strong> = <code>(9 ÷ 10) × Your dog&#039;s weight</code></li><li><strong>Your dog&#039;s weight</strong> = <code>(10 ÷ 9) × Minimum dose</code></li><li><strong>Maximum dose</strong> = <code>(9 ÷ 4) × Your dog&#039;s weight</code></li><li><strong>Maximum dose allowed</strong> = <code>(227 ÷ 50) × Your dog&#039;s weight</code></li><li><strong>Minimum dose tablets</strong> = <code>(1 ÷ 25) × Minimum dose</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Minimum dose</strong> = <code>(9 ÷ 10) × Your dog&#039;s weight</code> — the form to use when Your dog&#039;s weight are the values you have.</li><li><strong>Your dog&#039;s weight</strong> = <code>(10 ÷ 9) × Minimum dose</code> — the form to use when Minimum dose are the values you have.</li><li><strong>Maximum dose</strong> = <code>(9 ÷ 4) × Your dog&#039;s weight</code> — the form to use when Your dog&#039;s weight are the values you have.</li><li><strong>Your dog&#039;s weight</strong> = <code>(4 ÷ 9) × Maximum dose</code> — the form to use when Maximum dose are the values you have.</li><li><strong>Maximum dose allowed</strong> = <code>(227 ÷ 50) × Your dog&#039;s weight</code> — the form to use when Your dog&#039;s weight are the values you have.</li><li><strong>Your dog&#039;s weight</strong> = <code>(50 ÷ 227) × Maximum dose allowed</code> — the form to use when Maximum dose allowed are the values you have.</li><li><strong>Minimum dose tablets</strong> = <code>(1 ÷ 25) × Minimum dose</code> — the form to use when Minimum dose are the values you have.</li><li><strong>Minimum dose</strong> = <code>25 × Minimum dose tablets</code> — the form to use when Minimum dose tablets are the values you have.</li></ul><p>Any one of Minimum dose, Your dog&#039;s weight and Maximum dose can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Your dog&#039;s weight, from 10 to 20 — and the answers go from <strong>Minimum dose</strong> 9, <strong>Maximum dose</strong> 22.5, <strong>Maximum dose allowed</strong> 45.4 and <strong>Minimum dose tablets</strong> 0.36 to <strong>Minimum dose</strong> 18, <strong>Maximum dose</strong> 45, <strong>Maximum dose allowed</strong> 90.8 and <strong>Minimum dose tablets</strong> 0.72.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Your dog&#039;s weight carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Minimum dose, Maximum dose and Maximum dose allowed are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Your dog&#039;s weight left as a guess.</strong> Anything typed into Your dog&amp;#039;s weight is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Your dog&#039;s weight and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Your dog&#039;s weight</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. The page reads it when it works out Minimum dose, Maximum dose and Maximum dose allowed. Have it to hand before you start: Your dog&#039;s weight is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Minimum dose</strong> is a plain number and the page's own defaults put it at 9. It is worked out from Your dog's weight. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Maximum dose</strong> is a plain number and the page's own defaults put it at 22.5. It is worked out from Your dog's weight. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Maximum dose allowed</strong> is a plain number and the page's own defaults put it at 45.4. It is worked out from Your dog's weight. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Minimum dose tablets</strong> is a plain number and the page's own defaults put it at 0.36. It is worked out from Minimum dose. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Minimum dose</th><th>Maximum dose</th><th>Maximum dose allowed</th><th>Minimum dose tablets</th></tr></thead><tbody><tr><td><strong>Your dog&#039;s weight</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Your dog&#039;s weight: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Your dog&#039;s weight = 5 kg, the answer is <strong>Minimum dose</strong> = 4.5, <strong>Maximum dose</strong> = 11.25, <strong>Maximum dose allowed</strong> = 22.7 and <strong>Minimum dose tablets</strong> = 0.18.</li><li>With Your dog&#039;s weight = 30 kg, the answer is <strong>Minimum dose</strong> = 27, <strong>Maximum dose</strong> = 67.5, <strong>Maximum dose allowed</strong> = 136 and <strong>Minimum dose tablets</strong> = 1.08.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>kilograms</strong> — 27 units. It opens in <em>kg</em>, and the chip also carries lb, mg, g, oz, t and ng. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Minimum dose is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are kilograms and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Your dog&#039;s weight are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Your dog&#039;s weight measured, Minimum dose and Maximum dose wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/enzyme-unit-converter">Enzyme Unit Converter (U/mg, kcat) Calculator</a>, <a href="/biology/exponential-population-growth">Exponential Population Growth Calculator</a> and <a href="/biology/farm-pond-fish-stocking">Farm Pond Fish Stocking Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Tramadol for dogs calculator work out?', 'a' => <<<'TXT'
            Minimum dose, Maximum dose, Maximum dose allowed and Minimum dose tablets, from Your dog's weight. The relationship is Minimum dose = (9 ÷ 10) × Your dog's weight.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Your dog\'s weight (kilograms). Fill your dog\'s weight and leave Minimum dose empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Minimum dose, Your dog's weight, Maximum dose and Maximum dose allowed blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Minimum dose = 9, Maximum dose = 22.5, Maximum dose allowed = 45.4 and Minimum dose tablets = 0.36. The figures come from Your dog's weight as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Minimum dose is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Your dog's weight left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Minimum dose keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/enzyme-unit-converter', 'name' => 'Enzyme Unit Converter (U/mg, kcat) Calculator'],
            ['path' => '/biology/exponential-population-growth', 'name' => 'Exponential Population Growth Calculator'],
            ['path' => '/biology/farm-pond-fish-stocking', 'name' => 'Farm Pond Fish Stocking Calculator'],
        ],
        'authors' => [],
    ],
];
