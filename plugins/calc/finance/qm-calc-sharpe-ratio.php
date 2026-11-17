<?php

/**
 * Sharpe ratio
 * /finance/sharpe-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sharpe ratio',
    'meta' => ['title' => 'Sharpe ratio Calculator — Formula, Units & Example', 'description' => 'Sharpe ratio works out risk premium from return on asset or investment and risk free return. Every box can be solved for, not only the one in the title.', 'h1' => 'Sharpe ratio Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'return_asset',
                            'label' => 'Return on asset or investment',
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
                            'name' => 'risk_free_return',
                            'label' => 'Risk free return',
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
                            'name' => 'risk_premium',
                            'label' => 'Risk premium',
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
                            'name' => 'standard_deviation',
                            'label' => 'Standard deviation',
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
                            'name' => 'sharpe_ratio',
                            'label' => 'Sharpe ratio',
                            'type' => 'number',
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
            'title' => 'sharpe_ratio = risk_premium / standard_deviation',
            'results' => ['sharpe_ratio' => 'risk_premium/standard_deviation', 'risk_premium' => 'sharpe_ratio*standard_deviation', 'standard_deviation' => 'risk_premium/sharpe_ratio'],
        ],
        [
            'title' => 'risk_premium = return_asset - risk_free_return',
            'results' => ['return_asset' => 'risk_free_return + risk_premium', 'risk_premium' => 'return_asset - risk_free_return', 'risk_free_return' => 'return_asset - risk_premium'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Sharpe ratio works out Sharpe ratio from Return on asset or investment, Risk free return and Risk premium. There is no hidden constant here: change sharpe ratio and return on asset or investment moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Sharpe ratio calculator works', 'html' => <<<'TXT'
            <p>The Sharpe ratio calculator applies one relationship to 4 numbers and reports Sharpe ratio.</p><p>In the form&#039;s own words, Sharpe ratio = Risk premium ÷ Standard deviation.</p><p>The answers are Sharpe ratio; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Return on asset or investment</strong> — in percent</li><li><strong>Risk free return</strong> — in percent</li><li><strong>Risk premium</strong> — in percent</li><li><strong>Standard deviation</strong> — in percent</li></ul><p>What you get back is Sharpe ratio, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Return on asset or investment = 10 perc, Risk free return = 100 perc and Standard deviation = 1000 perc — through the same formula and the panel reports <strong>Risk premium</strong> = -90 perc and <strong>Sharpe ratio</strong> = -0.09.</p><ul><li><strong>Risk premium</strong> = -90 perc</li><li><strong>Sharpe ratio</strong> = -0.09</li></ul><p>That is <strong>Sharpe ratio</strong> = <code>Risk premium ÷ Standard deviation</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Risk premium</strong> = -90 and <strong>Sharpe ratio</strong> = -0.09. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Return on asset or investment lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Sharpe ratio</strong> = <code>Risk premium ÷ Standard deviation</code></li><li><strong>Risk premium</strong> = <code>Sharpe ratio × Standard deviation</code></li><li><strong>Standard deviation</strong> = <code>Risk premium ÷ Sharpe ratio</code></li><li><strong>Return on asset or investment</strong> = <code>Risk free return + Risk premium</code></li><li><strong>Risk free return</strong> = <code>Return on asset or investment − Risk premium</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Sharpe ratio</strong> = <code>Risk premium ÷ Standard deviation</code> — the form to use when Risk premium and Standard deviation are the values you have.</li><li><strong>Risk premium</strong> = <code>Sharpe ratio × Standard deviation</code> — the form to use when Sharpe ratio and Standard deviation are the values you have.</li><li><strong>Standard deviation</strong> = <code>Risk premium ÷ Sharpe ratio</code> — the form to use when Risk premium and Sharpe ratio are the values you have.</li><li><strong>Risk premium</strong> = <code>Return on asset or investment − Risk free return</code> — the form to use when Return on asset or investment and Risk free return are the values you have.</li><li><strong>Return on asset or investment</strong> = <code>Risk free return + Risk premium</code> — the form to use when Risk free return and Risk premium are the values you have.</li><li><strong>Risk free return</strong> = <code>Return on asset or investment − Risk premium</code> — the form to use when Return on asset or investment and Risk premium are the values you have.</li></ul><p>Any one of Sharpe ratio, Risk premium and Standard deviation can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Return on asset or investment from 10 to 20, leaving every other box alone. The panel moves from <strong>Risk premium</strong> -90 perc and <strong>Sharpe ratio</strong> -0.09 to <strong>Risk premium</strong> -80 perc and <strong>Sharpe ratio</strong> -0.08.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Return on asset or investment, Risk free return and Risk premium carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Sharpe ratio is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Return on asset or investment left as a guess.</strong> Anything typed into Return on asset or investment is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Risk free return left as a guess.</strong> Anything typed into Risk free return is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Return on asset or investment is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Sharpe ratio form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Return on asset or investment</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Risk premium and Risk free return. Fill it from a measurement rather than a memory — Return on asset or investment is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Risk free return</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Return on asset or investment and Risk premium. Fill it from a measurement rather than a memory — Risk free return is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Risk premium</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Sharpe ratio, Standard deviation and Return on asset or investment. Fill it from a measurement rather than a memory — Risk premium is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Standard deviation</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Sharpe ratio and Risk premium. Fill it from a measurement rather than a memory — Standard deviation is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Sharpe ratio</strong> is a plain number and the page's own defaults put it at -0.09. It is worked out from Risk premium and Standard deviation. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Risk premium</th><th>Sharpe ratio</th></tr></thead><tbody><tr><td><strong>Return on asset or investment</strong> +10%</td><td>+1.11%</td><td>+1.11%</td></tr><tr><td><strong>Risk free return</strong> +10%</td><td>-11.11%</td><td>-11.11%</td></tr><tr><td><strong>Standard deviation</strong> +10%</td><td>+0%</td><td>+9.09%</td></tr></tbody></table><p>The steepest column belongs to Risk free return: ten per cent there moves an answer by about 11.1 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Return on asset or investment = 5 perc, Risk free return = 50 perc and Standard deviation = 500 perc and the page reports <strong>Risk premium</strong> = -45 perc and <strong>Sharpe ratio</strong> = -0.09.</li><li>Feed in Return on asset or investment = 30 perc, Risk free return = 100 perc and Standard deviation = 1000 perc and the page reports <strong>Risk premium</strong> = -70 perc and <strong>Sharpe ratio</strong> = -0.07.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Sharpe ratio actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Sharpe ratio is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Return on asset or investment, Risk free return and Risk premium measured, Sharpe ratio wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/parking-ratio">Parking ratio Calculator</a>, <a href="/finance/partially-amortized-loan">Partially amortized loan</a> and <a href="/finance/pay-raise">Pay raise Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sharpe ratio calculator work out?', 'a' => 'Sharpe ratio, from Risk premium and Standard deviation. The relationship is Sharpe ratio = Risk premium ÷ Standard deviation.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Return on asset or investment (percent), Risk free return (percent), Risk premium (percent), Standard deviation (percent). Fill return on asset or investment, risk free return and risk premium and leave Sharpe ratio empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Sharpe ratio, Risk premium, Standard deviation and Return on asset or investment blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Risk premium = -90 perc and Sharpe ratio = -0.09. The figures come from Return on asset or investment as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Sharpe ratio is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Return on asset or investment blank and the page solves for it, reporting Sharpe ratio instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Sharpe ratio keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/parking-ratio', 'name' => 'Parking ratio Calculator'],
            ['path' => '/finance/partially-amortized-loan', 'name' => 'Partially amortized loan'],
            ['path' => '/finance/pay-raise', 'name' => 'Pay raise Calculator'],
        ],
        'authors' => [],
    ],
];
