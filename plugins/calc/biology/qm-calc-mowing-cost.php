<?php

/**
 * Lawn mowing
 * /biology/mowing-cost
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lawn mowing',
    'meta' => ['title' => 'Lawn mowing Calculator: Formula, Steps & Example', 'description' => 'Lawn mowing reports total costs, your mower can mow and mowing should take. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Lawn mowing Calculator', 'updated' => '2026-08-12'],
    'sections' => [
        [
            'title' => 'Select mowing calculation',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'whatCalculate',
                            'label' => 'I want to find the...',
                            'type' => 'select',
                            'options' => ['Lawn mowing cost' => '1', 'Mower efficiency and time' => '2'],
                            'dataset' => 'what to do',
                            'default' => 'Lawn mowing cost',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Mowing cost',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'costBy',
                            'label' => 'The company charges...',
                            'type' => 'select',
                            'options' => ['Per area' => '11', 'Per hour' => '22'],
                            'dataset' => 'charge type',
                            'default' => 'Per area',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pricePerArea',
                            'label' => 'Mowing price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Area to mow',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'hectare',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'costArea',
                            'label' => 'Total costs',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pricePerHour',
                            'label' => 'Mowing price',
                            'type' => 'number',
                            'suffix' => '/h',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hours',
                            'label' => 'Hours of work',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'costHour',
                            'label' => 'Total costs',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Mower efficiency',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mowSpeed',
                            'label' => 'Mower speed',
                            'type' => 'number',
                            'help' => 'At what speed does your mower move at when mowing?',
                            'unit' => '32',
                            'unit_default' => 'kmph',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mowWidth',
                            'label' => 'Mower width',
                            'type' => 'number',
                            'help' => 'How wide is your mower\'s deck?',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'errorMargin',
                            'label' => 'Expected mowing productivity',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            Becuase of overlap, trimming, differences in grass durability, etc., mowing is rarely a 100% successful. Typically, a mower gets about 80-90% of the grass cut perfectly.
                            TXT,
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '80',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mowingEff',
                            'label' => 'Your mower can mow',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'hectare',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Mowing time',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mowArea',
                            'label' => 'If you have',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'hectare',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mowingTime',
                            'label' => 'mowing should take',
                            'type' => 'number',
                            'help' => 'Estimated mowing time.',
                            'unit' => '19',
                            'unit_default' => 'hrsmin',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'mowingEff = mowSpeed * mowWidth * errorMargin',
            'results' => ['mowWidth' => 'mowingEff/(errorMargin*mowSpeed)', 'mowingEff' => 'errorMargin*mowSpeed*mowWidth', 'mowSpeed' => 'mowingEff/(errorMargin*mowWidth)', 'errorMargin' => 'mowingEff/(mowSpeed*mowWidth)'],
        ],
        [
            'title' => 'costArea = pricePerArea * area',
            'results' => ['pricePerArea' => 'costArea/area', 'costArea' => 'area*pricePerArea', 'area' => 'costArea/pricePerArea'],
        ],
        [
            'title' => 'costHour = pricePerHour * hours',
            'results' => ['costHour' => 'hours*pricePerHour', 'hours' => 'costHour/pricePerHour', 'pricePerHour' => 'costHour/hours'],
        ],
        [
            'title' => 'mowingTime = mowArea / mowingEff',
            'results' => ['mowArea' => 'mowingEff*mowingTime', 'mowingEff' => 'mowArea/mowingTime', 'mowingTime' => 'mowArea/mowingEff'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Lawn mowing works out Mowing price and Area to mow from Mower speed, Mower width and Expected mowing productivity. Nothing is looked up on this page: mowing price is computed from mower speed and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Mowing price is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Lawn mowing calculator works', 'html' => <<<'TXT'
            <p>Lawn mowing answers one question from 3 numbers, and the answer is Mowing price, Area to mow and Total costs.</p><p>The relationship it solves reads Your mower can mow = Expected mowing productivity × Mower speed × Mower width.</p><p>The result panel carries Mowing price, Area to mow, Total costs and Mowing price, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Mower speed</strong> — in kilometers per hour. At what speed does your mower move at when mowing?</li><li><strong>Mower width</strong> — in centimeters. How wide is your mower&#039;s deck?</li><li><strong>Expected mowing productivity</strong> — in percent. Becuase of overlap, trimming, differences in grass durability, etc., mowing is rarely a 100% successful. Typically, a mower gets about 80-90% of the grass cut perfectly.</li></ul><p>The result boxes are Mowing price in USD, Area to mow in hectares, Total costs in USD, Mowing price in /h, Hours of work, Total costs in USD, Your mower can mow in hectares, If you have in hectares, mowing should take in hours / minutes; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Area to mow lists 5 options and opens on hectares. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Your mower can mow</strong> = <code>Expected mowing productivity × Mower speed × Mower width</code></li><li><strong>Mower width</strong> = <code>Your mower can mow ÷ (Expected mowing productivity × Mower speed)</code></li><li><strong>Mower speed</strong> = <code>Your mower can mow ÷ (Expected mowing productivity × Mower width)</code></li><li><strong>Expected mowing productivity</strong> = <code>Your mower can mow ÷ (Mower speed × Mower width)</code></li><li><strong>Total costs</strong> = <code>Area to mow × Mowing price</code></li><li><strong>Mowing price</strong> = <code>Total costs ÷ Area to mow</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Your mower can mow</strong> = <code>Expected mowing productivity × Mower speed × Mower width</code> — the form to use when Expected mowing productivity, Mower speed and Mower width are the values you have.</li><li><strong>Mower width</strong> = <code>Your mower can mow ÷ (Expected mowing productivity × Mower speed)</code> — the form to use when Your mower can mow, Expected mowing productivity and Mower speed are the values you have.</li><li><strong>Mower speed</strong> = <code>Your mower can mow ÷ (Expected mowing productivity × Mower width)</code> — the form to use when Your mower can mow, Expected mowing productivity and Mower width are the values you have.</li><li><strong>Expected mowing productivity</strong> = <code>Your mower can mow ÷ (Mower speed × Mower width)</code> — the form to use when Your mower can mow, Mower speed and Mower width are the values you have.</li><li><strong>Total costs</strong> = <code>Area to mow × Mowing price</code> — the form to use when Area to mow and Mowing price are the values you have.</li><li><strong>Mowing price</strong> = <code>Total costs ÷ Area to mow</code> — the form to use when Total costs and Area to mow are the values you have.</li><li><strong>Area to mow</strong> = <code>Total costs ÷ Mowing price</code> — the form to use when Total costs and Mowing price are the values you have.</li><li><strong>Total costs</strong> = <code>Hours of work × Mowing price</code> — the form to use when Hours of work and Mowing price are the values you have.</li></ul><p>Any one of Your mower can mow, Mower width and Mower speed can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Mower speed, Mower width and Expected mowing productivity carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Mowing price, Area to mow and Total costs are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Mower speed left as a guess.</strong> Anything typed into Mower speed is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Mower width left as a guess.</strong> Anything typed into Mower width is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Mower speed is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Mower speed</strong> is a kilometers per hour quantity: the page opens it in kmph and converts anything else you pick before the formula runs. At what speed does your mower move at when mowing?. It feeds Mower width, Your mower can mow and Expected mowing productivity. Have it to hand before you start: Mower speed is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Mower width</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. How wide is your mower&#039;s deck?. It feeds Your mower can mow, Mower speed and Expected mowing productivity. Have it to hand before you start: Mower width is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Expected mowing productivity</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Becuase of overlap, trimming, differences in grass durability, etc., mowing is rarely a 100% successful. Typically, a mower gets about 80-90% of the grass cut perfectly. It feeds Mower width, Your mower can mow and Mower speed. Have it to hand before you start: Expected mowing productivity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 9 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Mowing price</strong> is a plain number. The value follows from Total costs and Area to mow. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Area to mow</strong> is a hectares figure. The value follows from Total costs and Mowing price. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total costs</strong> is a plain number. The value follows from Area to mow and Mowing price. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Mowing price</strong> is a plain number. The value follows from Total costs and Hours of work. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Hours of work</strong> is a plain number. The value follows from Total costs and Mowing price. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total costs</strong> is a plain number. The value follows from Hours of work and Mowing price. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Your mower can mow</strong> is a hectares figure. The value follows from Expected mowing productivity, Mower speed and Mower width. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>If you have</strong> is a hectares figure. The value follows from Your mower can mow and mowing should take. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>mowing should take</strong> is a hours / minutes figure. The value follows from If you have and Your mower can mow. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Mowing price is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover hectares, hours / minutes and kilometers per hour. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Mower speed, Mower width and Expected mowing productivity is what you already know and Mowing price and Area to mow is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Lawn mowing calculator work out?', 'a' => <<<'TXT'
            Mowing price, Area to mow, Total costs and Mowing price, from Expected mowing productivity, Mower speed and Mower width. The relationship is Your mower can mow = Expected mowing productivity × Mower speed × Mower width.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Mower speed (kilometers per hour), Mower width (centimeters), Expected mowing productivity (percent). With mower speed, mower width and expected mowing productivity in place, Mowing price can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Your mower can mow, Mower width, Mower speed and Expected mowing productivity blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Mowing price is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Mower speed left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Mowing price keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dog-quality-of-life', 'name' => 'Dog quality of life'],
            ['path' => '/biology/dog-raisin-toxicity', 'name' => 'Dog raisin toxicity Calculator'],
            ['path' => '/biology/dog-size', 'name' => 'Dog size Calculator'],
        ],
        'authors' => [],
    ],
];
