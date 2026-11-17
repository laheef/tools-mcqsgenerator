<?php

/**
 * Maturity value
 * /finance/maturity-value
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Maturity value',
    'meta' => ['title' => 'Maturity value Calculator — Formula, Units & Example', 'description' => 'Enter principal and interest rate and get maturity value back. The answer is shown in USD. Every box can be solved for, not only the one in the title.', 'h1' => 'Maturity value Calculator', 'updated' => '2026-09-18'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'principal',
                            'label' => 'Principal',
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
                            'name' => 'interest_rate',
                            'label' => 'Interest rate',
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
                            'name' => 'time_of_investment',
                            'label' => 'Time of investment',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'maturity_value',
                            'label' => 'Maturity value',
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
            'title' => 'maturity_value = principal * (1 + interest_rate) ^ time_of_investment ',
            'results' => ['interest_rate' => 'pow(maturity_value/principal, 1/time_of_investment) - 1', 'maturity_value' => 'principal*pow(interest_rate + 1, time_of_investment)', 'time_of_investment' => 'log(maturity_value/principal)/log(interest_rate + 1)', 'principal' => 'maturity_value*pow(interest_rate + 1, -time_of_investment)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Maturity value takes Principal, Interest rate and Time of investment and returns Maturity value. Nothing is looked up on this page: maturity value is computed from principal and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Maturity value is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Maturity value calculator works', 'html' => <<<'TXT'
            <p>The Maturity value calculator applies one relationship to 3 numbers and reports Maturity value.</p><p>In the form&#039;s own words, Maturity value = Principal × (Interest rate + 1)^(Time of investment).</p><p>What comes back is Maturity value — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Principal</strong> — in USD</li><li><strong>Interest rate</strong> — in percent</li><li><strong>Time of investment</strong> — in years</li></ul><p>The result box is Maturity value in USD. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Principal = 10 USD, Interest rate = 100 perc and Time of investment = 1000 yrs; the answers are <strong>Maturity value</strong> = 10 USD.</p><ul><li><strong>Maturity value</strong> = 10 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Maturity value</strong> = <code>Principal × (Interest rate + 1)^(Time of investment)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Maturity value</strong> = 10 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Interest rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Maturity value</strong> = <code>Principal × (Interest rate + 1)^(Time of investment)</code></li><li><strong>Interest rate</strong> = <code>(Maturity value ÷ Principal)^(1 ÷ Time of investment) − 1</code></li><li><strong>Time of investment</strong> = <code>ln(Maturity value ÷ Principal) ÷ ln(Interest rate + 1)</code></li><li><strong>Principal</strong> = <code>Maturity value × (Interest rate + 1)^(− Time of investment)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Maturity value</strong> = <code>Principal × (Interest rate + 1)^(Time of investment)</code> — the form to use when Principal, Interest rate and Time of investment are the values you have.</li><li><strong>Interest rate</strong> = <code>(Maturity value ÷ Principal)^(1 ÷ Time of investment) − 1</code> — the form to use when Maturity value, Principal and Time of investment are the values you have.</li><li><strong>Time of investment</strong> = <code>ln(Maturity value ÷ Principal) ÷ ln(Interest rate + 1)</code> — the form to use when Maturity value, Principal and Interest rate are the values you have.</li><li><strong>Principal</strong> = <code>Maturity value × (Interest rate + 1)^(− Time of investment)</code> — the form to use when Maturity value, Interest rate and Time of investment are the values you have.</li></ul><p>Any one of Maturity value, Interest rate and Time of investment can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Principal, from 10 to 20 — and the answers go from <strong>Maturity value</strong> 10 USD to <strong>Maturity value</strong> 20 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Interest rate and Time of investment is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Maturity value is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Principal left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Principal is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Interest rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Interest rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Principal is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Principal</strong> takes a plain number with no unit attached. The page reads it when it works out Interest rate, Maturity value and Time of investment. Have it to hand before you start: Principal is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Maturity value, Time of investment and Principal. Have it to hand before you start: Interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Time of investment</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. The page reads it when it works out Interest rate, Maturity value and Principal. Have it to hand before you start: Time of investment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Maturity value</strong> is a plain number and the page's own defaults put it at 10. It is worked out from Principal, Interest rate and Time of investment. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Maturity value</th></tr></thead><tbody><tr><td><strong>Principal</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Interest rate</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Time of investment</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Principal sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Time of investment and Interest rate barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Principal = 5 USD, Interest rate = 50 perc and Time of investment = 500 yrs, the answer is <strong>Maturity value</strong> = 5 USD.</li><li>With Principal = 30 USD, Interest rate = 100 perc and Time of investment = 1000 yrs, the answer is <strong>Maturity value</strong> = 30 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Maturity value is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover percent and years. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Principal, Interest rate and Time of investment is what you already know and Maturity value is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/real-rate-of-return">Real rate of return Calculator</a>, <a href="/finance/receivables-turnover">Receivables turnover Calculator</a> and <a href="/finance/rsi">Relative strength index (RSI) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Maturity value calculator work out?', 'a' => <<<'TXT'
            Maturity value, from Principal, Interest rate and Time of investment. The relationship is Maturity value = Principal × (Interest rate + 1)^(Time of investment).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Principal (USD), Interest rate (percent), Time of investment (years). Fill principal, interest rate and time of investment and leave Maturity value empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Maturity value, Interest rate, Time of investment and Principal blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Maturity value = 10 USD. Those are the defaults written into the form — move Principal and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Maturity value is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Principal left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Maturity value keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/real-rate-of-return', 'name' => 'Real rate of return Calculator'],
            ['path' => '/finance/receivables-turnover', 'name' => 'Receivables turnover Calculator'],
            ['path' => '/finance/rsi', 'name' => 'Relative strength index (RSI) Calculator'],
        ],
        'authors' => [],
    ],
];
