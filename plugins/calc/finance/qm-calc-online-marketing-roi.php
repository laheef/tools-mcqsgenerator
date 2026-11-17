<?php

/**
 * Conversion rate
 * /finance/online-marketing-roi
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Conversion rate',
    'meta' => ['title' => 'Conversion rate — Formula, Steps & Examples', 'description' => 'Conversion rate takes calculate conversion rate for..., total conversions and number of clicks and returns conversion rate. The answer is shown in perc.', 'h1' => 'Conversion rate Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'options',
                            'label' => 'Calculate conversion rate for...',
                            'type' => 'select',
                            'options' => ['ads, posts or links.' => '1.1', 'websites.' => '2.2'],
                            'dataset' => 'Option',
                            'default' => 'ads, posts or links.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalConversionsC',
                            'label' => 'Total conversions',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalClicks',
                            'label' => 'Number of clicks',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'conversionRateC',
                            'label' => 'Conversion rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalConversionsV',
                            'label' => 'Total conversions',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalVisits',
                            'label' => 'Number of visits',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'conversionRateV',
                            'label' => 'Conversion rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Would you like to try out detailed options in our online marketing conversion calculator?&nbsp;'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'conversionRateC = (totalConversionsC / totalClicks) * 100',
            'results' => ['totalConversionsC' => '(1/100)*conversionRateC*totalClicks', 'conversionRateC' => '100*totalConversionsC/totalClicks', 'totalClicks' => '100*totalConversionsC/conversionRateC'],
        ],
        [
            'title' => 'conversionRateV = (totalConversionsV / totalVisits) * 100',
            'results' => ['totalConversionsV' => '(1/100)*conversionRateV*totalVisits', 'conversionRateV' => '100*totalConversionsV/totalVisits', 'totalVisits' => '100*totalConversionsV/conversionRateV'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Conversion rate works out Conversion rate and Total conversions from Number of clicks. Nothing is looked up on this page: conversion rate is computed from number of clicks and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Conversion rate is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Conversion rate calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Conversion rate: it takes 2 numbers and reports Conversion rate, Total conversions and Number of visits.</p><p>In the form&#039;s own words, Conversion rate = 100 × Total conversions ÷ Number of clicks.</p><p>The result panel carries Conversion rate, Total conversions, Number of visits and Conversion rate, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Total conversions</strong> — a plain number, no unit</li><li><strong>Number of clicks</strong> — a plain number, no unit</li></ul><p>What you get back is Conversion rate in percent, Total conversions, Number of visits, Conversion rate in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Conversion rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Conversion rate</strong> = <code>100 × Total conversions ÷ Number of clicks</code></li><li><strong>Total conversions</strong> = <code>(1 ÷ 100) × Conversion rate × Number of clicks</code></li><li><strong>Number of clicks</strong> = <code>100 × Total conversions ÷ Conversion rate</code></li><li><strong>Number of visits</strong> = <code>100 × Total conversions ÷ Conversion rate</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Conversion rate</strong> = <code>100 × Total conversions ÷ Number of clicks</code> — the form to use when Total conversions and Number of clicks are the values you have.</li><li><strong>Total conversions</strong> = <code>(1 ÷ 100) × Conversion rate × Number of clicks</code> — the form to use when Conversion rate and Number of clicks are the values you have.</li><li><strong>Number of clicks</strong> = <code>100 × Total conversions ÷ Conversion rate</code> — the form to use when Total conversions and Conversion rate are the values you have.</li><li><strong>Conversion rate</strong> = <code>100 × Total conversions ÷ Number of visits</code> — the form to use when Total conversions and Number of visits are the values you have.</li><li><strong>Total conversions</strong> = <code>(1 ÷ 100) × Conversion rate × Number of visits</code> — the form to use when Conversion rate and Number of visits are the values you have.</li><li><strong>Number of visits</strong> = <code>100 × Total conversions ÷ Conversion rate</code> — the form to use when Total conversions and Conversion rate are the values you have.</li></ul><p>Any one of Conversion rate, Total conversions and Number of clicks can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Conversion rate, Total conversions and Number of visits are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Total conversions left as a guess.</strong> Anything typed into Total conversions is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Number of clicks left as a guess.</strong> Anything typed into Number of clicks is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Total conversions to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Conversion rate form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Total conversions</strong> takes a plain number with no unit attached. It feeds Conversion rate and Number of clicks. Fill it from a measurement rather than a memory — Total conversions is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of clicks</strong> takes a plain number with no unit attached. It feeds Total conversions and Conversion rate. Fill it from a measurement rather than a memory — Number of clicks is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Conversion rate</strong> is a percent figure. It is computed from Total conversions and Number of clicks, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total conversions</strong> is a plain number. It is computed from Conversion rate and Number of visits, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Number of visits</strong> is a plain number. It is computed from Total conversions and Conversion rate, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Conversion rate</strong> is a percent figure. It is computed from Total conversions and Number of visits, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Conversion rate actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Total conversions and Number of clicks ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Total conversions — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Conversion rate in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Conversion rate is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Total conversions and Number of clicks are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Total conversions and Number of clicks is what you already know and Conversion rate and Total conversions is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/average-fixed-cost">Average fixed cost Calculator</a>, <a href="/finance/avc">Average variable cost Calculator</a> and <a href="/finance/balance-transfer">Balance transfer Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Conversion rate is a number to act on, so the useful question is what to do with Conversion rate (perc), Total conversions and Number of visits once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Total conversions and Number of clicks alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Conversion rate calculator work out?', 'a' => <<<'TXT'
            Conversion rate, Total conversions, Number of visits and Conversion rate, from Total conversions and Number of clicks. The relationship is Conversion rate = 100 × Total conversions ÷ Number of clicks.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Total conversions, Number of clicks. Enter total conversions and number of clicks; Conversion rate is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Conversion rate, Total conversions, Number of clicks and Conversion rate blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Conversion rate is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Total conversions blank and the page solves for it, reporting Conversion rate instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Conversion rate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/average-fixed-cost', 'name' => 'Average fixed cost Calculator'],
            ['path' => '/finance/avc', 'name' => 'Average variable cost Calculator'],
            ['path' => '/finance/balance-transfer', 'name' => 'Balance transfer Calculator'],
        ],
        'authors' => [],
    ],
];
