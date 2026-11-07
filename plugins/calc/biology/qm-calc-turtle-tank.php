<?php

/**
 * Turtle tank
 * /biology/turtle-tank
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Turtle tank',
    'meta' => ['title' => 'Turtle tank Calculator: Formula, Steps & Examples', 'description' => 'Turtle tank works out This species can grow up to from Your turtle\'s species, My turtle\'s length and Recommended tank size. My turtle&#039;s length and…', 'h1' => 'Turtle tank Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'Species' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'DhYe1EUnYPhZkgmD2b74o', 'c' => null],
                ],
                'ds' => 'zh72X8ejC9bEIwoepe40m',
            ],
            'my_turtle_size' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'size' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'tank_size' => [
                'type' => 'numerical',
                'rnd' => ['standard', '1'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'wbb8m21twQbxpjUasmPC6',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'Species',
                                    'vt' => 'valueSelect',
                                    'l' => 'Your turtle\'s species',
                                    'ds' => 'zh72X8ejC9bEIwoepe40m',
                                    'opts' => [
                                        ['DhYe1EUnYPhZkgmD2b74o', 'Red-Eared Slider', '12'],
                                        ['AEFduDoq8mO0bjV1diiaA', 'Eastern Box Turtle', '7'],
                                        ['d83qXX9XSSNFvmGPPbp06', 'Western Painted Turtle', '8'],
                                        ['zQ7qtwm7wiDsRSdjZUEZ2', 'Map Turtle', '10'],
                                        ['jI-DZX2uCZHfhWB7-B31X', 'Wood Turtle', '9'],
                                        ['0V9HvO84z4-k9yCFpMzWo', 'Musk Turtle', '5'],
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
                                    't' => 'i',
                                    'u' => ['redear.jpg '],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'size',
                                    'vt' => 'dependent',
                                    'l' => 'This species can grow up to',
                                    'h' => 'Turtles come in many different sizes depending on their species.',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'my_turtle_size',
                                    'vt' => 'numerical',
                                    'l' => 'My turtle\'s length',
                                    'h' => 'Input the length of your turtle\'s shell in inches (or cm) here!',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'tank_size',
                                    'vt' => 'numerical',
                                    'l' => 'Recommended tank size',
                                    'us' => '20',
                                    'du' => 'liters',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'tank_size = my_turtle_size * 10',
                'var' => [
                    [
                        'l' => 'tank_size',
                        'f' => '10*my_turtle_size',
                        'r' => ['my_turtle_size'],
                    ],
                    [
                        'l' => 'my_turtle_size',
                        'f' => '(1/10)*tank_size',
                        'r' => ['tank_size'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'zh72X8ejC9bEIwoepe40m' => [
                'name' => 'Kind of Turtle',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'DhYe1EUnYPhZkgmD2b74o', 'label' => 'Red-Eared Slider', 'value' => '12'],
                    ['uid' => 'AEFduDoq8mO0bjV1diiaA', 'label' => 'Eastern Box Turtle', 'value' => '7'],
                    ['uid' => 'd83qXX9XSSNFvmGPPbp06', 'label' => 'Western Painted Turtle', 'value' => '8'],
                    ['uid' => 'zQ7qtwm7wiDsRSdjZUEZ2', 'label' => 'Map Turtle', 'value' => '10'],
                    ['uid' => 'jI-DZX2uCZHfhWB7-B31X', 'label' => 'Wood Turtle', 'value' => '9'],
                    ['uid' => '0V9HvO84z4-k9yCFpMzWo', 'label' => 'Musk Turtle', 'value' => '5'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Turtle tank works out This species can grow up to from Your turtle's species, My turtle's length and Recommended tank size. Nothing is looked up on this page: This species can grow up to is computed from Your turtle's species and the other boxes, so an unusual pair of values gives an honest answer rather than an error. This species can grow up to is opened in centimeters; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Turtle tank calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Turtle tank: it takes 3 numbers and reports This species can grow up to.</p><p>The relationship it solves reads Recommended tank size = 10 × My turtle&#039;s length.</p><p>The answers are This species can grow up to; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Your turtle&#039;s species</strong> — a plain number, no unit</li><li><strong>My turtle&#039;s length</strong> — in centimeters. Input the length of your turtle&#039;s shell in inches (or cm) here!</li><li><strong>Recommended tank size</strong> — in liters</li></ul><p>The result box is This species can grow up to in centimeters. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on This species can grow up to lists 31 options and opens on centimeters. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Recommended tank size</strong> = <code>10 × My turtle&#039;s length</code></li><li><strong>My turtle&#039;s length</strong> = <code>(1 ÷ 10) × Recommended tank size</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Recommended tank size</strong> = <code>10 × My turtle&#039;s length</code> — the form to use when My turtle&#039;s length are the values you have.</li><li><strong>My turtle&#039;s length</strong> = <code>(1 ÷ 10) × Recommended tank size</code> — the form to use when Recommended tank size are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Recommended tank size and My turtle&#039;s length can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> My turtle&#039;s length and Recommended tank size carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> This species can grow up to is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Your turtle&#039;s species left as a guess.</strong> Anything typed into Your turtle&amp;#039;s species is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>My turtle&#039;s length left as a guess.</strong> Anything typed into My turtle&amp;#039;s length is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Your turtle&#039;s species to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Turtle tank form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Your turtle&#039;s species</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Your turtle&#039;s species is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>My turtle&#039;s length</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. Input the length of your turtle&#039;s shell in inches (or cm) here!. It feeds Recommended tank size. Fill it from a measurement rather than a memory — My turtle&#039;s length is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Recommended tank size</strong> is a liters quantity: the page opens it in liters and converts anything else you pick before the formula runs. It feeds My turtle's length. Fill it from a measurement rather than a memory — Recommended tank size is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>This species can grow up to</strong> is a centimeters figure. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Turtle tank actually offers.</p><ul><li><strong>centimeters</strong> — 31 units. It opens in <em>cm</em>, and the chip also carries in, m, ft, Å, nm and pm. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>liters</strong> — 40 units. It opens in <em>liters</em>, and the chip also carries m³, cu ft, US fl oz, L, dm³ and cu in. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Your turtle&#039;s species, My turtle&#039;s length and Recommended tank size ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Your turtle&amp;#039;s species — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check This species can grow up to in cm against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind This species can grow up to is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover centimeters and liters. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Your turtle&#039;s species, My turtle&#039;s length and Recommended tank size measured, This species can grow up to wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/crop-water-stress-index">Crop Water Stress Index Calculator</a>, <a href="/biology/daily-light-integral-dli">Daily light integral (DLI) Calculator</a> and <a href="/biology/days-to-maturity">Days to Maturity Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Turtle tank is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Turtle tank calculator work out?', 'a' => 'This species can grow up to, from My turtle\'s length. The relationship is Recommended tank size = 10 × My turtle\'s length.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Your turtle's species, My turtle's length (centimeters), Recommended tank size (liters). With Species, my_turtle_size and tank_size in place, This species can grow up to can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Recommended tank size and My turtle\'s length can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            This species can grow up to is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Your turtle's species blank and the page solves for it, reporting This species can grow up to instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. This species can grow up to keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/crop-water-stress-index', 'name' => 'Crop Water Stress Index Calculator'],
            ['path' => '/biology/daily-light-integral-dli', 'name' => 'Daily light integral (DLI) Calculator'],
            ['path' => '/biology/days-to-maturity', 'name' => 'Days to Maturity Calculator'],
        ],
        'authors' => [],
    ],
];
