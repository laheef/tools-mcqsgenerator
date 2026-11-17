<?php

/**
 * ROA (return on assets)
 * /finance/roa
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'ROA (return on assets)',
    'meta' => ['title' => 'ROA (return on assets) — Free Online Calculator', 'description' => 'Enter net income and total assets and ROA (return on assets) returns return on asserts (ROA). Every box can be solved for, not only the one in the title.', 'h1' => 'ROA (return on assets) Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => '',
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
                            'name' => 'total_assets',
                            'label' => 'Total assets',
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
                            'name' => 'roa',
                            'label' => 'Return on asserts (ROA)',
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
            'title' => 'roa = net_income / total_assets',
            'results' => ['roa' => 'net_income/total_assets', 'total_assets' => 'net_income/roa', 'net_income' => 'roa*total_assets'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        ROA (return on assets) works out Return on asserts (ROA) from Net income and Total assets. It is a single relationship that reads return on asserts (ROA) out of net income, not a table of canned results keyed by them. Units for Return on asserts (ROA) default to percent and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the ROA (return on assets) calculator works', 'html' => <<<'TXT'
            <p>The ROA (return on assets) calculator applies one relationship to 2 numbers and reports Return on asserts (ROA).</p><p>The relationship it solves reads Return on asserts (ROA) = Net income ÷ Total assets.</p><p>The result panel carries Return on asserts (ROA), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Net income</strong> — in USD</li><li><strong>Total assets</strong> — in USD</li></ul><p>What you get back is Return on asserts (ROA) in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Net income = 10 USD and Total assets = 100 USD gives <strong>Return on asserts (ROA)</strong> = 0.1 perc.</p><ul><li><strong>Return on asserts (ROA)</strong> = 0.1 perc</li></ul><p>The line behind those figures is <strong>Return on asserts (ROA)</strong> = <code>Net income ÷ Total assets</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Return on asserts (ROA)</strong> = 0.1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Return on asserts (ROA) lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Return on asserts (ROA)</strong> = <code>Net income ÷ Total assets</code></li><li><strong>Total assets</strong> = <code>Net income ÷ Return on asserts (ROA)</code></li><li><strong>Net income</strong> = <code>Return on asserts (ROA) × Total assets</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Return on asserts (ROA)</strong> = <code>Net income ÷ Total assets</code> — the form to use when Net income and Total assets are the values you have.</li><li><strong>Total assets</strong> = <code>Net income ÷ Return on asserts (ROA)</code> — the form to use when Net income and Return on asserts (ROA) are the values you have.</li><li><strong>Net income</strong> = <code>Return on asserts (ROA) × Total assets</code> — the form to use when Return on asserts (ROA) and Total assets are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Return on asserts (ROA), Total assets and Net income can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Net income from 10 to 20, leaving every other box alone. The panel moves from <strong>Return on asserts (ROA)</strong> 0.1 perc to <strong>Return on asserts (ROA)</strong> 0.2 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Return on asserts (ROA) is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Net income left as a guess.</strong> Anything typed into Net income is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Total assets left as a guess.</strong> Anything typed into Total assets is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Net income to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the ROA (return on assets) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Net income</strong> takes a plain number with no unit attached. It feeds Return on asserts (ROA) and Total assets. Fill it from a measurement rather than a memory — Net income is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total assets</strong> takes a plain number with no unit attached. It feeds Return on asserts (ROA) and Net income. Fill it from a measurement rather than a memory — Total assets is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Return on asserts (ROA)</strong> is a percent figure and the page's own defaults put it at 0.1 perc. The value follows from Net income and Total assets. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Return on asserts (ROA)</th></tr></thead><tbody><tr><td><strong>Net income</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Total assets</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>The steepest column belongs to Net income: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Net income = 5 USD and Total assets = 50 USD and the page reports <strong>Return on asserts (ROA)</strong> = 0.1 perc.</li><li>Feed in Net income = 30 USD and Total assets = 100 USD and the page reports <strong>Return on asserts (ROA)</strong> = 0.3 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on ROA (return on assets) actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Net income and Total assets ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Net income — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Return on asserts (ROA) in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Return on asserts (ROA) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Net income and Total assets are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Net income and Total assets and the number you are missing is Return on asserts (ROA).</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/weekly-pay">Weekly pay Calculator</a>, <a href="/finance/what-to-offer-on-a-house">What to offer on a house Calculator</a> and <a href="/finance/working-capital">Working capital Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the ROA (return on assets) calculator work out?', 'a' => 'Return on asserts (ROA), from Net income and Total assets. The relationship is Return on asserts (ROA) = Net income ÷ Total assets.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Net income (USD), Total assets (USD). With net income and total assets in place, Return on asserts (ROA) can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Return on asserts (ROA), Total assets and Net income can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Return on asserts (ROA) = 0.1 perc. That comes from the page\'s own defaults, entered in Net income; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Return on asserts (ROA) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Net income blank and the page solves for it, reporting Return on asserts (ROA) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Return on asserts (ROA) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/weekly-pay', 'name' => 'Weekly pay Calculator'],
            ['path' => '/finance/what-to-offer-on-a-house', 'name' => 'What to offer on a house Calculator'],
            ['path' => '/finance/working-capital', 'name' => 'Working capital Calculator'],
        ],
        'authors' => [],
    ],
];
