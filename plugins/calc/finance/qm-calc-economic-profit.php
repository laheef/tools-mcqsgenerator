<?php

/**
 * Economic profit
 * /finance/economic-profit
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Economic profit',
    'meta' => ['title' => 'Economic profit — Formula, Steps & Examples', 'description' => 'Enter total revenue and explicit costs and get economic profit back. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Economic profit Calculator', 'updated' => '2024-05-07'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_revenue',
                            'label' => 'Total revenue',
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
                            'name' => 'explicit_cost',
                            'label' => 'Explicit costs',
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
                            'name' => 'implicit_cost',
                            'label' => 'Implicit costs',
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
                            'name' => 'economic_profit',
                            'label' => 'Economic profit',
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
            'title' => 'economic_profit = total_revenue - explicit_cost - implicit_cost',
            'results' => ['explicit_cost' => '-economic_profit - implicit_cost + total_revenue', 'total_revenue' => 'economic_profit + explicit_cost + implicit_cost', 'implicit_cost' => '-economic_profit - explicit_cost + total_revenue', 'economic_profit' => '-explicit_cost - implicit_cost + total_revenue'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Economic profit takes Total revenue, Explicit costs and Implicit costs and returns Economic profit. It is a single relationship that reads economic profit out of total revenue, not a table of canned results keyed by them. Units for Economic profit default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Economic profit calculator works', 'html' => <<<'TXT'
            <p>Economic profit answers one question from 3 numbers, and the answer is Economic profit.</p><p>In the form&#039;s own words, Economic profit = − Explicit costs − Implicit costs + Total revenue.</p><p>The answers are Economic profit; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Total revenue</strong> — in USD</li><li><strong>Explicit costs</strong> — in USD</li><li><strong>Implicit costs</strong> — in USD</li></ul><p>What you get back is Economic profit in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Total revenue = 10 USD, Explicit costs = 100 USD and Implicit costs = 1000 USD; the answers are <strong>Economic profit</strong> = -1090 USD.</p><ul><li><strong>Economic profit</strong> = -1090 USD</li></ul><p>That is <strong>Economic profit</strong> = <code>− Explicit costs − Implicit costs + Total revenue</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Economic profit</strong> = -1090 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Economic profit takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Economic profit</strong> = <code>− Explicit costs − Implicit costs + Total revenue</code></li><li><strong>Explicit costs</strong> = <code>− Economic profit − Implicit costs + Total revenue</code></li><li><strong>Total revenue</strong> = <code>Economic profit + Explicit costs + Implicit costs</code></li><li><strong>Implicit costs</strong> = <code>− Economic profit − Explicit costs + Total revenue</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Economic profit</strong> = <code>− Explicit costs − Implicit costs + Total revenue</code> — the form to use when Explicit costs, Implicit costs and Total revenue are the values you have.</li><li><strong>Explicit costs</strong> = <code>− Economic profit − Implicit costs + Total revenue</code> — the form to use when Economic profit, Implicit costs and Total revenue are the values you have.</li><li><strong>Total revenue</strong> = <code>Economic profit + Explicit costs + Implicit costs</code> — the form to use when Economic profit, Explicit costs and Implicit costs are the values you have.</li><li><strong>Implicit costs</strong> = <code>− Economic profit − Explicit costs + Total revenue</code> — the form to use when Economic profit, Explicit costs and Total revenue are the values you have.</li></ul><p>Any one of Economic profit, Explicit costs and Total revenue can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Total revenue from 10 to 20, leaving every other box alone. The panel moves from <strong>Economic profit</strong> -1090 USD to <strong>Economic profit</strong> -1080 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Economic profit is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Total revenue left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total revenue is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Explicit costs left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Explicit costs is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Implicit costs left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Implicit costs is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Total revenue is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Economic profit form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Total revenue</strong> takes a plain number with no unit attached. It feeds Explicit costs, Implicit costs and Economic profit. Fill it from a measurement rather than a memory — Total revenue is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Explicit costs</strong> takes a plain number with no unit attached. It feeds Total revenue, Implicit costs and Economic profit. Fill it from a measurement rather than a memory — Explicit costs is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Implicit costs</strong> takes a plain number with no unit attached. It feeds Explicit costs, Total revenue and Economic profit. Fill it from a measurement rather than a memory — Implicit costs is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Economic profit</strong> is a plain number and the page's own defaults put it at -1090. It is worked out from Explicit costs, Implicit costs and Total revenue. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Economic profit</th></tr></thead><tbody><tr><td><strong>Total revenue</strong> +10%</td><td>+0.09%</td></tr><tr><td><strong>Explicit costs</strong> +10%</td><td>-0.92%</td></tr><tr><td><strong>Implicit costs</strong> +10%</td><td>-9.17%</td></tr></tbody></table><p>Ranked by leverage, Implicit costs sits at the top — a ten per cent error in that box shows up as roughly 9.2 per cent in the answer. By contrast, Total revenue barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Total revenue = 5 USD, Explicit costs = 50 USD and Implicit costs = 500 USD and the page reports <strong>Economic profit</strong> = -545 USD.</li><li>Feed in Total revenue = 30 USD, Explicit costs = 100 USD and Implicit costs = 1000 USD and the page reports <strong>Economic profit</strong> = -1070 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Total revenue, Explicit costs and Implicit costs ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Total revenue — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Economic profit in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Economic profit follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Total revenue, Explicit costs and Implicit costs are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Total revenue, Explicit costs and Implicit costs and the number you are missing is Economic profit.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/lumpsum">Lumpsum (India)</a>, <a href="/finance/lumpsum-plus-sip">Lumpsum plus SIP</a> and <a href="/finance/magi">MAGI Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Economic profit is a number to act on, so the useful question is what to do with Economic profit (USD) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Total revenue, Explicit costs and Implicit costs alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Economic profit calculator work out?', 'a' => <<<'TXT'
            Economic profit, from Explicit costs, Implicit costs and Total revenue. The relationship is Economic profit = − Explicit costs − Implicit costs + Total revenue.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Total revenue (USD), Explicit costs (USD), Implicit costs (USD). With total revenue, explicit costs and implicit costs in place, Economic profit can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Economic profit, Explicit costs, Total revenue and Implicit costs blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Economic profit = -1090 USD. The figures come from Total revenue as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Economic profit is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Total revenue blank and the page solves for it, reporting Economic profit instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Economic profit keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/lumpsum', 'name' => 'Lumpsum (India)'],
            ['path' => '/finance/lumpsum-plus-sip', 'name' => 'Lumpsum plus SIP'],
            ['path' => '/finance/magi', 'name' => 'MAGI Calculator'],
        ],
        'authors' => [],
    ],
];
