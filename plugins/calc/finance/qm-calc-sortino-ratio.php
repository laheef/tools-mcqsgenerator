<?php

/**
 * Sortino ratio
 * /finance/sortino-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sortino ratio',
    'meta' => ['title' => 'Sortino ratio Calculator — Formula & Results', 'description' => 'Enter Risk free rate (Rf) and Average return on asset #1 (Ra) and get sortino ratio #1 back. Every box can be solved for, not only the one in the title.', 'h1' => 'Sortino ratio Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'risk_free_rate',
                            'label' => 'Risk free rate (Rf)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Asset #1',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'average_return_1',
                            'label' => 'Average return on asset #1 (Ra)',
                            'type' => 'number',
                            'help' => 'You can calculate it by taking the historical daily, weekly, monthly, or yearly returns and averaging them.',
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
                            'name' => 'standard_deviation_1',
                            'label' => 'Standard deviation of the downside #1',
                            'type' => 'number',
                            'help' => 'Pick the negative returns and calculate its standard deviation. Replace the positive returns by 0.',
                            'rounding' => ['standard', '5'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sortino_1',
                            'label' => 'Sortino ratio #1',
                            'type' => 'number',
                            'help' => 'The Sortino ratio indicates how much extra returns you are profiting by taking a unit of risk.',
                            'rounding' => ['standard', '5'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'sortino_1 > 0 and sortino_1 <= 1', 'text' => 'It\'s not a great Sortino ratio. Check our return on capital employed calculator to verify whether your company is a worthy investment.'],
                                ['when' => 'sortino_1 > 1and sortino_1 < 2', 'text' => 'Looks like a good Sortino ratio. Check our revenue growth calculator to verify if the company is still growing.'],
                                ['when' => 'sortino_1 >=2 and sortino_1 < 3', 'text' => 'Wow! That\'s an excellent Sortino ratio. Check our free cash flow calculator to verify the company is solid.'],
                                ['when' => 'sortino_1 >=3', 'text' => 'Amazing Sortino ratio. Please email us this Stock . To get its fair price, check our discounted cash flow calculator.'],
                                ['when' => 'hasValue(sortino_1)', 'text' => 'Open the next section of the calculator to compare this result with a different stock.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Asset #2',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'average_return_2',
                            'label' => 'Average return on asset #2 (Ra)',
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
                            'name' => 'standard_deviation_2',
                            'label' => 'Standard deviation of the downside #2',
                            'type' => 'number',
                            'rounding' => ['standard', '5'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sortino_2',
                            'label' => 'Sortino ratio #2',
                            'type' => 'number',
                            'rounding' => ['standard', '5'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'sortino_2 > 0 and sortino_2 <= 1', 'text' => 'It\'s not a great Sortino ratio. Check our return on capital employed calculator to verify whether your company is a worthy investment.&nbsp;'],
                                ['when' => 'sortino_2 > 1and sortino_2 < 2', 'text' => 'Looks like a good Sortino ratio. Check our revenue growth calculator to verify if the company is still growing.&nbsp;'],
                                ['when' => 'sortino_2 >=2 and sortino_2 < 3', 'text' => 'Wow! That is an excellent Sortino ratio. Check our free cash flow calculator to verify the company is solid.&nbsp;'],
                                ['when' => 'sortino_2 >=3', 'text' => 'Amazing Sortino ratio. Please email us this Stock . To get its fair price, check our discounted cash flow calculator.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'sortino_1 > sortino_2', 'text' => 'Asset #1 provides better returns given its risk compared to Asset #2. It might be a good investment.&nbsp;'],
                                ['when' => 'sortino_2 > sortino_1', 'text' => 'Asset #2 provides better returns given its risk compared to Asset #1. It might be a good investment.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'sortino_1= (average_return_1 - risk_free_rate)/standard_deviation_1',
            'results' => ['standard_deviation_1' => '(average_return_1 - risk_free_rate)/sortino_1', 'risk_free_rate' => 'average_return_1 - sortino_1*standard_deviation_1', 'sortino_1' => '(average_return_1 - risk_free_rate)/standard_deviation_1', 'average_return_1' => 'risk_free_rate + sortino_1*standard_deviation_1'],
        ],
        [
            'title' => 'sortino_2= (average_return_2 - risk_free_rate)/standard_deviation_2',
            'results' => ['average_return_2' => 'risk_free_rate + sortino_2*standard_deviation_2', 'risk_free_rate' => 'average_return_2 - sortino_2*standard_deviation_2', 'sortino_2' => '(average_return_2 - risk_free_rate)/standard_deviation_2', 'standard_deviation_2' => '(average_return_2 - risk_free_rate)/sortino_2'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Sortino ratio works out Sortino ratio #1 and Average return on asset #2 (Ra) from Risk free rate (Rf), Average return on asset #1 (Ra) and Standard deviation of the downside #1. The arithmetic is the whole method: sortino ratio #1 is worked out from risk free rate (Rf) by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Sortino ratio calculator works', 'html' => <<<'TXT'
            <p>Sortino ratio answers one question from 3 numbers, and the answer is Sortino ratio #1, Average return on asset #2 (Ra) and Standard deviation of the downside #2.</p><p>In the form&#039;s own words, Sortino ratio #1 = (Average return on asset #1 (Ra) − Risk free rate (Rf)) ÷ Standard deviation of the downside #1.</p><p>What comes back is Sortino ratio #1, Average return on asset #2 (Ra), Standard deviation of the downside #2 and Sortino ratio #2 — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Risk free rate (Rf)</strong> — in percent</li><li><strong>Average return on asset #1 (Ra)</strong> — in percent. You can calculate it by taking the historical daily, weekly, monthly, or yearly returns and averaging them.</li><li><strong>Standard deviation of the downside #1</strong> — a plain number, no unit. Pick the negative returns and calculate its standard deviation. Replace the positive returns by 0.</li></ul><p>The answers come back as Sortino ratio #1, Average return on asset #2 (Ra) in percent, Standard deviation of the downside #2, Sortino ratio #2. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Risk free rate (Rf) = 10 perc, Average return on asset #1 (Ra) = 100 perc, Standard deviation of the downside #1 = 1000, Average return on asset #2 (Ra) = 10 perc, Standard deviation of the downside #2 = 100 and Sortino ratio #2 = 1000 gives <strong>Sortino ratio #1</strong> = 0.09.</p><ul><li><strong>Sortino ratio #1</strong> = 0.09</li></ul><p>The line behind those figures is <strong>Sortino ratio #1</strong> = <code>(Average return on asset #1 (Ra) − Risk free rate (Rf)) ÷ Standard deviation of the downside #1</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Sortino ratio #1</strong> = 0.09. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Average return on asset #2 (Ra) lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Sortino ratio #1</strong> = <code>(Average return on asset #1 (Ra) − Risk free rate (Rf)) ÷ Standard deviation of the downside #1</code></li><li><strong>Standard deviation of the downside #1</strong> = <code>(Average return on asset #1 (Ra) − Risk free rate (Rf)) ÷ Sortino ratio #1</code></li><li><strong>Risk free rate (Rf)</strong> = <code>Average return on asset #1 (Ra) − Sortino ratio #1 × Standard deviation of the downside #1</code></li><li><strong>Average return on asset #1 (Ra)</strong> = <code>Risk free rate (Rf) + Sortino ratio #1 × Standard deviation of the downside #1</code></li><li><strong>Sortino ratio #2</strong> = <code>(Average return on asset #2 (Ra) − Risk free rate (Rf)) ÷ Standard deviation of the downside #2</code></li><li><strong>Average return on asset #2 (Ra)</strong> = <code>Risk free rate (Rf) + Sortino ratio #2 × Standard deviation of the downside #2</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Sortino ratio #1</strong> = <code>(Average return on asset #1 (Ra) − Risk free rate (Rf)) ÷ Standard deviation of the downside #1</code> — the form to use when Average return on asset #1 (Ra), Risk free rate (Rf) and Standard deviation of the downside #1 are the values you have.</li><li><strong>Standard deviation of the downside #1</strong> = <code>(Average return on asset #1 (Ra) − Risk free rate (Rf)) ÷ Sortino ratio #1</code> — the form to use when Average return on asset #1 (Ra), Risk free rate (Rf) and Sortino ratio #1 are the values you have.</li><li><strong>Risk free rate (Rf)</strong> = <code>Average return on asset #1 (Ra) − Sortino ratio #1 × Standard deviation of the downside #1</code> — the form to use when Average return on asset #1 (Ra), Sortino ratio #1 and Standard deviation of the downside #1 are the values you have.</li><li><strong>Average return on asset #1 (Ra)</strong> = <code>Risk free rate (Rf) + Sortino ratio #1 × Standard deviation of the downside #1</code> — the form to use when Risk free rate (Rf), Sortino ratio #1 and Standard deviation of the downside #1 are the values you have.</li><li><strong>Sortino ratio #2</strong> = <code>(Average return on asset #2 (Ra) − Risk free rate (Rf)) ÷ Standard deviation of the downside #2</code> — the form to use when Average return on asset #2 (Ra), Risk free rate (Rf) and Standard deviation of the downside #2 are the values you have.</li><li><strong>Average return on asset #2 (Ra)</strong> = <code>Risk free rate (Rf) + Sortino ratio #2 × Standard deviation of the downside #2</code> — the form to use when Risk free rate (Rf), Sortino ratio #2 and Standard deviation of the downside #2 are the values you have.</li><li><strong>Risk free rate (Rf)</strong> = <code>Average return on asset #2 (Ra) − Sortino ratio #2 × Standard deviation of the downside #2</code> — the form to use when Average return on asset #2 (Ra), Sortino ratio #2 and Standard deviation of the downside #2 are the values you have.</li><li><strong>Standard deviation of the downside #2</strong> = <code>(Average return on asset #2 (Ra) − Risk free rate (Rf)) ÷ Sortino ratio #2</code> — the form to use when Average return on asset #2 (Ra), Risk free rate (Rf) and Sortino ratio #2 are the values you have.</li></ul><p>Any one of Sortino ratio #1, Standard deviation of the downside #1 and Risk free rate (Rf) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Risk free rate (Rf), from 10 to 20 — and the answers go from <strong>Sortino ratio #1</strong> 0.09 to <strong>Sortino ratio #1</strong> 0.08.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Risk free rate (Rf) and Average return on asset #1 (Ra) carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Sortino ratio #1, Average return on asset #2 (Ra) and Standard deviation of the downside #2 are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Risk free rate (Rf) left as a guess.</strong> Anything typed into Risk free rate (Rf) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Average return on asset #1 (Ra) left as a guess.</strong> Anything typed into Average return on asset #1 (Ra) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Risk free rate (Rf) to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Sortino ratio form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Risk free rate (Rf)</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Standard deviation of the downside #1, Sortino ratio #1 and Average return on asset #1 (Ra) changes with it. Fill it from a measurement rather than a memory — Risk free rate (Rf) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Average return on asset #1 (Ra)</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. You can calculate it by taking the historical daily, weekly, monthly, or yearly returns and averaging them. Change it and Standard deviation of the downside #1, Risk free rate (Rf) and Sortino ratio #1 changes with it. Fill it from a measurement rather than a memory — Average return on asset #1 (Ra) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Standard deviation of the downside #1</strong> takes a plain number with no unit attached. Pick the negative returns and calculate its standard deviation. Replace the positive returns by 0. Change it and Risk free rate (Rf), Sortino ratio #1 and Average return on asset #1 (Ra) changes with it. Fill it from a measurement rather than a memory — Standard deviation of the downside #1 is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Sortino ratio #1</strong> is a plain number and the page's own defaults put it at 0.09. It is computed from Average return on asset #1 (Ra), Risk free rate (Rf) and Standard deviation of the downside #1, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Average return on asset #2 (Ra)</strong> is a percent figure. It is computed from Risk free rate (Rf), Sortino ratio #2 and Standard deviation of the downside #2, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Standard deviation of the downside #2</strong> is a plain number. It is computed from Average return on asset #2 (Ra), Risk free rate (Rf) and Sortino ratio #2, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Sortino ratio #2</strong> is a plain number. It is computed from Average return on asset #2 (Ra), Risk free rate (Rf) and Standard deviation of the downside #2, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Sortino ratio #1 is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Risk free rate (Rf), Average return on asset #1 (Ra) and Standard deviation of the downside #1 measured, Sortino ratio #1 and Average return on asset #2 (Ra) wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/markdown">Markdown Calculator</a>, <a href="/finance/market-capitalization">Market capitalization Calculator</a> and <a href="/finance/mva">Market value added (MVA) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sortino ratio calculator work out?', 'a' => <<<'TXT'
            Sortino ratio #1, Average return on asset #2 (Ra), Standard deviation of the downside #2 and Sortino ratio #2, from Average return on asset #1 (Ra), Risk free rate (Rf) and Standard deviation of the downside #1. The relationship is Sortino ratio #1 = (Average return on asset #1 (Ra) − Risk free rate (Rf)) ÷ Standard deviation of the downside #1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Risk free rate (Rf) (percent), Average return on asset #1 (Ra) (percent), Standard deviation of the downside #1. Fill risk free rate (Rf), average return on asset #1 (Ra) and standard deviation of the downside #1 and leave Sortino ratio #1 empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Sortino ratio #1, Standard deviation of the downside #1, Risk free rate (Rf) and Average return on asset #1 (Ra) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Sortino ratio #1 = 0.09. The figures come from Risk free rate (Rf) as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Sortino ratio #1 is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Risk free rate (Rf) blank and the page solves for it, reporting Sortino ratio #1 instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Sortino ratio #1 at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/markdown', 'name' => 'Markdown Calculator'],
            ['path' => '/finance/market-capitalization', 'name' => 'Market capitalization Calculator'],
            ['path' => '/finance/mva', 'name' => 'Market value added (MVA) Calculator'],
        ],
        'authors' => [],
    ],
];
