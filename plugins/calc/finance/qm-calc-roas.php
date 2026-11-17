<?php

/**
 * ROAS
 * /finance/roas
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'ROAS',
    'meta' => ['title' => 'ROAS Calculator — Free, With Worked Examples', 'description' => 'ROAS works out ad revenue target from ad spend and do you know your revenue?. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'ROAS Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'Return on ad spend (ROAS)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ad_spend',
                            'label' => 'Ad spend',
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
                            'name' => 'knowRevenue',
                            'label' => 'Do you know your revenue?',
                            'type' => 'select',
                            'options' => ['Yes' => '0', 'No' => '1'],
                            'dataset' => 'reveune_options',
                            'default' => 'Yes',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'adRevenue',
                            'label' => 'Ad revenue',
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
                            'name' => 'adRevenue_target',
                            'label' => 'Ad revenue target',
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
                            'name' => 'roas',
                            'label' => 'ROAS',
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
                            'name' => 'roas_target',
                            'label' => 'ROAS target',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'roas >= 8 and knowRevenue == 0', 'text' => ' Nice work! Your ROAS is {{roas.formattedValue}}%. If you\'re getting over 800% ROAS, you\'re probably in a good spot!&nbsp;'],
                                ['when' => 'roas >= 4 and roas < 8 and knowRevenue == 0', 'text' => ' Your ROAS is {{roas.formattedValue}}%. This is not great but it\'s fair. You need to make more than you spend on ads. You should aim for 800%.&nbsp;'],
                                ['when' => 'roas < 4 and roas > 0 and knowRevenue == 0', 'text' => <<<'TXT'
                                 Danger! Your ROAS is {{roas.formattedValue}}%. This is not good. You need to make more than you spend on ads. If you are receiving any less than 400% ROAS, you may be losing money.&nbsp;
                                TXT],
                                ['when' => 'roas_target and knowRevenue == 1', 'text' => ' You should aim for ${{adRevenue_target.formattedValue}}. If you\'re getting over 800% ROAS, you\'re probably in a good spot!'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => ' Turn ad spend into clear profit projections. Type a quick prompt  embed a custom, interactive tool into your agency portal.&nbsp;'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Return on investment (ROI)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'profit_margin',
                            'label' => 'Profit margin',
                            'type' => 'number',
                            'help' => 'Profit margin on ad spend to calculate ROI.',
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
                            'name' => 'return_on_investment',
                            'label' => 'Return on Investment (ROI)',
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
            'title' => 'roas = adRevenue / ad_spend',
            'results' => ['ad_spend' => 'adRevenue/roas', 'adRevenue' => 'ad_spend*roas', 'roas' => 'adRevenue/ad_spend'],
        ],
        [
            'title' => 'return_on_investment = profit_margin - ad_spend',
            'results' => ['ad_spend' => 'profit_margin - return_on_investment', 'profit_margin' => 'ad_spend + return_on_investment', 'return_on_investment' => '-ad_spend + profit_margin'],
        ],
        [
            'title' => 'roas_target = ad_spend*0.8',
            'results' => ['ad_spend' => '(5/4)*roas_target', 'roas_target' => '(4/5)*ad_spend'],
        ],
        [
            'title' => 'adRevenue_target = ad_spend*8',
            'results' => ['ad_spend' => '(1/8)*adRevenue_target', 'adRevenue_target' => '8*ad_spend'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Ad spend and Ad revenue into ROAS and the answer comes back as Ad revenue target and ROAS. It is a single relationship that reads ad revenue target out of ad spend, not a table of canned results keyed by them. Units for Ad revenue target default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the ROAS calculator works', 'html' => <<<'TXT'
            <p>The ROAS calculator applies one relationship to 2 numbers and reports Ad revenue target, ROAS and ROAS target.</p><p>In the form&#039;s own words, ROAS = Ad revenue ÷ Ad spend.</p><p>What comes back is Ad revenue target, ROAS, ROAS target and Profit margin — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Ad spend</strong> — in USD</li><li><strong>Ad revenue</strong> — in USD</li></ul><p>What you get back is Ad revenue target in USD, ROAS in percent, ROAS target in percent, Profit margin in USD, Return on Investment (ROI) in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on ROAS lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>ROAS</strong> = <code>Ad revenue ÷ Ad spend</code></li><li><strong>Ad spend</strong> = <code>Ad revenue ÷ ROAS</code></li><li><strong>Ad revenue</strong> = <code>Ad spend × ROAS</code></li><li><strong>Return on Investment (ROI)</strong> = <code>− Ad spend + Profit margin</code></li><li><strong>Profit margin</strong> = <code>Ad spend + Return on Investment (ROI)</code></li><li><strong>ROAS target</strong> = <code>(4 ÷ 5) × Ad spend</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>ROAS</strong> = <code>Ad revenue ÷ Ad spend</code> — the form to use when Ad revenue and Ad spend are the values you have.</li><li><strong>Ad spend</strong> = <code>Ad revenue ÷ ROAS</code> — the form to use when Ad revenue and ROAS are the values you have.</li><li><strong>Ad revenue</strong> = <code>Ad spend × ROAS</code> — the form to use when Ad spend and ROAS are the values you have.</li><li><strong>Return on Investment (ROI)</strong> = <code>− Ad spend + Profit margin</code> — the form to use when Ad spend and Profit margin are the values you have.</li><li><strong>Ad spend</strong> = <code>Profit margin − Return on Investment (ROI)</code> — the form to use when Profit margin and Return on Investment (ROI) are the values you have.</li><li><strong>Profit margin</strong> = <code>Ad spend + Return on Investment (ROI)</code> — the form to use when Ad spend and Return on Investment (ROI) are the values you have.</li><li><strong>ROAS target</strong> = <code>(4 ÷ 5) × Ad spend</code> — the form to use when Ad spend are the values you have.</li><li><strong>Ad spend</strong> = <code>(5 ÷ 4) × ROAS target</code> — the form to use when ROAS target are the values you have.</li></ul><p>Any one of ROAS, Ad spend and Ad revenue can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Ad revenue target, ROAS and ROAS target are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Ad spend left as a guess.</strong> Anything typed into Ad spend is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Ad revenue left as a guess.</strong> Anything typed into Ad revenue is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Ad spend and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the ROAS form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Ad spend</strong> takes a plain number with no unit attached. Change it and Ad revenue, ROAS and Profit margin changes with it. Fill it from a measurement rather than a memory — Ad spend is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Ad revenue</strong> takes a plain number with no unit attached. Change it and Ad spend and ROAS changes with it. Fill it from a measurement rather than a memory — Ad revenue is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Ad revenue target</strong> is a plain number. The value follows from Ad spend. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>ROAS</strong> is a percent figure. The value follows from Ad revenue and Ad spend. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>ROAS target</strong> is a percent figure. The value follows from Ad spend. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Profit margin</strong> is a plain number. The value follows from Ad spend and Return on Investment (ROI). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Return on Investment (ROI)</strong> is a plain number. The value follows from Ad spend and Profit margin. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on ROAS actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Ad spend and Ad revenue ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Ad spend — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Ad revenue target in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Ad revenue target is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Ad spend and Ad revenue measured, Ad revenue target and ROAS wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/online-marketing-roi">Conversion rate Calculator</a>, <a href="/finance/cost-function">Cost function</a> and <a href="/finance/cost-of-capital">Cost of capital Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the ROAS calculator work out?', 'a' => 'Ad revenue target, ROAS, ROAS target and Profit margin, from Ad revenue and Ad spend. The relationship is ROAS = Ad revenue ÷ Ad spend.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Ad spend (USD), Ad revenue (USD). With ad spend and ad revenue in place, Ad revenue target can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of ROAS, Ad spend, Ad revenue and Return on Investment (ROI) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Ad revenue target is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Ad spend blank and the page solves for it, reporting Ad revenue target instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Ad revenue target keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/online-marketing-roi', 'name' => 'Conversion rate Calculator'],
            ['path' => '/finance/cost-function', 'name' => 'Cost function'],
            ['path' => '/finance/cost-of-capital', 'name' => 'Cost of capital Calculator'],
        ],
        'authors' => [],
    ],
];
