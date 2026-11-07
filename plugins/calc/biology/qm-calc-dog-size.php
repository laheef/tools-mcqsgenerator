<?php

/**
 * Dog size
 * /biology/dog-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog size',
    'meta' => ['title' => 'Dog size Calculator — Formula, Units & Example', 'description' => 'Enter your puppy’s age and weight and Dog size returns adult weight. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Dog size Calculator', 'updated' => '2026-10-05'],
    'raw' => [
        'vars' => [
            'age' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'finalSize' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'finalSize_110' => [
                'type' => 'presentation',
                'rnd' => ['standard', '2'],
            ],
            'finalSize_90' => [
                'type' => 'presentation',
                'rnd' => ['standard', '2'],
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'ZcCCUjrPOAyKM8W2kCK-b',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'age',
                                    'vt' => 'numerical',
                                    'l' => 'Your puppy’s age',
                                    'us' => '19',
                                    'du' => 'wk',
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
                                    'n' => 'weight',
                                    'vt' => 'numerical',
                                    'l' => 'Weight',
                                    'h' => 'Your puppy’s weight at the age specified above.',
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
                                    't' => 'v',
                                    'n' => 'finalSize',
                                    'vt' => 'numerical',
                                    'l' => 'Adult weight',
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
                                        ['hasValue(finalSize)', 'Your dog\'s adult weight should fall into this range: {{finalSize_90.formattedValue}}-{{finalSize_110.formattedValue}}&nbsp;{{finalSize.unit}}.'],
                                        ['finalSize > 0 and finalSize <= 12', 'Your pet\'s going to be a Toy dog 🐶&nbsp;'],
                                        ['finalSize > 12 and finalSize <=22', 'Your pet\'s going to be a Small dog 🐶&nbsp;'],
                                        ['finalSize > 22 and finalSize <=57', 'Your pet\'s going to be a Medium dog 🐶&nbsp;'],
                                        ['finalSize > 57 and finalSize <=99', 'Your pet\'s going to be a Large dog 🐶&nbsp;'],
                                        ['finalSize > 99', 'Your pet\'s going to be a Giant dog 🐶'],
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
                                    'u' => ['Dogs/toydog22.jpg'],
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
                                        ['finalSize > 0 and finalSize <= 12', 'This type of dog can measure up to 12&nbsp;inches (30.5&nbsp;cm) in height, from paw to shoulder.&nbsp;'],
                                        ['finalSize > 12 and finalSize <=22', 'This type of dog can measure up to 18&nbsp;inches (45.7&nbsp;cm) in height, from paw to shoulder.&nbsp;'],
                                        ['finalSize > 22 and finalSize <=57', 'This type of dog can measure up to 25&nbsp;inches (63.5&nbsp;cm) in height, from paw to shoulder.&nbsp;'],
                                        ['finalSize > 57 and finalSize <=99', 'This type of dog can measure up to 30&nbsp;inches (76.2&nbsp;cm) in height, from paw to shoulder.&nbsp;'],
                                        ['finalSize > 99', 'This type of dog can measure up to 44&nbsp;inches (111.8&nbsp;cm) in height, from paw to shoulder.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'uCg9lNYg8pSLCsL1Xy77c',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'finalSize_90', 'vt' => 'presentation', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'finalSize_110', 'vt' => 'presentation', 'l' => ''],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'finalSize = (weight / age) * 52',
                'var' => [
                    [
                        'l' => 'finalSize',
                        'f' => '52*weight/age',
                        'r' => ['weight', 'age'],
                    ],
                    [
                        'l' => 'weight',
                        'f' => '(1/52)*age*finalSize',
                        'r' => ['finalSize', 'age'],
                    ],
                    [
                        'l' => 'age',
                        'f' => '52*weight/finalSize',
                        'r' => ['finalSize', 'weight'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Dog size works out Adult weight from Your puppy’s age and Weight. The arithmetic is the whole method: adult weight is worked out from your puppy’s age by one formula, applied once. Adult weight comes back in kilograms unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Dog size calculator works', 'html' => <<<'TXT'
            <p>The Dog size calculator applies one relationship to 2 numbers and reports Adult weight.</p><p>In the form&#039;s own words, Adult weight = 52 × Weight ÷ Your puppy’s age.</p><p>The answers are Adult weight; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Your puppy’s age</strong> — in weeks</li><li><strong>Weight</strong> — in kilograms. Your puppy’s weight at the age specified above.</li></ul><p>What you get back is Adult weight in kilograms, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Adult weight lists 27 options and opens on kilograms. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Adult weight</strong> = <code>52 × Weight ÷ Your puppy’s age</code></li><li><strong>Weight</strong> = <code>(1 ÷ 52) × Your puppy’s age × Adult weight</code></li><li><strong>Your puppy’s age</strong> = <code>52 × Weight ÷ Adult weight</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Adult weight</strong> = <code>52 × Weight ÷ Your puppy’s age</code> — the form to use when Weight and Your puppy’s age are the values you have.</li><li><strong>Weight</strong> = <code>(1 ÷ 52) × Your puppy’s age × Adult weight</code> — the form to use when Adult weight and Your puppy’s age are the values you have.</li><li><strong>Your puppy’s age</strong> = <code>52 × Weight ÷ Adult weight</code> — the form to use when Adult weight and Weight are the values you have.</li></ul><p>Any one of Adult weight, Weight and Your puppy’s age can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Your puppy’s age and Weight carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Adult weight is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Your puppy’s age left as a guess.</strong> Anything typed into Your puppy’s age is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Weight left as a guess.</strong> Anything typed into Weight is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Your puppy’s age to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Dog size form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Your puppy’s age</strong> is a weeks quantity: the page opens it in wk and converts anything else you pick before the formula runs. The page reads it when it works out Adult weight and Weight. Fill it from a measurement rather than a memory — Your puppy’s age is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Weight</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. Your puppy’s weight at the age specified above. The page reads it when it works out Adult weight and Your puppy’s age. Fill it from a measurement rather than a memory — Weight is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Adult weight</strong> is a kilograms figure. The value follows from Weight and Your puppy’s age. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Dog size actually offers.</p><ul><li><strong>kilograms</strong> — 27 units. It opens in <em>kg</em>, and the chip also carries lb, mg, g, oz, t and ng. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>weeks</strong> — 18 units. It opens in <em>wk</em>, and the chip also carries yrs, min, 15 sec, days, wks and mos. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Your puppy’s age and Weight ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Your puppy’s age — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Adult weight in kg against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Adult weight is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover kilograms and weeks. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Your puppy’s age and Weight is what you already know and Adult weight is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/coefficient-of-coincidence">Coefficient of Coincidence Calculator</a>, <a href="/biology/compost-application-rate">Compost Application Rate Calculator</a> and <a href="/biology/compost">Compost Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Dog size is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog size calculator work out?', 'a' => 'Adult weight, from Weight and Your puppy’s age. The relationship is Adult weight = 52 × Weight ÷ Your puppy’s age.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Your puppy’s age (weeks), Weight (kilograms). Fill your puppy’s age and weight and leave Adult weight empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Adult weight, Weight and Your puppy’s age blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Adult weight is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Your puppy’s age blank and the page solves for it, reporting Adult weight instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Adult weight keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/coefficient-of-coincidence', 'name' => 'Coefficient of Coincidence Calculator'],
            ['path' => '/biology/compost-application-rate', 'name' => 'Compost Application Rate Calculator'],
            ['path' => '/biology/compost', 'name' => 'Compost Calculator'],
        ],
        'authors' => [],
    ],
];
