<?php

/**
 * GDP
 * /finance/gdp
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'GDP',
    'meta' => ['title' => 'GDP Calculator — Free, With Worked Examples', 'description' => 'GDP works out net exports and gross domestic product from consumption and investment. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'GDP Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Consumption',
                            'label' => 'Consumption',
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
                            'name' => 'Investment',
                            'label' => 'Investment',
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
                            'name' => 'Government_purchases',
                            'label' => 'Government purchases',
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
                            'name' => 'Exports',
                            'label' => 'Exports',
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
                            'name' => 'Imports',
                            'label' => 'Imports',
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
                            'name' => 'Net_exports',
                            'label' => 'Net exports',
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
                            'name' => 'Gross_domestic_product',
                            'label' => 'Gross domestic product',
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
    ],
    'formula' => [
        [
            'title' => 'Gross_domestic_product = Consumption + Investment + Government_purchases + Net_exports',
            'results' => [
                'Net_exports' => '-Consumption - Government_purchases + Gross_domestic_product - Investment',
                'Consumption' => '-Government_purchases + Gross_domestic_product - Investment - Net_exports',
                'Gross_domestic_product' => 'Consumption + Government_purchases + Investment + Net_exports',
                'Government_purchases' => '-Consumption + Gross_domestic_product - Investment - Net_exports',
                'Investment' => '-Consumption - Government_purchases + Gross_domestic_product - Net_exports',
            ],
        ],
        [
            'title' => 'Net_exports = Exports - Imports',
            'results' => ['Exports' => 'Imports + Net_exports', 'Imports' => 'Exports - Net_exports', 'Net_exports' => 'Exports - Imports'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Consumption, Investment and Government purchases into GDP and the answer comes back as Exports and Imports. It is a single relationship that reads exports out of consumption, not a table of canned results keyed by them. Units for Exports default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the GDP calculator works', 'html' => <<<'TXT'
            <p>The GDP calculator applies one relationship to 4 numbers and reports Exports, Imports and Gross domestic product.</p><p>Written with the labels from the form, Gross domestic product = Consumption + Government purchases + Investment + Net exports.</p><p>The answers are Exports, Imports and Gross domestic product; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Consumption</strong> — in USD</li><li><strong>Investment</strong> — in USD</li><li><strong>Government purchases</strong> — in USD</li><li><strong>Net exports</strong> — in USD</li></ul><p>The answers come back as Exports in USD, Imports in USD, Gross domestic product in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Consumption = 10 USD, Investment = 100 USD, Government purchases = 1000 USD, Exports = 10 USD, Imports = 100 USD and Gross domestic product = 1000 USD; the answers are <strong>Net exports</strong> = -110 USD.</p><ul><li><strong>Net exports</strong> = -110 USD</li></ul><p>That is <strong>Gross domestic product</strong> = <code>Consumption + Government purchases + Investment + Net exports</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Net exports</strong> = -110. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Exports is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Gross domestic product</strong> = <code>Consumption + Government purchases + Investment + Net exports</code></li><li><strong>Net exports</strong> = <code>− Consumption − Government purchases + Gross domestic product − Investment</code></li><li><strong>Consumption</strong> = <code>− Government purchases + Gross domestic product − Investment − Net exports</code></li><li><strong>Government purchases</strong> = <code>− Consumption + Gross domestic product − Investment − Net exports</code></li><li><strong>Investment</strong> = <code>− Consumption − Government purchases + Gross domestic product − Net exports</code></li><li><strong>Exports</strong> = <code>Imports + Net exports</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Gross domestic product</strong> = <code>Consumption + Government purchases + Investment + Net exports</code> — the form to use when Consumption, Government purchases, Investment and Net exports are the values you have.</li><li><strong>Net exports</strong> = <code>− Consumption − Government purchases + Gross domestic product − Investment</code> — the form to use when Consumption, Government purchases, Gross domestic product and Investment are the values you have.</li><li><strong>Consumption</strong> = <code>− Government purchases + Gross domestic product − Investment − Net exports</code> — the form to use when Government purchases, Gross domestic product, Investment and Net exports are the values you have.</li><li><strong>Government purchases</strong> = <code>− Consumption + Gross domestic product − Investment − Net exports</code> — the form to use when Consumption, Gross domestic product, Investment and Net exports are the values you have.</li><li><strong>Investment</strong> = <code>− Consumption − Government purchases + Gross domestic product − Net exports</code> — the form to use when Consumption, Government purchases, Gross domestic product and Net exports are the values you have.</li><li><strong>Net exports</strong> = <code>Exports − Imports</code> — the form to use when Exports and Imports are the values you have.</li><li><strong>Exports</strong> = <code>Imports + Net exports</code> — the form to use when Imports and Net exports are the values you have.</li><li><strong>Imports</strong> = <code>Exports − Net exports</code> — the form to use when Exports and Net exports are the values you have.</li></ul><p>Any one of Gross domestic product, Net exports and Consumption can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Consumption from 10 to 20, leaving every other box alone. The panel moves from <strong>Net exports</strong> -110 USD to <strong>Net exports</strong> -120 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Exports, Imports and Gross domestic product are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Consumption left as a guess.</strong> Anything typed into Consumption is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Investment left as a guess.</strong> Anything typed into Investment is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Government purchases left as a guess.</strong> Anything typed into Government purchases is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Consumption and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the GDP form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Consumption</strong> takes a plain number with no unit attached. It feeds Net exports, Gross domestic product and Government purchases. Fill it from a measurement rather than a memory — Consumption is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Investment</strong> takes a plain number with no unit attached. It feeds Net exports, Consumption and Gross domestic product. Fill it from a measurement rather than a memory — Investment is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Government purchases</strong> takes a plain number with no unit attached. It feeds Net exports, Consumption and Gross domestic product. Fill it from a measurement rather than a memory — Government purchases is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Net exports</strong> takes a plain number with no unit attached. It feeds Consumption, Gross domestic product and Government purchases. Fill it from a measurement rather than a memory — Net exports is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Exports</strong> is a plain number. It is worked out from Imports and Net exports. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Imports</strong> is a plain number. It is worked out from Exports and Net exports. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Gross domestic product</strong> is a plain number. It is worked out from Consumption, Government purchases, Investment and Net exports. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Net exports</th></tr></thead><tbody><tr><td><strong>Consumption</strong> +10%</td><td>-0.91%</td></tr><tr><td><strong>Investment</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Government purchases</strong> +10%</td><td>-90.91%</td></tr><tr><td><strong>Exports</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Imports</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Gross domestic product</strong> +10%</td><td>+90.91%</td></tr></tbody></table><p>The steepest column belongs to Government purchases: ten per cent there moves an answer by about 90.9 per cent, which is why that is the number to measure twice. By contrast, Exports and Imports barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Consumption = 5 USD, Investment = 50 USD, Government purchases = 500 USD, Exports = 5 USD, Imports = 50 USD and Gross domestic product = 500 USD and the page reports <strong>Net exports</strong> = -55 USD.</li><li>Feed in Consumption = 30 USD, Investment = 100 USD, Government purchases = 1000 USD, Exports = 10 USD, Imports = 100 USD and Gross domestic product = 1000 USD and the page reports <strong>Net exports</strong> = -130 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Exports is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Consumption, Investment and Government purchases measured, Exports and Imports wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/future-salary">Future salary Calculator</a>, <a href="/finance/annuity-future-value">Future value of annuity</a> and <a href="/finance/future-value">Future value</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the GDP calculator work out?', 'a' => <<<'TXT'
            Exports, Imports and Gross domestic product, from Consumption, Government purchases, Investment and Net exports. The relationship is Gross domestic product = Consumption + Government purchases + Investment + Net exports.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Consumption (USD), Investment (USD), Government purchases (USD), Net exports (USD). With consumption, investment and government purchases in place, Exports can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Gross domestic product, Net exports, Consumption and Government purchases blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Net exports = -110 USD. That comes from the page\'s own defaults, entered in Consumption; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Exports is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Consumption blank and the page solves for it, reporting Exports instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Exports keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/future-salary', 'name' => 'Future salary Calculator'],
            ['path' => '/finance/annuity-future-value', 'name' => 'Future value of annuity'],
            ['path' => '/finance/future-value', 'name' => 'Future value'],
        ],
        'authors' => [],
    ],
];
