<?php

/**
 * Cobb-Douglas production function
 * /finance/cobb-douglas-production-function
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cobb-Douglas production function',
    'meta' => ['title' => 'Cobb-Douglas production function Calculator', 'description' => 'Cobb-Douglas production function works out total production (Y) from total factor productivity (A). Every box can be solved for, not only the one in the title.', 'h1' => 'Cobb-Douglas production function Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TotFactProd',
                            'label' => 'Total factor productivity (A)',
                            'type' => 'number',
                            'help' => 'Part of total production that isn\'t the result of labor or capital.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Labor',
                            'label' => 'Labor (L)',
                            'type' => 'number',
                            'help' => 'Labor can be for example the number of workers.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'betaa',
                            'label' => 'Output elasticity of labor (β)',
                            'type' => 'number',
                            'help' => 'Output elasticity of labor is constant for a certain industry.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Capital',
                            'label' => 'Capital (K)',
                            'type' => 'number',
                            'help' => 'Capital is usually money.',
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
                            'name' => 'alpha',
                            'label' => 'Output elasticity of capital (α)',
                            'type' => 'number',
                            'help' => 'Output elasticity of capital is constant for a certain industry.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TotProd',
                            'label' => 'Total production (Y)',
                            'type' => 'number',
                            'help' => 'Total production is the quantity of goods produced.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'TotProd = TotFactProd * Labor ^ betaa * Capital ^ alpha',
            'results' => [
                'Capital' => 'pow(pow(Labor, -betaa)*TotProd/TotFactProd, 1/alpha)',
                'TotFactProd' => 'pow(Capital, -alpha)*pow(Labor, -betaa)*TotProd',
                'Labor' => 'pow(pow(Capital, -alpha)*TotProd/TotFactProd, 1/betaa)',
                'alpha' => 'log(pow(Labor, -betaa)*TotProd/TotFactProd)/log(Capital)',
                'TotProd' => 'pow(Capital, alpha)*pow(Labor, betaa)*TotFactProd',
                'betaa' => 'log(pow(Capital, -alpha)*TotProd/TotFactProd)/log(Labor)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Total factor productivity (A), Labor (L) and Output elasticity of labor (β) into Cobb-Douglas production function and the answer comes back as Total production (Y). It is a single relationship that reads total production (Y) out of total factor productivity (A), not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Cobb-Douglas production function calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Cobb-Douglas production function: it takes 5 numbers and reports Total production (Y).</p><p>The relationship it solves reads Total production (Y) = (Capital (K))^(Output elasticity of capital (α)) × (Labor (L))^(Output elasticity of labor (β)) × Total factor productivity (A).</p><p>The answers are Total production (Y); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Total factor productivity (A)</strong> — a plain number, no unit. Part of total production that isn&#039;t the result of labor or capital.</li><li><strong>Labor (L)</strong> — a plain number, no unit. Labor can be for example the number of workers.</li><li><strong>Output elasticity of labor (β)</strong> — a plain number, no unit. Output elasticity of labor is constant for a certain industry.</li><li><strong>Capital (K)</strong> — in USD. Capital is usually money.</li><li><strong>Output elasticity of capital (α)</strong> — a plain number, no unit. Output elasticity of capital is constant for a certain industry.</li></ul><p>The result box is Total production (Y). It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Total factor productivity (A) = 2, Labor (L) = 4, Output elasticity of labor (β) = 8, Capital (K) = 2 USD and Output elasticity of capital (α) = 4 — through the same formula and the panel reports <strong>Total production (Y)</strong> = 2.097e+6.</p><ul><li><strong>Total production (Y)</strong> = 2.097e+6</li></ul><p>The line behind those figures is <strong>Total production (Y)</strong> = <code>(Capital (K))^(Output elasticity of capital (α)) × (Labor (L))^(Output elasticity of labor (β)) × Total factor productivity (A)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Total production (Y)</strong> = 2.097e+6. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Total production (Y) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total production (Y)</strong> = <code>(Capital (K))^(Output elasticity of capital (α)) × (Labor (L))^(Output elasticity of labor (β)) × Total factor productivity (A)</code></li><li><strong>Capital (K)</strong> = <code>((Labor (L))^(− Output elasticity of labor (β)) × Total production (Y) ÷ Total factor productivity (A))^(1 ÷ Output elasticity of capital (α))</code></li><li><strong>Total factor productivity (A)</strong> = <code>(Capital (K))^(− Output elasticity of capital (α)) × (Labor (L))^(− Output elasticity of labor (β)) × Total production (Y)</code></li><li><strong>Labor (L)</strong> = <code>((Capital (K))^(− Output elasticity of capital (α)) × Total production (Y) ÷ Total factor productivity (A))^(1 ÷ Output elasticity of labor (β))</code></li><li><strong>Output elasticity of capital (α)</strong> = <code>ln((Labor (L))^(− Output elasticity of labor (β)) × Total production (Y) ÷ Total factor productivity (A)) ÷ ln(Capital (K))</code></li><li><strong>Output elasticity of labor (β)</strong> = <code>ln((Capital (K))^(− Output elasticity of capital (α)) × Total production (Y) ÷ Total factor productivity (A)) ÷ ln(Labor (L))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total production (Y)</strong> = <code>(Capital (K))^(Output elasticity of capital (α)) × (Labor (L))^(Output elasticity of labor (β)) × Total factor productivity (A)</code> — the form to use when Capital (K), Output elasticity of capital (α), Labor (L) and Output elasticity of labor (β) are the values you have.</li><li><strong>Capital (K)</strong> = <code>((Labor (L))^(− Output elasticity of labor (β)) × Total production (Y) ÷ Total factor productivity (A))^(1 ÷ Output elasticity of capital (α))</code> — the form to use when Labor (L), Output elasticity of labor (β), Total production (Y) and Total factor productivity (A) are the values you have.</li><li><strong>Total factor productivity (A)</strong> = <code>(Capital (K))^(− Output elasticity of capital (α)) × (Labor (L))^(− Output elasticity of labor (β)) × Total production (Y)</code> — the form to use when Capital (K), Output elasticity of capital (α), Labor (L) and Output elasticity of labor (β) are the values you have.</li><li><strong>Labor (L)</strong> = <code>((Capital (K))^(− Output elasticity of capital (α)) × Total production (Y) ÷ Total factor productivity (A))^(1 ÷ Output elasticity of labor (β))</code> — the form to use when Capital (K), Output elasticity of capital (α), Total production (Y) and Total factor productivity (A) are the values you have.</li><li><strong>Output elasticity of capital (α)</strong> = <code>ln((Labor (L))^(− Output elasticity of labor (β)) × Total production (Y) ÷ Total factor productivity (A)) ÷ ln(Capital (K))</code> — the form to use when Labor (L), Output elasticity of labor (β), Total production (Y) and Total factor productivity (A) are the values you have.</li><li><strong>Output elasticity of labor (β)</strong> = <code>ln((Capital (K))^(− Output elasticity of capital (α)) × Total production (Y) ÷ Total factor productivity (A)) ÷ ln(Labor (L))</code> — the form to use when Capital (K), Output elasticity of capital (α), Total production (Y) and Total factor productivity (A) are the values you have.</li></ul><p>Any one of Total production (Y), Capital (K) and Total factor productivity (A) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Total factor productivity (A) from 2 to 4, leaving every other box alone. The panel moves from <strong>Total production (Y)</strong> 2.097e+6 to <strong>Total production (Y)</strong> 4.194e+6.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Total production (Y) is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Total factor productivity (A) left as a guess.</strong> Anything typed into Total factor productivity (A) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Labor (L) left as a guess.</strong> Anything typed into Labor (L) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Output elasticity of labor (β) left as a guess.</strong> Anything typed into Output elasticity of labor (β) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Total factor productivity (A) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Cobb-Douglas production function form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Total factor productivity (A)</strong> takes a plain number with no unit attached. Part of total production that isn&#039;t the result of labor or capital. The page reads it when it works out Capital (K), Labor (L) and Output elasticity of capital (α). Fill it from a measurement rather than a memory — Total factor productivity (A) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Labor (L)</strong> takes a plain number with no unit attached. Labor can be for example the number of workers. The page reads it when it works out Capital (K), Total factor productivity (A) and Output elasticity of capital (α). Fill it from a measurement rather than a memory — Labor (L) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Output elasticity of labor (β)</strong> takes a plain number with no unit attached. Output elasticity of labor is constant for a certain industry. The page reads it when it works out Capital (K), Total factor productivity (A) and Labor (L). Fill it from a measurement rather than a memory — Output elasticity of labor (β) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Capital (K)</strong> takes a plain number with no unit attached. Capital is usually money. The page reads it when it works out Total factor productivity (A), Labor (L) and Output elasticity of capital (α). Fill it from a measurement rather than a memory — Capital (K) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Output elasticity of capital (α)</strong> takes a plain number with no unit attached. Output elasticity of capital is constant for a certain industry. The page reads it when it works out Capital (K), Total factor productivity (A) and Labor (L). Fill it from a measurement rather than a memory — Output elasticity of capital (α) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Total production (Y)</strong> is a plain number and the page's own defaults put it at 2.097e+6. It is worked out from Capital (K), Output elasticity of capital (α), Labor (L) and Output elasticity of labor (β). Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Total production (Y)</th></tr></thead><tbody><tr><td><strong>Total factor productivity (A)</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Labor (L)</strong> +10%</td><td>+114%</td></tr><tr><td><strong>Output elasticity of labor (β)</strong> +10%</td><td>+203%</td></tr><tr><td><strong>Capital (K)</strong> +10%</td><td>+46.41%</td></tr><tr><td><strong>Output elasticity of capital (α)</strong> +10%</td><td>+31.95%</td></tr></tbody></table><p>The steepest column belongs to Output elasticity of labor (β): ten per cent there moves an answer by about 203 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Total factor productivity (A) = 1, Labor (L) = 2, Output elasticity of labor (β) = 4, Capital (K) = 1 USD and Output elasticity of capital (α) = 2 and the page reports <strong>Total production (Y)</strong> = 16.</li><li>Feed in Total factor productivity (A) = 6, Labor (L) = 4, Output elasticity of labor (β) = 8, Capital (K) = 2 USD and Output elasticity of capital (α) = 4 and the page reports <strong>Total production (Y)</strong> = 6.291e+6.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Total production (Y) is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Total factor productivity (A), Labor (L) and Output elasticity of labor (β) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Total factor productivity (A), Labor (L) and Output elasticity of labor (β) is what you already know and Total production (Y) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/times-interest-earned-ratio">Times interest earned ratio</a>, <a href="/finance/total-asset-turnover">Total asset turnover Calculator</a> and <a href="/finance/treynor-ratio">Treynor ratio Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cobb-Douglas production function calculator work out?', 'a' => <<<'TXT'
            Total production (Y), from Capital (K), Output elasticity of capital (α), Labor (L) and Output elasticity of labor (β). The relationship is Total production (Y) = (Capital (K))^(Output elasticity of capital (α)) × (Labor (L))^(Output elasticity of labor (β)) × Total factor productivity (A).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Total factor productivity (A), Labor (L), Output elasticity of labor (β), Capital (K) (USD), Output elasticity of capital (α). With total factor productivity (A), labor (L) and output elasticity of labor (β) in place, Total production (Y) can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total production (Y), Capital (K), Total factor productivity (A) and Labor (L) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Total production (Y) = 2.097e+6. That comes from the page's own defaults, entered in Total factor productivity (A); change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Total production (Y) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Total factor productivity (A) blank and the page solves for it, reporting Total production (Y) instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Total production (Y) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/times-interest-earned-ratio', 'name' => 'Times interest earned ratio'],
            ['path' => '/finance/total-asset-turnover', 'name' => 'Total asset turnover Calculator'],
            ['path' => '/finance/treynor-ratio', 'name' => 'Treynor ratio Calculator'],
        ],
        'authors' => [],
    ],
];
