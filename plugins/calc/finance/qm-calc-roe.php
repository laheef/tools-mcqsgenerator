<?php

/**
 * Return on equity (ROE)
 * /finance/roe
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Return on equity (ROE)',
    'meta' => ['title' => 'Return on equity (ROE) Calculator: Free, With Steps', 'description' => 'Enter net profit and equity and get Return on equity (ROE) back. Every figure is computed. Results come back in perc, with any other unit a click away.', 'h1' => 'Return on equity (ROE) Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'net_profit',
                            'label' => 'Net profit',
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
                            'name' => 'equity',
                            'label' => 'Equity',
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
                            'name' => 'ROE',
                            'label' => 'Return on equity (ROE)',
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
            'title' => 'ROE=(net_profit/equity)',
            'results' => ['ROE' => 'net_profit/equity', 'net_profit' => 'ROE*equity', 'equity' => 'net_profit/ROE'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Return on equity (ROE) turns Net profit and Equity into Return on equity (ROE). There is no hidden constant here: change return on equity (ROE) and net profit moves with it. The main result, Return on equity (ROE), is reported in percent.
        TXT,
        'sections' => [
            ['title' => 'How the Return on equity (ROE) calculator works', 'html' => <<<'TXT'
            <p>The Return on equity (ROE) calculator applies one relationship to 2 numbers and reports Return on equity (ROE).</p><p>In the form&#039;s own words, Return on equity (ROE) = Net profit ÷ Equity.</p><p>The answers are Return on equity (ROE); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Net profit</strong> — in USD</li><li><strong>Equity</strong> — in USD</li></ul><p>The answer comes back as Return on equity (ROE) in percent. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Net profit = 10 USD and Equity = 100 USD; the answers are <strong>Return on equity (ROE)</strong> = 0.1 perc.</p><ul><li><strong>Return on equity (ROE)</strong> = 0.1 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Return on equity (ROE)</strong> = <code>Net profit ÷ Equity</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Return on equity (ROE)</strong> = 0.1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Return on equity (ROE) offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Return on equity (ROE)</strong> = <code>Net profit ÷ Equity</code></li><li><strong>Net profit</strong> = <code>Return on equity (ROE) × Equity</code></li><li><strong>Equity</strong> = <code>Net profit ÷ Return on equity (ROE)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Return on equity (ROE)</strong> = <code>Net profit ÷ Equity</code> — the form to use when Net profit and Equity are the values you have.</li><li><strong>Net profit</strong> = <code>Return on equity (ROE) × Equity</code> — the form to use when Return on equity (ROE) and Equity are the values you have.</li><li><strong>Equity</strong> = <code>Net profit ÷ Return on equity (ROE)</code> — the form to use when Net profit and Return on equity (ROE) are the values you have.</li></ul><p>Any one of Return on equity (ROE), Net profit and Equity can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Net profit from 10 to 20, leaving every other box alone. The panel moves from <strong>Return on equity (ROE)</strong> 0.1 perc to <strong>Return on equity (ROE)</strong> 0.2 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Return on equity (ROE) is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Net profit left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Net profit is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Equity left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Equity is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Net profit to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Return on equity (ROE) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Net profit</strong> takes a plain number with no unit attached. It feeds Return on equity (ROE) and Equity. Fill it from a measurement rather than a memory — Net profit is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Equity</strong> takes a plain number with no unit attached. It feeds Return on equity (ROE) and Net profit. Fill it from a measurement rather than a memory — Equity is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Return on equity (ROE)</strong> is a percent figure and the page's own defaults put it at 0.1 perc. The value follows from Net profit and Equity. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Return on equity (ROE)</th></tr></thead><tbody><tr><td><strong>Net profit</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Equity</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Net profit sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Net profit = 5 USD and Equity = 50 USD and the page reports <strong>Return on equity (ROE)</strong> = 0.1 perc.</li><li>Feed in Net profit = 30 USD and Equity = 100 USD and the page reports <strong>Return on equity (ROE)</strong> = 0.3 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Return on equity (ROE) actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Net profit and Equity ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Net profit — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Return on equity (ROE) in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Return on equity (ROE) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Net profit and Equity are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Net profit and Equity is what you already know and Return on equity (ROE) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/deferred-payment-loan">Deferred payment loan Calculator</a>, <a href="/finance/degree-of-operating-leverage">Degree of operating leverage Calculator</a> and <a href="/finance/depreciation">Depreciation Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Return on equity (ROE) calculator work out?', 'a' => 'Return on equity (ROE), from Net profit and Equity. The relationship is Return on equity (ROE) = Net profit ÷ Equity.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Net profit (USD), Equity (USD). Fill net profit and equity and leave Return on equity (ROE) empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Return on equity (ROE), Net profit and Equity blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Return on equity (ROE) = 0.1 perc. The figures come from Net profit as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Return on equity (ROE) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Net profit blank and the page solves for it, reporting Return on equity (ROE) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Return on equity (ROE) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/deferred-payment-loan', 'name' => 'Deferred payment loan Calculator'],
            ['path' => '/finance/degree-of-operating-leverage', 'name' => 'Degree of operating leverage Calculator'],
            ['path' => '/finance/depreciation', 'name' => 'Depreciation Calculator'],
        ],
        'authors' => [],
    ],
];
