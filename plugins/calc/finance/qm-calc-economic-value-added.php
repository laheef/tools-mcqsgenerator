<?php

/**
 * Economic value added
 * /finance/economic-value-added
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Economic value added',
    'meta' => ['title' => 'Economic value added: Formula, Steps & Results', 'description' => 'Economic value added works out invested capital from NOPAT and invested capital. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Economic value added Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nopat',
                            'label' => 'NOPAT',
                            'type' => 'number',
                            'help' => 'Net operating profit after tax',
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
                            'name' => 'invested_capital_copy',
                            'label' => 'Invested capital',
                            'type' => 'number',
                            'help' => 'To calculate the invested capital amount, press the "Calculate invested capital" section below.',
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
                            'name' => 'wacc',
                            'label' => 'WACC',
                            'type' => 'number',
                            'help' => 'Weighted average cost of capital',
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
                            'name' => 'economic_value_added',
                            'label' => 'Economic value added',
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
            'title' => 'Calculate invested capital',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_asset',
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
                            'name' => 'current_liabilities',
                            'label' => 'Current liabilities',
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
                            'name' => 'invested_capital',
                            'label' => 'Invested capital',
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
            'title' => 'economic_value_added=nopat-(invested_capital*wacc)',
            'results' => ['invested_capital' => '(-economic_value_added + nopat)/wacc', 'economic_value_added' => '-invested_capital*wacc + nopat', 'nopat' => 'economic_value_added + invested_capital*wacc', 'wacc' => '(-economic_value_added + nopat)/invested_capital'],
        ],
        [
            'title' => 'invested_capital = total_asset - current_liabilities',
            'results' => ['invested_capital' => '-current_liabilities + total_asset', 'total_asset' => 'current_liabilities + invested_capital', 'current_liabilities' => '-invested_capital + total_asset'],
        ],
        [
            'title' => 'invested_capital = invested_capital_copy',
            'results' => ['invested_capital_copy' => 'invested_capital', 'invested_capital' => 'invested_capital_copy'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Economic value added takes NOPAT and WACC and returns Invested capital and Economic value added. Nothing is looked up on this page: invested capital is computed from NOPAT and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Invested capital is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Economic value added calculator works', 'html' => <<<'TXT'
            <p>Economic value added answers one question from 3 numbers, and the answer is Invested capital, Economic value added and Total assets.</p><p>The relationship it solves reads Economic value added = − Invested capital × WACC + NOPAT.</p><p>The result panel carries Invested capital, Economic value added, Total assets and Current liabilities, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>NOPAT</strong> — in USD. Net operating profit after tax</li><li><strong>WACC</strong> — in percent. Weighted average cost of capital</li><li><strong>Invested capital</strong> — in USD</li></ul><p>The answers come back as Invested capital in USD, Economic value added in USD, Total assets in USD, Current liabilities in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, NOPAT = 10 USD, Invested capital = 100 USD, WACC = 1000 perc, Economic value added = 10 USD, Total assets = 100 USD and Current liabilities = 1000 USD; the answers are <strong>Invested capital</strong> = 0 USD.</p><ul><li><strong>Invested capital</strong> = 0 USD</li></ul><p>The line behind those figures is <strong>Economic value added</strong> = <code>− Invested capital × WACC + NOPAT</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Invested capital</strong> = 0 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: WACC offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Economic value added</strong> = <code>− Invested capital × WACC + NOPAT</code></li><li><strong>Invested capital</strong> = <code>( − Economic value added + NOPAT) ÷ WACC</code></li><li><strong>NOPAT</strong> = <code>Economic value added + Invested capital × WACC</code></li><li><strong>WACC</strong> = <code>( − Economic value added + NOPAT) ÷ Invested capital</code></li><li><strong>Total assets</strong> = <code>Current liabilities + Invested capital</code></li><li><strong>Current liabilities</strong> = <code>− Invested capital + Total assets</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Economic value added</strong> = <code>− Invested capital × WACC + NOPAT</code> — the form to use when Invested capital, WACC and NOPAT are the values you have.</li><li><strong>Invested capital</strong> = <code>( − Economic value added + NOPAT) ÷ WACC</code> — the form to use when Economic value added, NOPAT and WACC are the values you have.</li><li><strong>NOPAT</strong> = <code>Economic value added + Invested capital × WACC</code> — the form to use when Economic value added, Invested capital and WACC are the values you have.</li><li><strong>WACC</strong> = <code>( − Economic value added + NOPAT) ÷ Invested capital</code> — the form to use when Economic value added, NOPAT and Invested capital are the values you have.</li><li><strong>Invested capital</strong> = <code>− Current liabilities + Total assets</code> — the form to use when Current liabilities and Total assets are the values you have.</li><li><strong>Total assets</strong> = <code>Current liabilities + Invested capital</code> — the form to use when Current liabilities and Invested capital are the values you have.</li><li><strong>Current liabilities</strong> = <code>− Invested capital + Total assets</code> — the form to use when Invested capital and Total assets are the values you have.</li><li><strong>Invested capital</strong> = <code>Invested capital</code> — the form to use when Invested capital are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Economic value added, Invested capital and NOPAT can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — NOPAT, from 10 to 20 — and the answers go from <strong>Invested capital</strong> 0 USD to <strong>Invested capital</strong> 0.01 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside WACC is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Invested capital, Economic value added and Total assets are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>NOPAT left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If NOPAT is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>WACC left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If WACC is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert NOPAT to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>NOPAT</strong> takes a plain number with no unit attached. Net operating profit after tax. Change it and Invested capital, Economic value added and WACC changes with it. Have it to hand before you start: NOPAT is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>WACC</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Weighted average cost of capital. Change it and Invested capital, Economic value added and NOPAT changes with it. Have it to hand before you start: WACC is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Invested capital</strong> takes a plain number with no unit attached. Change it and Economic value added, NOPAT and WACC changes with it. Have it to hand before you start: Invested capital is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Invested capital</strong> is a plain number. The value follows from Invested capital. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Economic value added</strong> is a plain number. The value follows from Invested capital, WACC and NOPAT. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total assets</strong> is a plain number. The value follows from Current liabilities and Invested capital. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Current liabilities</strong> is a plain number. The value follows from Invested capital and Total assets. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Invested capital</th></tr></thead><tbody><tr><td><strong>NOPAT</strong> +10%</td><td>—</td></tr><tr><td><strong>Invested capital</strong> +10%</td><td>—</td></tr><tr><td><strong>WACC</strong> +10%</td><td>—</td></tr><tr><td><strong>Economic value added</strong> +10%</td><td>—</td></tr><tr><td><strong>Total assets</strong> +10%</td><td>—</td></tr><tr><td><strong>Current liabilities</strong> +10%</td><td>—</td></tr></tbody></table><p>Ranked by leverage, NOPAT sits at the top — a ten per cent error in that box shows up as roughly 0 per cent in the answer. By contrast, NOPAT, Invested capital and WACC barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With NOPAT = 5 USD, Invested capital = 50 USD, WACC = 500 perc, Economic value added = 5 USD, Total assets = 50 USD and Current liabilities = 500 USD, the answer is <strong>Invested capital</strong> = 0 USD.</li><li>With NOPAT = 30 USD, Invested capital = 100 USD, WACC = 1000 perc, Economic value added = 10 USD, Total assets = 100 USD and Current liabilities = 1000 USD, the answer is <strong>Invested capital</strong> = 0.02 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Invested capital follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: NOPAT, WACC and Invested capital measured, Invested capital and Economic value added wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/year-over-year-growth">Year over year growth Calculator</a>, <a href="/finance/yearly-wage">Yearly wage Calculator</a> and <a href="/finance/yield-to-call">Yield to call Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Economic value added calculator work out?', 'a' => <<<'TXT'
            Invested capital, Economic value added, Total assets and Current liabilities, from Invested capital, WACC and NOPAT. The relationship is Economic value added = − Invested capital × WACC + NOPAT.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            NOPAT (USD), WACC (percent), Invested capital (USD). With NOPAT, WACC and invested capital in place, Invested capital can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Economic value added, Invested capital, NOPAT and WACC can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Invested capital = 0 USD. The figures come from NOPAT as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Invested capital is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With NOPAT left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Invested capital at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/year-over-year-growth', 'name' => 'Year over year growth Calculator'],
            ['path' => '/finance/yearly-wage', 'name' => 'Yearly wage Calculator'],
            ['path' => '/finance/yield-to-call', 'name' => 'Yield to call Calculator'],
        ],
        'authors' => [],
    ],
];
