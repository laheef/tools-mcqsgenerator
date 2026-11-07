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
    'meta' => ['title' => 'Tramadol for dogs: Formula, Steps & Results', 'description' => 'Tramadol for dogs turns your dog\'s weight into minimum dose and maximum dose. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Tramadol for dogs Calculator', 'updated' => '2026-05-22'],
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
                                        [null, '🐶 Fill in the field above to receive the recommended tramadol dose for your dog.'],
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
                                        [null, '🐶 Recommended dosage: {{minimum_dose.formattedValue}}-{{maximum_dose.formattedValue}} mg. 🐕 Tramadol should be given every 8-12 hours (2-3 times per day).'],
                                        ['minimum_dose >= 49', '⚕️The minimal dosage requires a total of {{Minimum_dose_tablets.formattedValue}} tablets (strength: 50 mg) per day.'],
                                        ['minimum_dose < 49', '&nbsp;'],
                                        [null, '⚠️ Maximum dose allowed: {{Maximum_dose_allowed.formattedValue}} mg/day.'],
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
        Tramadol for dogs returns Your dog's weight from the values already on the page. Your dog's weight is opened in kilograms; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Tramadol for dogs calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Tramadol for dogs: it takes the value already on the page and reports Your dog&#039;s weight.</p><p>In the form&#039;s own words, Your dog&#039;s weight = (10 ÷ 9) × minimum_dose.</p><p>The result panel carries Your dog&#039;s weight, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Your dog&#039;s weight lists 27 options and opens on kilograms. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Your dog&#039;s weight</strong> = <code>(10 ÷ 9) × minimum_dose</code></li><li><strong>minimum_dose</strong> = <code>(9 ÷ 10) × Your dog&#039;s weight</code></li><li><strong>maximum_dose</strong> = <code>(9 ÷ 4) × Your dog&#039;s weight</code></li><li><strong>Maximum_dose_allowed</strong> = <code>(227 ÷ 50) × Your dog&#039;s weight</code></li><li><strong>Minimum_dose_tablets</strong> = <code>(1 ÷ 25) × minimum_dose</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Your dog&#039;s weight</strong> = <code>(10 ÷ 9) × minimum_dose</code> — the form to use when the other values are known.</li><li><strong>minimum_dose</strong> = <code>(9 ÷ 10) × Your dog&#039;s weight</code> — the form to use when Your dog&#039;s weight are the values you have.</li><li><strong>Your dog&#039;s weight</strong> = <code>(4 ÷ 9) × maximum_dose</code> — the form to use when the other values are known.</li><li><strong>maximum_dose</strong> = <code>(9 ÷ 4) × Your dog&#039;s weight</code> — the form to use when Your dog&#039;s weight are the values you have.</li><li><strong>Your dog&#039;s weight</strong> = <code>(50 ÷ 227) × Maximum_dose_allowed</code> — the form to use when the other values are known.</li><li><strong>Maximum_dose_allowed</strong> = <code>(227 ÷ 50) × Your dog&#039;s weight</code> — the form to use when Your dog&#039;s weight are the values you have.</li><li><strong>Minimum_dose_tablets</strong> = <code>(1 ÷ 25) × minimum_dose</code> — the form to use when the other values are known.</li><li><strong>minimum_dose</strong> = <code>25 × Minimum_dose_tablets</code> — the form to use when the other values are known.</li></ul><p>Any one of Your dog&#039;s weight, minimum_dose and maximum_dose can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Your dog&#039;s weight is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in the measured values and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Your dog&#039;s weight</strong> is a kilograms figure. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>kilograms</strong> — 27 units. It opens in <em>kg</em>, and the chip also carries lb, mg, g, oz, t and ng. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Enter them and press Calculate.</strong> Type the values into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Your dog&amp;#039;s weight in kg with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Your dog&#039;s weight is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are kilograms and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes the values you enter are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/enzyme-unit-converter">Enzyme Unit Converter (U/mg, kcat) Calculator</a>, <a href="/biology/exponential-population-growth">Exponential Population Growth Calculator</a> and <a href="/biology/farm-pond-fish-stocking">Farm Pond Fish Stocking Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>Neighbouring pages resolve the parts of the same job that Tramadol for dogs leaves alone. Knowing which is which saves running the wrong one:</p><p>Worth opening next: <a href="/biology/enzyme-unit-converter">Enzyme Unit Converter (U/mg, kcat) Calculator</a>, <a href="/biology/exponential-population-growth">Exponential Population Growth Calculator</a> and <a href="/biology/farm-pond-fish-stocking">Farm Pond Fish Stocking Calculator</a>. They follow the same pattern as this page (form, formula, worked example, answer), so a reader who understands one understands the others.</p><p>Using the page that already answers the question you have is better than adapting this one: the formula and the units will match what you expect, and the worked example will be about your case.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Tramadol for dogs is a number to act on, so the useful question is what to do with Your dog&#039;s weight (kg) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down the values you used alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Tramadol for dogs calculator work out?', 'a' => 'Your dog\'s weight, from . The relationship is Your dog\'s weight = (10 ÷ 9) × minimum_dose.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Your dog's weight, minimum_dose, maximum_dose and Maximum_dose_allowed blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Your dog's weight is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With the value already on the page left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Your dog\'s weight keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/enzyme-unit-converter', 'name' => 'Enzyme Unit Converter (U/mg, kcat) Calculator'],
            ['path' => '/biology/exponential-population-growth', 'name' => 'Exponential Population Growth Calculator'],
            ['path' => '/biology/farm-pond-fish-stocking', 'name' => 'Farm Pond Fish Stocking Calculator'],
        ],
        'authors' => [],
    ],
];
