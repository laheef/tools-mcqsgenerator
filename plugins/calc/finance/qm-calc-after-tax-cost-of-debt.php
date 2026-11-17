<?php

/**
 * After-tax cost of debt
 * /finance/after-tax-cost-of-debt
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'After-tax cost of debt',
    'meta' => ['title' => 'After-tax cost of debt Calculator: Free, With Steps', 'description' => 'After-tax cost of debt takes net income and returns marginal corporate tax rate. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'After-tax cost of debt Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => 'Marginal corporate tax rate',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'net_income',
                            'label' => 'Net income',
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
                            'name' => 'pre_tax_income',
                            'label' => 'Pre-tax income',
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
            'title' => 'After-tax cost of debt',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax_rate',
                            'label' => 'Marginal corporate tax rate',
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
                            'name' => 'after_tax_cod',
                            'label' => 'After-tax cost of debt',
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
                            'name' => 'cost_of_debt',
                            'label' => 'Cost of debt',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'after_tax_cod = cost_of_debt * (1 - tax_rate)',
            'results' => ['tax_rate' => '(-after_tax_cod + cost_of_debt)/cost_of_debt', 'cost_of_debt' => '-after_tax_cod/(tax_rate - 1)', 'after_tax_cod' => 'cost_of_debt*(-tax_rate + 1)'],
        ],
        [
            'title' => 'tax_rate = 1 - (net_income / pre_tax_income)',
            'results' => ['pre_tax_income' => '-net_income/(tax_rate - 1)', 'tax_rate' => '(-net_income + pre_tax_income)/pre_tax_income', 'net_income' => 'pre_tax_income*(-tax_rate + 1)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Marginal corporate tax rate and Cost of debt into After-tax cost of debt and the answer comes back as Net income and Pre-tax income. Nothing is looked up on this page: net income is computed from marginal corporate tax rate and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Net income is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the After-tax cost of debt calculator works', 'html' => <<<'TXT'
            <p>The After-tax cost of debt calculator applies one relationship to 2 numbers and reports Net income, Pre-tax income and After-tax cost of debt.</p><p>In the form&#039;s own words, After-tax cost of debt = Cost of debt × ( − Marginal corporate tax rate + 1).</p><p>The result panel carries Net income, Pre-tax income and After-tax cost of debt, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Marginal corporate tax rate</strong> — in percent</li><li><strong>Cost of debt</strong> — in percent</li></ul><p>What you get back is Net income in USD, Pre-tax income in USD, After-tax cost of debt in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Net income = 10 USD, Pre-tax income = 100 USD, After-tax cost of debt = 1000 perc and Cost of debt = 10 perc; the answers are <strong>Marginal corporate tax rate</strong> = -99 perc.</p><ul><li><strong>Marginal corporate tax rate</strong> = -99 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>After-tax cost of debt</strong> = <code>Cost of debt × ( − Marginal corporate tax rate + 1)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Marginal corporate tax rate</strong> = -99. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on After-tax cost of debt lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>After-tax cost of debt</strong> = <code>Cost of debt × ( − Marginal corporate tax rate + 1)</code></li><li><strong>Marginal corporate tax rate</strong> = <code>( − After-tax cost of debt + Cost of debt) ÷ Cost of debt</code></li><li><strong>Cost of debt</strong> = <code>− After-tax cost of debt ÷ (Marginal corporate tax rate − 1)</code></li><li><strong>Pre-tax income</strong> = <code>− Net income ÷ (Marginal corporate tax rate − 1)</code></li><li><strong>Net income</strong> = <code>Pre-tax income × ( − Marginal corporate tax rate + 1)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>After-tax cost of debt</strong> = <code>Cost of debt × ( − Marginal corporate tax rate + 1)</code> — the form to use when Cost of debt and Marginal corporate tax rate are the values you have.</li><li><strong>Marginal corporate tax rate</strong> = <code>( − After-tax cost of debt + Cost of debt) ÷ Cost of debt</code> — the form to use when After-tax cost of debt and Cost of debt are the values you have.</li><li><strong>Cost of debt</strong> = <code>− After-tax cost of debt ÷ (Marginal corporate tax rate − 1)</code> — the form to use when After-tax cost of debt and Marginal corporate tax rate are the values you have.</li><li><strong>Marginal corporate tax rate</strong> = <code>( − Net income + Pre-tax income) ÷ Pre-tax income</code> — the form to use when Net income and Pre-tax income are the values you have.</li><li><strong>Pre-tax income</strong> = <code>− Net income ÷ (Marginal corporate tax rate − 1)</code> — the form to use when Net income and Marginal corporate tax rate are the values you have.</li><li><strong>Net income</strong> = <code>Pre-tax income × ( − Marginal corporate tax rate + 1)</code> — the form to use when Pre-tax income and Marginal corporate tax rate are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of After-tax cost of debt, Marginal corporate tax rate and Cost of debt can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Net income, from 10 to 20 — and the answers go from <strong>Marginal corporate tax rate</strong> -99 perc to <strong>Marginal corporate tax rate</strong> -99 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Marginal corporate tax rate and Cost of debt carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Net income, Pre-tax income and After-tax cost of debt are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Marginal corporate tax rate left as a guess.</strong> Anything typed into Marginal corporate tax rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Cost of debt left as a guess.</strong> Anything typed into Cost of debt is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Marginal corporate tax rate is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the After-tax cost of debt form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Marginal corporate tax rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Cost of debt, After-tax cost of debt and Pre-tax income. Fill it from a measurement rather than a memory — Marginal corporate tax rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Cost of debt</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Marginal corporate tax rate and After-tax cost of debt. Fill it from a measurement rather than a memory — Cost of debt is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Net income</strong> is a plain number. It is worked out from Pre-tax income and Marginal corporate tax rate. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Pre-tax income</strong> is a plain number. It is worked out from Net income and Marginal corporate tax rate. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>After-tax cost of debt</strong> is a percent figure. It is worked out from Cost of debt and Marginal corporate tax rate. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Marginal corporate tax rate</th></tr></thead><tbody><tr><td><strong>Net income</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Pre-tax income</strong> +10%</td><td>+0%</td></tr><tr><td><strong>After-tax cost of debt</strong> +10%</td><td>-10.1%</td></tr><tr><td><strong>Cost of debt</strong> +10%</td><td>+9.18%</td></tr></tbody></table><p>The steepest column belongs to After-tax cost of debt: ten per cent there moves an answer by about 10.1 per cent, which is why that is the number to measure twice. By contrast, Net income and Pre-tax income barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Net income = 5 USD, Pre-tax income = 50 USD, After-tax cost of debt = 500 perc and Cost of debt = 5 perc and the page reports <strong>Marginal corporate tax rate</strong> = -99 perc.</li><li>Feed in Net income = 30 USD, Pre-tax income = 100 USD, After-tax cost of debt = 1000 perc and Cost of debt = 10 perc and the page reports <strong>Marginal corporate tax rate</strong> = -99 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on After-tax cost of debt actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Net income is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Marginal corporate tax rate and Cost of debt are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Marginal corporate tax rate and Cost of debt is what you already know and Net income and Pre-tax income is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/unlevered-beta">Unlevered beta Calculator</a>, <a href="/finance/unlevered-free-cash-flow">Unlevered free cash flow Calculator</a> and <a href="/finance/unpaid-work">Unpaid work</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the After-tax cost of debt calculator work out?', 'a' => <<<'TXT'
            Net income, Pre-tax income and After-tax cost of debt, from Cost of debt and Marginal corporate tax rate. The relationship is After-tax cost of debt = Cost of debt × ( − Marginal corporate tax rate + 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Marginal corporate tax rate (percent), Cost of debt (percent). With marginal corporate tax rate and cost of debt in place, Net income can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. After-tax cost of debt, Marginal corporate tax rate, Cost of debt and Pre-tax income can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Marginal corporate tax rate = -99 perc. The figures come from Marginal corporate tax rate as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Net income is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Marginal corporate tax rate blank and the page solves for it, reporting Net income instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Net income keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/unlevered-beta', 'name' => 'Unlevered beta Calculator'],
            ['path' => '/finance/unlevered-free-cash-flow', 'name' => 'Unlevered free cash flow Calculator'],
            ['path' => '/finance/unpaid-work', 'name' => 'Unpaid work'],
        ],
        'authors' => [],
    ],
];
