<?php

/**
 * NSFR
 * /finance/nsfr
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'NSFR',
    'meta' => ['title' => 'NSFR Calculator — Free, With Worked Examples', 'description' => 'NSFR works out available stable funding from regulatory capital and stable demand deposits. Results come back in USD, with any other unit a click away.', 'h1' => 'NSFR Calculator', 'updated' => '2024-07-14'],
    'sections' => [
        [
            'title' => 'Calculate available stable funding',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'capital',
                            'label' => 'Regulatory capital',
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
                            'name' => 'stable_deposits',
                            'label' => 'Stable demand deposits',
                            'type' => 'number',
                            'help' => 'Deposits from retails and small business customers.',
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
                            'name' => 'less_stable_deposits',
                            'label' => 'Less stable demand deposits',
                            'type' => 'number',
                            'help' => 'Deposits from retails and small business customers.',
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
                            'name' => 'corporations_fund',
                            'label' => 'Funding from corporations',
                            'type' => 'number',
                            'help' => 'Funding from corporates, banks, and the public sector.',
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
            'title' => 'Net stable funding ratio',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ava_stable_funding',
                            'label' => 'Available stable funding',
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
                            'name' => 'req_stable_funding',
                            'label' => 'Required stable funding',
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
                            'name' => 'NSFR',
                            'label' => 'NSFR',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'NSFR<1', 'text' => 'The bank does not have enough stable funding to meet the required stable funding. The bank may face legal and liquidity issues. '],
                                ['when' => 'NSFR>= 1', 'text' => 'The bank has enough stable funding to meet the required stable funding. '],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'NSFR = ava_stable_funding / req_stable_funding',
            'results' => ['NSFR' => 'ava_stable_funding/req_stable_funding', 'req_stable_funding' => 'ava_stable_funding/NSFR', 'ava_stable_funding' => 'NSFR*req_stable_funding'],
        ],
        [
            'title' => 'ava_stable_funding = capital + stable_deposits * 0.95 + less_stable_deposits * 0.9 + corporations_fund * 0.5',
            'results' => [
                'capital' => 'ava_stable_funding - 1/2*corporations_fund - 9/10*less_stable_deposits - 19/20*stable_deposits',
                'corporations_fund' => '2*ava_stable_funding - 2*capital - 9/5*less_stable_deposits - 19/10*stable_deposits',
                'stable_deposits' => '(20/19)*ava_stable_funding - 20/19*capital - 10/19*corporations_fund - 18/19*less_stable_deposits',
                'ava_stable_funding' => 'capital + (1/2)*corporations_fund + (9/10)*less_stable_deposits + (19/20)*stable_deposits',
                'less_stable_deposits' => '(10/9)*ava_stable_funding - 10/9*capital - 5/9*corporations_fund - 19/18*stable_deposits',
            ],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        NSFR works out Regulatory capital and Stable demand deposits from Available stable funding and Required stable funding. Nothing is looked up on this page: regulatory capital is computed from available stable funding and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Regulatory capital is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the NSFR calculator works', 'html' => <<<'TXT'
            <p>The NSFR calculator applies one relationship to 2 numbers and reports Regulatory capital, Stable demand deposits and Less stable demand deposits.</p><p>In the form&#039;s own words, NSFR = Available stable funding ÷ Required stable funding.</p><p>The result panel carries Regulatory capital, Stable demand deposits, Less stable demand deposits and Funding from corporations, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Available stable funding</strong> — in USD</li><li><strong>Required stable funding</strong> — in USD</li></ul><p>The result boxes are Regulatory capital in USD, Stable demand deposits in USD, Less stable demand deposits in USD, Funding from corporations in USD, NSFR in percent; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Regulatory capital = 10 USD, Stable demand deposits = 100 USD, Less stable demand deposits = 1000 USD, Funding from corporations = 10 USD, Available stable funding = 100 USD and Required stable funding = 1000 USD gives <strong>NSFR</strong> = 0.1 perc.</p><ul><li><strong>NSFR</strong> = 0.1 perc</li></ul><p>The line behind those figures is <strong>NSFR</strong> = <code>Available stable funding ÷ Required stable funding</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>NSFR</strong> = 0.1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on NSFR lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>NSFR</strong> = <code>Available stable funding ÷ Required stable funding</code></li><li><strong>Required stable funding</strong> = <code>Available stable funding ÷ NSFR</code></li><li><strong>Available stable funding</strong> = <code>NSFR × Required stable funding</code></li><li><strong>Regulatory capital</strong> = <code>Available stable funding − 1 ÷ 2 × Funding from corporations − 9 ÷ 10 × Less stable demand deposits − 19 ÷ 20 × Stable demand deposits</code></li><li><strong>Funding from corporations</strong> = <code>2 × Available stable funding − 2 × Regulatory capital − 9 ÷ 5 × Less stable demand deposits − 19 ÷ 10 × Stable demand deposits</code></li><li><strong>Stable demand deposits</strong> = <code>(20 ÷ 19) × Available stable funding − 20 ÷ 19 × Regulatory capital − 10 ÷ 19 × Funding from corporations − 18 ÷ 19 × Less stable demand deposits</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>NSFR</strong> = <code>Available stable funding ÷ Required stable funding</code> — the form to use when Available stable funding and Required stable funding are the values you have.</li><li><strong>Required stable funding</strong> = <code>Available stable funding ÷ NSFR</code> — the form to use when Available stable funding and NSFR are the values you have.</li><li><strong>Available stable funding</strong> = <code>NSFR × Required stable funding</code> — the form to use when NSFR and Required stable funding are the values you have.</li><li><strong>Available stable funding</strong> = <code>Regulatory capital + (1 ÷ 2) × Funding from corporations + (9 ÷ 10) × Less stable demand deposits + (19 ÷ 20) × Stable demand deposits</code> — the form to use when Regulatory capital, Funding from corporations, Less stable demand deposits and Stable demand deposits are the values you have.</li><li><strong>Regulatory capital</strong> = <code>Available stable funding − 1 ÷ 2 × Funding from corporations − 9 ÷ 10 × Less stable demand deposits − 19 ÷ 20 × Stable demand deposits</code> — the form to use when Available stable funding, Funding from corporations, Less stable demand deposits and Stable demand deposits are the values you have.</li><li><strong>Funding from corporations</strong> = <code>2 × Available stable funding − 2 × Regulatory capital − 9 ÷ 5 × Less stable demand deposits − 19 ÷ 10 × Stable demand deposits</code> — the form to use when Available stable funding, Regulatory capital, Less stable demand deposits and Stable demand deposits are the values you have.</li><li><strong>Stable demand deposits</strong> = <code>(20 ÷ 19) × Available stable funding − 20 ÷ 19 × Regulatory capital − 10 ÷ 19 × Funding from corporations − 18 ÷ 19 × Less stable demand deposits</code> — the form to use when Available stable funding, Regulatory capital, Funding from corporations and Less stable demand deposits are the values you have.</li><li><strong>Less stable demand deposits</strong> = <code>(10 ÷ 9) × Available stable funding − 10 ÷ 9 × Regulatory capital − 5 ÷ 9 × Funding from corporations − 19 ÷ 18 × Stable demand deposits</code> — the form to use when Available stable funding, Regulatory capital, Funding from corporations and Stable demand deposits are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of NSFR, Required stable funding and Available stable funding can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Regulatory capital, from 10 to 20 — and the answers go from <strong>NSFR</strong> 0.1 perc to <strong>NSFR</strong> 0.1 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Regulatory capital, Stable demand deposits and Less stable demand deposits are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Available stable funding left as a guess.</strong> Anything typed into Available stable funding is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Required stable funding left as a guess.</strong> Anything typed into Required stable funding is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Available stable funding and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the NSFR form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Available stable funding</strong> takes a plain number with no unit attached. The page reads it when it works out NSFR, Required stable funding and Regulatory capital. Fill it from a measurement rather than a memory — Available stable funding is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Required stable funding</strong> takes a plain number with no unit attached. The page reads it when it works out NSFR and Available stable funding. Fill it from a measurement rather than a memory — Required stable funding is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Regulatory capital</strong> is a plain number. It is computed from Available stable funding, Funding from corporations, Less stable demand deposits and Stable demand deposits, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Stable demand deposits</strong> is a plain number. It is computed from Available stable funding, Regulatory capital, Funding from corporations and Less stable demand deposits, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Less stable demand deposits</strong> is a plain number. It is computed from Available stable funding, Regulatory capital, Funding from corporations and Stable demand deposits, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Funding from corporations</strong> is a plain number. It is computed from Available stable funding, Regulatory capital, Less stable demand deposits and Stable demand deposits, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>NSFR</strong> is a percent figure and the page's own defaults put it at 0.1 perc. It is computed from Available stable funding and Required stable funding, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>NSFR</th></tr></thead><tbody><tr><td><strong>Regulatory capital</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Stable demand deposits</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Less stable demand deposits</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Funding from corporations</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Available stable funding</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Required stable funding</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>The steepest column belongs to Available stable funding: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Regulatory capital, Stable demand deposits and Less stable demand deposits barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Regulatory capital = 5 USD, Stable demand deposits = 50 USD, Less stable demand deposits = 500 USD, Funding from corporations = 5 USD, Available stable funding = 50 USD and Required stable funding = 500 USD and the page reports <strong>NSFR</strong> = 0.1 perc.</li><li>Feed in Regulatory capital = 30 USD, Stable demand deposits = 100 USD, Less stable demand deposits = 1000 USD, Funding from corporations = 10 USD, Available stable funding = 100 USD and Required stable funding = 1000 USD and the page reports <strong>NSFR</strong> = 0.1 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on NSFR actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Regulatory capital is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Available stable funding and Required stable funding and the number you are missing is Regulatory capital and Stable demand deposits.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/rv-loan">RV loan Calculator</a>, <a href="/finance/saas-ltv">SaaS lifetime value Calculator</a> and <a href="/finance/sabbatical">Sabbatical Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the NSFR calculator work out?', 'a' => <<<'TXT'
            Regulatory capital, Stable demand deposits, Less stable demand deposits and Funding from corporations, from Available stable funding and Required stable funding. The relationship is NSFR = Available stable funding ÷ Required stable funding.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Available stable funding (USD), Required stable funding (USD). Fill available stable funding and required stable funding and leave Regulatory capital empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. NSFR, Required stable funding, Available stable funding and Regulatory capital can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'NSFR = 0.1 perc. That comes from the page\'s own defaults, entered in Available stable funding; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Regulatory capital is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Available stable funding blank and the page solves for it, reporting Regulatory capital instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Regulatory capital at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/rv-loan', 'name' => 'RV loan Calculator'],
            ['path' => '/finance/saas-ltv', 'name' => 'SaaS lifetime value Calculator'],
            ['path' => '/finance/sabbatical', 'name' => 'Sabbatical Calculator'],
        ],
        'authors' => [],
    ],
];
