<?php

/**
 * CPC and CPM
 * /finance/cpc-cpm
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'CPC and CPM',
    'meta' => ['title' => 'CPC and CPM Calculator: Formula, Steps & Examples', 'description' => 'CPC and CPM turns impressions and clicks into cost per click (CPC) and Click-through rate (CTR). Results come back in USD, with any other unit a click away.', 'h1' => 'CPC and CPM Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'impressions',
                            'label' => 'Impressions',
                            'type' => 'number',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CPC',
                            'label' => 'Cost per click (CPC)',
                            'type' => 'number',
                            'help' => 'The cost of your advertising based on the number of clicks you receive.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CTR',
                            'label' => 'Click-through rate (CTR)',
                            'type' => 'number',
                            'help' => 'The percentage of impressions that end up as clicks.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'clicks',
                            'label' => 'Clicks',
                            'type' => 'number',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cost',
                            'label' => 'Total cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CPM',
                            'label' => 'Cost per mille (CPM)',
                            'type' => 'number',
                            'help' => 'Cost per thousand impressions.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'cost / (impressions / 1000) = CPM',
            'results' => ['cost' => '(1/1000)*CPM*impressions', 'impressions' => '1000*cost/CPM', 'CPM' => '1000*cost/impressions'],
        ],
        [
            'title' => 'cost / clicks = CPC',
            'results' => ['clicks' => 'cost/CPC', 'cost' => 'CPC*clicks', 'CPC' => 'cost/clicks'],
        ],
        [
            'title' => 'CTR = clicks / impressions',
            'results' => ['clicks' => 'CTR*impressions', 'CTR' => 'clicks/impressions', 'impressions' => 'clicks/CTR'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        CPC and CPM works out Cost per click (CPC) and Click-through rate (CTR) from Impressions and Clicks. There is no hidden constant here: change cost per click (CPC) and impressions moves with it. The main result, Cost per click (CPC), is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the CPC and CPM calculator works', 'html' => <<<'TXT'
            <p>The CPC and CPM calculator applies one relationship to 2 numbers and reports Cost per click (CPC), Click-through rate (CTR) and Total cost.</p><p>The relationship it solves reads Total cost = (1 ÷ 1000) × Cost per mille (CPM) × Impressions.</p><p>What comes back is Cost per click (CPC), Click-through rate (CTR), Total cost and Cost per mille (CPM) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Impressions</strong> — a plain number, no unit</li><li><strong>Clicks</strong> — a plain number, no unit</li></ul><p>What you get back is Cost per click (CPC) in USD, Click-through rate (CTR) in percent, Total cost in USD, Cost per mille (CPM) in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Impressions = 10, Cost per click (CPC) = 100 USD, Clicks = 1000, Total cost = 10 USD and Cost per mille (CPM) = 100 USD — through the same formula and the panel reports <strong>Click-through rate (CTR)</strong> = 100 perc.</p><ul><li><strong>Click-through rate (CTR)</strong> = 100 perc</li></ul><p>That is <strong>Total cost</strong> = <code>(1 ÷ 1000) × Cost per mille (CPM) × Impressions</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Click-through rate (CTR)</strong> = 100. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Click-through rate (CTR) lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Total cost</strong> = <code>(1 ÷ 1000) × Cost per mille (CPM) × Impressions</code></li><li><strong>Impressions</strong> = <code>1000 × Total cost ÷ Cost per mille (CPM)</code></li><li><strong>Cost per mille (CPM)</strong> = <code>1000 × Total cost ÷ Impressions</code></li><li><strong>Clicks</strong> = <code>Total cost ÷ Cost per click (CPC)</code></li><li><strong>Cost per click (CPC)</strong> = <code>Total cost ÷ Clicks</code></li><li><strong>Click-through rate (CTR)</strong> = <code>Clicks ÷ Impressions</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Total cost</strong> = <code>(1 ÷ 1000) × Cost per mille (CPM) × Impressions</code> — the form to use when Cost per mille (CPM) and Impressions are the values you have.</li><li><strong>Impressions</strong> = <code>1000 × Total cost ÷ Cost per mille (CPM)</code> — the form to use when Total cost and Cost per mille (CPM) are the values you have.</li><li><strong>Cost per mille (CPM)</strong> = <code>1000 × Total cost ÷ Impressions</code> — the form to use when Total cost and Impressions are the values you have.</li><li><strong>Clicks</strong> = <code>Total cost ÷ Cost per click (CPC)</code> — the form to use when Total cost and Cost per click (CPC) are the values you have.</li><li><strong>Total cost</strong> = <code>Cost per click (CPC) × Clicks</code> — the form to use when Cost per click (CPC) and Clicks are the values you have.</li><li><strong>Cost per click (CPC)</strong> = <code>Total cost ÷ Clicks</code> — the form to use when Total cost and Clicks are the values you have.</li><li><strong>Click-through rate (CTR)</strong> = <code>Clicks ÷ Impressions</code> — the form to use when Clicks and Impressions are the values you have.</li><li><strong>Clicks</strong> = <code>Click-through rate (CTR) × Impressions</code> — the form to use when Click-through rate (CTR) and Impressions are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Total cost, Impressions and Cost per mille (CPM) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Impressions from 10 to 20, leaving every other box alone. The panel moves from <strong>Click-through rate (CTR)</strong> 100 perc to <strong>Click-through rate (CTR)</strong> 50 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Cost per click (CPC), Click-through rate (CTR) and Total cost are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Impressions left as a guess.</strong> Anything typed into Impressions is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Clicks left as a guess.</strong> Anything typed into Clicks is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Impressions is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the CPC and CPM form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Impressions</strong> takes a plain number with no unit attached. It feeds Total cost, Cost per mille (CPM) and Clicks. Fill it from a measurement rather than a memory — Impressions is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Clicks</strong> takes a plain number with no unit attached. It feeds Total cost, Cost per click (CPC) and Click-through rate (CTR). Fill it from a measurement rather than a memory — Clicks is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Cost per click (CPC)</strong> is a plain number. The value follows from Total cost and Clicks. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Click-through rate (CTR)</strong> is a percent figure and the page's own defaults put it at 100 perc. The value follows from Clicks and Impressions. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total cost</strong> is a plain number. The value follows from Cost per mille (CPM) and Impressions. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Cost per mille (CPM)</strong> is a plain number. The value follows from Total cost and Impressions. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Click-through rate (CTR)</th></tr></thead><tbody><tr><td><strong>Impressions</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Cost per click (CPC)</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Clicks</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Total cost</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Cost per mille (CPM)</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Clicks: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Cost per click (CPC), Total cost and Cost per mille (CPM) barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Impressions = 5, Cost per click (CPC) = 50 USD, Clicks = 500, Total cost = 5 USD and Cost per mille (CPM) = 50 USD and the page reports <strong>Click-through rate (CTR)</strong> = 100 perc.</li><li>Feed in Impressions = 30, Cost per click (CPC) = 100 USD, Clicks = 1000, Total cost = 10 USD and Cost per mille (CPM) = 100 USD and the page reports <strong>Click-through rate (CTR)</strong> = 33.33 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on CPC and CPM actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Cost per click (CPC) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Impressions and Clicks measured, Cost per click (CPC) and Click-through rate (CTR) wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/mps">MPS (marginal propensity to save) Calculator</a>, <a href="/finance/mutual-fund">Mutual fund Calculator</a> and <a href="/finance/national-insurance-uk">National insurance UK</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the CPC and CPM calculator work out?', 'a' => <<<'TXT'
            Cost per click (CPC), Click-through rate (CTR), Total cost and Cost per mille (CPM), from Cost per mille (CPM) and Impressions. The relationship is Total cost = (1 ÷ 1000) × Cost per mille (CPM) × Impressions.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Impressions, Clicks. With impressions and clicks in place, Cost per click (CPC) can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Total cost, Impressions, Cost per mille (CPM) and Clicks can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Click-through rate (CTR) = 100 perc. That comes from the page\'s own defaults, entered in Impressions; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Cost per click (CPC) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Impressions blank and the page solves for it, reporting Cost per click (CPC) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Cost per click (CPC) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/mps', 'name' => 'MPS (marginal propensity to save) Calculator'],
            ['path' => '/finance/mutual-fund', 'name' => 'Mutual fund Calculator'],
            ['path' => '/finance/national-insurance-uk', 'name' => 'National insurance UK'],
        ],
        'authors' => [],
    ],
];
