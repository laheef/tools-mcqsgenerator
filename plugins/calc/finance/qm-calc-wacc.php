<?php

/**
 * WACC
 * /finance/wacc
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'WACC',
    'meta' => ['title' => 'WACC Calculator — Free, With Worked Examples', 'description' => 'Enter cost of equity and equity and get WACC back. Every figure is computed. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'WACC Calculator', 'updated' => '2026-09-26'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cost_of_equity',
                            'label' => 'Cost of equity',
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
                            'name' => 'Equity',
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
                            'name' => 'cost_of_debt',
                            'label' => 'Cost of debt',
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
                            'name' => 'Debt',
                            'label' => 'Debt',
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
                            'name' => 'tax',
                            'label' => 'Corporate tax rate',
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
                            'name' => 'wacc',
                            'label' => 'WACC',
                            'type' => 'number',
                            'help' => 'Weighted average cost of capital.',
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
            'title' => 'wacc = Equity / (Equity+Debt) * cost_of_equity + Debt / (Equity+Debt)* cost_of_debt* (1-tax )',
            'results' => [
                'wacc' => '(-Debt*cost_of_debt*tax + Debt*cost_of_debt + Equity*cost_of_equity)/(Debt + Equity)',
                'cost_of_debt' => '(-Debt*wacc + Equity*cost_of_equity - Equity*wacc)/(Debt*(tax - 1))',
                'cost_of_equity' => '(Debt*cost_of_debt*tax - Debt*cost_of_debt + Debt*wacc + Equity*wacc)/Equity',
                'tax' => '(Debt*cost_of_debt - Debt*wacc + Equity*(cost_of_equity - wacc))/(Debt*cost_of_debt)',
                'Debt' => 'Equity*(cost_of_equity - wacc)/(cost_of_debt*tax - cost_of_debt + wacc)',
                'Equity' => 'Debt*(cost_of_debt*tax - cost_of_debt + wacc)/(cost_of_equity - wacc)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        WACC turns Cost of equity, Equity and Cost of debt into WACC. It is a single relationship that reads WACC out of cost of equity, not a table of canned results keyed by them. Units for WACC default to percent and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the WACC calculator works', 'html' => <<<'TXT'
            <p>The WACC calculator applies one relationship to 5 numbers and reports WACC.</p><p>Written with the labels from the form, WACC = ( − Debt × Cost of debt × Corporate tax rate + Debt × Cost of debt + Equity × Cost of equity) ÷ (Debt + Equity).</p><p>The result panel carries WACC, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 5 boxes, and nothing else.</p><ul><li><strong>Cost of equity</strong> — in percent</li><li><strong>Equity</strong> — in USD</li><li><strong>Cost of debt</strong> — in percent</li><li><strong>Debt</strong> — in USD</li><li><strong>Corporate tax rate</strong> — in percent</li></ul><p>The result box is WACC in percent. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Cost of equity = 10 perc, Equity = 100 USD, Cost of debt = 1000 perc, Debt = 10 USD and Corporate tax rate = 100 perc gives <strong>WACC</strong> = -8991 perc.</p><ul><li><strong>WACC</strong> = -8991 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>WACC</strong> = <code>( − Debt × Cost of debt × Corporate tax rate + Debt × Cost of debt + Equity × Cost of equity) ÷ (Debt + Equity)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>WACC</strong> = -8991 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: WACC offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>WACC</strong> = <code>( − Debt × Cost of debt × Corporate tax rate + Debt × Cost of debt + Equity × Cost of equity) ÷ (Debt + Equity)</code></li><li><strong>Cost of debt</strong> = <code>( − Debt × WACC + Equity × Cost of equity − Equity × WACC) ÷ (Debt × (Corporate tax rate − 1))</code></li><li><strong>Cost of equity</strong> = <code>(Debt × Cost of debt × Corporate tax rate − Debt × Cost of debt + Debt × WACC + Equity × WACC) ÷ Equity</code></li><li><strong>Corporate tax rate</strong> = <code>(Debt × Cost of debt − Debt × WACC + Equity × (Cost of equity − WACC)) ÷ (Debt × Cost of debt)</code></li><li><strong>Debt</strong> = <code>Equity × (Cost of equity − WACC) ÷ (Cost of debt × Corporate tax rate − Cost of debt + WACC)</code></li><li><strong>Equity</strong> = <code>Debt × (Cost of debt × Corporate tax rate − Cost of debt + WACC) ÷ (Cost of equity − WACC)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>WACC</strong> = <code>( − Debt × Cost of debt × Corporate tax rate + Debt × Cost of debt + Equity × Cost of equity) ÷ (Debt + Equity)</code> — the form to use when Debt, Cost of debt, Corporate tax rate and Equity are the values you have.</li><li><strong>Cost of debt</strong> = <code>( − Debt × WACC + Equity × Cost of equity − Equity × WACC) ÷ (Debt × (Corporate tax rate − 1))</code> — the form to use when Debt, WACC, Equity and Cost of equity are the values you have.</li><li><strong>Cost of equity</strong> = <code>(Debt × Cost of debt × Corporate tax rate − Debt × Cost of debt + Debt × WACC + Equity × WACC) ÷ Equity</code> — the form to use when Debt, Cost of debt, Corporate tax rate and WACC are the values you have.</li><li><strong>Corporate tax rate</strong> = <code>(Debt × Cost of debt − Debt × WACC + Equity × (Cost of equity − WACC)) ÷ (Debt × Cost of debt)</code> — the form to use when Debt, Cost of debt, WACC and Equity are the values you have.</li><li><strong>Debt</strong> = <code>Equity × (Cost of equity − WACC) ÷ (Cost of debt × Corporate tax rate − Cost of debt + WACC)</code> — the form to use when Equity, Cost of equity, WACC and Cost of debt are the values you have.</li><li><strong>Equity</strong> = <code>Debt × (Cost of debt × Corporate tax rate − Cost of debt + WACC) ÷ (Cost of equity − WACC)</code> — the form to use when Debt, Cost of debt, Corporate tax rate and WACC are the values you have.</li></ul><p>Any one of WACC, Cost of debt and Cost of equity can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Cost of equity from 10 to 20, leaving every other box alone. The panel moves from <strong>WACC</strong> -8991 perc to <strong>WACC</strong> -8982 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Cost of equity, Cost of debt and Corporate tax rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with WACC is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Cost of equity left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Cost of equity is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Equity left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Equity is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Cost of equity and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the WACC form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Cost of equity</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out WACC, Cost of debt and Corporate tax rate. Fill it from a measurement rather than a memory — Cost of equity is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Equity</strong> takes a plain number with no unit attached. The page reads it when it works out WACC, Cost of debt and Cost of equity. Fill it from a measurement rather than a memory — Equity is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Cost of debt</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out WACC, Cost of equity and Corporate tax rate. Fill it from a measurement rather than a memory — Cost of debt is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Debt</strong> takes a plain number with no unit attached. The page reads it when it works out WACC, Cost of debt and Cost of equity. Fill it from a measurement rather than a memory — Debt is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Corporate tax rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out WACC, Cost of debt and Cost of equity. Fill it from a measurement rather than a memory — Corporate tax rate is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>WACC</strong> is a percent figure and the page's own defaults put it at -8991 perc. The value follows from Debt, Cost of debt, Corporate tax rate and Equity. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>WACC</th></tr></thead><tbody><tr><td><strong>Cost of equity</strong> +10%</td><td>+0.01%</td></tr><tr><td><strong>Equity</strong> +10%</td><td>+8.34%</td></tr><tr><td><strong>Cost of debt</strong> +10%</td><td>-10.01%</td></tr><tr><td><strong>Debt</strong> +10%</td><td>-9.02%</td></tr><tr><td><strong>Corporate tax rate</strong> +10%</td><td>-10.11%</td></tr></tbody></table><p>Ranked by leverage, Corporate tax rate sits at the top — a ten per cent error in that box shows up as roughly 10.1 per cent in the answer. By contrast, Cost of equity barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Cost of equity = 5 perc, Equity = 50 USD, Cost of debt = 500 perc, Debt = 5 USD and Corporate tax rate = 50 perc and the page reports <strong>WACC</strong> = -2223 perc.</li><li>Feed in Cost of equity = 30 perc, Equity = 100 USD, Cost of debt = 1000 perc, Debt = 10 USD and Corporate tax rate = 100 perc and the page reports <strong>WACC</strong> = -8973 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on WACC actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> WACC follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Cost of equity, Equity and Cost of debt are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Cost of equity, Equity and Cost of debt is what you already know and WACC is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/commission">Commission</a>, <a href="/finance/comparative-advantage">Comparative advantage Calculator</a> and <a href="/finance/compound-growth">Compound growth Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the WACC calculator work out?', 'a' => <<<'TXT'
            WACC, from Debt, Cost of debt, Corporate tax rate and Equity. The relationship is WACC = ( − Debt × Cost of debt × Corporate tax rate + Debt × Cost of debt + Equity × Cost of equity) ÷ (Debt + Equity).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Cost of equity (percent), Equity (USD), Cost of debt (percent), Debt (USD), Corporate tax rate (percent). Enter cost of equity, equity and cost of debt; WACC is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of WACC, Cost of debt, Cost of equity and Corporate tax rate blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'WACC = -8991 perc. Those are the defaults written into the form — move Cost of equity and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally WACC is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Cost of equity blank and the page solves for it, reporting WACC instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. WACC keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/commission', 'name' => 'Commission'],
            ['path' => '/finance/comparative-advantage', 'name' => 'Comparative advantage Calculator'],
            ['path' => '/finance/compound-growth', 'name' => 'Compound growth Calculator'],
        ],
        'authors' => [],
    ],
];
