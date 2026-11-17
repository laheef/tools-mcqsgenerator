<?php

/**
 * Information ratio
 * /finance/information-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Information ratio',
    'meta' => ['title' => 'Information ratio: Formula, Steps & Results', 'description' => 'Information ratio takes beginning portfolio value, ending portfolio value and benchmark return and returns portfolio return. Every figure is computed.', 'h1' => 'Information ratio Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => 'Portfolio return',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beginningPortfolio',
                            'label' => 'Beginning portfolio value',
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
                            'name' => 'endingPortfolio',
                            'label' => 'Ending portfolio value',
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
                            'name' => 'portfolioReturn',
                            'label' => 'Portfolio return',
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
            'title' => 'Information ratio',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'benchmarkReturn',
                            'label' => 'Benchmark return',
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
                            'name' => 'trackingError',
                            'label' => 'Tracking error',
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
                            'name' => 'informationRatio',
                            'label' => 'Information ratio',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'portfolioReturn = (endingPortfolio - beginningPortfolio) / beginningPortfolio',
            'results' => ['portfolioReturn' => '(-beginningPortfolio + endingPortfolio)/beginningPortfolio', 'endingPortfolio' => 'beginningPortfolio*(portfolioReturn + 1)', 'beginningPortfolio' => 'endingPortfolio/(portfolioReturn + 1)'],
        ],
        [
            'title' => 'informationRatio = (portfolioReturn - benchmarkReturn) / trackingError',
            'results' => ['informationRatio' => '(-benchmarkReturn + portfolioReturn)/trackingError', 'benchmarkReturn' => '-informationRatio*trackingError + portfolioReturn', 'portfolioReturn' => 'benchmarkReturn + informationRatio*trackingError', 'trackingError' => '(-benchmarkReturn + portfolioReturn)/informationRatio'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Information ratio turns Beginning portfolio value and Ending portfolio value into Portfolio return and Benchmark return. It is a single relationship that reads portfolio return out of beginning portfolio value, not a table of canned results keyed by them. Units for Portfolio return default to percent and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Information ratio calculator works', 'html' => <<<'TXT'
            <p>Information ratio answers one question from 2 numbers, and the answer is Portfolio return, Benchmark return and Tracking error.</p><p>Written with the labels from the form, Portfolio return = ( − Beginning portfolio value + Ending portfolio value) ÷ Beginning portfolio value.</p><p>What comes back is Portfolio return, Benchmark return, Tracking error and Information ratio — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Beginning portfolio value</strong> — in USD</li><li><strong>Ending portfolio value</strong> — in USD</li></ul><p>The answers come back as Portfolio return in percent, Benchmark return in percent, Tracking error in percent, Information ratio. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Beginning portfolio value = 10 USD, Ending portfolio value = 100 USD, Benchmark return = 1000 perc, Tracking error = 10 perc and Information ratio = 100 gives <strong>Portfolio return</strong> = 9 perc.</p><ul><li><strong>Portfolio return</strong> = 9 perc</li></ul><p>That is <strong>Portfolio return</strong> = <code>( − Beginning portfolio value + Ending portfolio value) ÷ Beginning portfolio value</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Portfolio return</strong> = 9 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Portfolio return offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Portfolio return</strong> = <code>( − Beginning portfolio value + Ending portfolio value) ÷ Beginning portfolio value</code></li><li><strong>Ending portfolio value</strong> = <code>Beginning portfolio value × (Portfolio return + 1)</code></li><li><strong>Beginning portfolio value</strong> = <code>Ending portfolio value ÷ (Portfolio return + 1)</code></li><li><strong>Information ratio</strong> = <code>( − Benchmark return + Portfolio return) ÷ Tracking error</code></li><li><strong>Benchmark return</strong> = <code>− Information ratio × Tracking error + Portfolio return</code></li><li><strong>Tracking error</strong> = <code>( − Benchmark return + Portfolio return) ÷ Information ratio</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Portfolio return</strong> = <code>( − Beginning portfolio value + Ending portfolio value) ÷ Beginning portfolio value</code> — the form to use when Beginning portfolio value and Ending portfolio value are the values you have.</li><li><strong>Ending portfolio value</strong> = <code>Beginning portfolio value × (Portfolio return + 1)</code> — the form to use when Beginning portfolio value and Portfolio return are the values you have.</li><li><strong>Beginning portfolio value</strong> = <code>Ending portfolio value ÷ (Portfolio return + 1)</code> — the form to use when Ending portfolio value and Portfolio return are the values you have.</li><li><strong>Information ratio</strong> = <code>( − Benchmark return + Portfolio return) ÷ Tracking error</code> — the form to use when Benchmark return, Portfolio return and Tracking error are the values you have.</li><li><strong>Benchmark return</strong> = <code>− Information ratio × Tracking error + Portfolio return</code> — the form to use when Information ratio, Tracking error and Portfolio return are the values you have.</li><li><strong>Portfolio return</strong> = <code>Benchmark return + Information ratio × Tracking error</code> — the form to use when Benchmark return, Information ratio and Tracking error are the values you have.</li><li><strong>Tracking error</strong> = <code>( − Benchmark return + Portfolio return) ÷ Information ratio</code> — the form to use when Benchmark return, Portfolio return and Information ratio are the values you have.</li></ul><p>Any one of Portfolio return, Ending portfolio value and Beginning portfolio value can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Beginning portfolio value from 10 to 20, leaving every other box alone. The panel moves from <strong>Portfolio return</strong> 9 perc to <strong>Portfolio return</strong> 4 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Portfolio return, Benchmark return and Tracking error are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Beginning portfolio value left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Beginning portfolio value is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Ending portfolio value left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Ending portfolio value is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Beginning portfolio value is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Beginning portfolio value</strong> takes a plain number with no unit attached. It feeds Portfolio return and Ending portfolio value. Have it to hand before you start: Beginning portfolio value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Ending portfolio value</strong> takes a plain number with no unit attached. It feeds Portfolio return and Beginning portfolio value. Have it to hand before you start: Ending portfolio value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Portfolio return</strong> is a percent figure and the page's own defaults put it at 9 perc. It is worked out from Beginning portfolio value and Ending portfolio value. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Benchmark return</strong> is a percent figure. It is worked out from Information ratio, Tracking error and Portfolio return. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Tracking error</strong> is a percent figure. It is worked out from Benchmark return, Portfolio return and Information ratio. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Information ratio</strong> is a plain number. It is worked out from Benchmark return, Portfolio return and Tracking error. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Portfolio return</th></tr></thead><tbody><tr><td><strong>Beginning portfolio value</strong> +10%</td><td>-10.1%</td></tr><tr><td><strong>Ending portfolio value</strong> +10%</td><td>+11.11%</td></tr><tr><td><strong>Benchmark return</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Tracking error</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Information ratio</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Ending portfolio value sits at the top — a ten per cent error in that box shows up as roughly 11.1 per cent in the answer. By contrast, Benchmark return, Tracking error and Information ratio barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Beginning portfolio value = 5 USD, Ending portfolio value = 50 USD, Benchmark return = 500 perc, Tracking error = 5 perc and Information ratio = 50, the answer is <strong>Portfolio return</strong> = 9 perc.</li><li>With Beginning portfolio value = 30 USD, Ending portfolio value = 100 USD, Benchmark return = 1000 perc, Tracking error = 10 perc and Information ratio = 100, the answer is <strong>Portfolio return</strong> = 2.33 perc.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Portfolio return follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Beginning portfolio value and Ending portfolio value is what you already know and Portfolio return and Benchmark return is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/dividend-payout-ratio">Dividend payout ratio Calculator</a>, <a href="/finance/dividend-yield">Dividend yield Calculator</a> and <a href="/finance/double-discount">Double discount Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Information ratio calculator work out?', 'a' => <<<'TXT'
            Portfolio return, Benchmark return, Tracking error and Information ratio, from Beginning portfolio value and Ending portfolio value. The relationship is Portfolio return = ( − Beginning portfolio value + Ending portfolio value) ÷ Beginning portfolio value.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Beginning portfolio value (USD), Ending portfolio value (USD). Enter beginning portfolio value and ending portfolio value; Portfolio return is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Portfolio return, Ending portfolio value, Beginning portfolio value and Information ratio blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Portfolio return = 9 perc. The figures come from Beginning portfolio value as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Portfolio return is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Beginning portfolio value left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Portfolio return keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/dividend-payout-ratio', 'name' => 'Dividend payout ratio Calculator'],
            ['path' => '/finance/dividend-yield', 'name' => 'Dividend yield Calculator'],
            ['path' => '/finance/double-discount', 'name' => 'Double discount Calculator'],
        ],
        'authors' => [],
    ],
];
