<?php

/**
 * Loan balance
 * /finance/loan-balance
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Loan balance',
    'meta' => ['title' => 'Loan balance Calculator — Formula & Results', 'description' => 'Loan balance takes loan, interest rate and loan term and returns loan remaining. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Loan balance Calculator', 'updated' => '2026-09-30'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'loan',
                            'label' => 'Loan',
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
                            'name' => 'loan_term',
                            'label' => 'Loan term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'period',
                            'label' => 'Period',
                            'type' => 'number',
                            'help' => 'The time that has passed by since you took a loan.',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'loan_remaining',
                            'label' => 'Loan remaining',
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
            'title' => <<<'TXT'
            loan_remaining = one_way((loan * (1 + interest_rate / 12) ^ period) - (loan * (1 + interest_rate / 12) ^ loan_term) * ((interest_rate / 12) / ((1 + interest_rate / 12) ^ loan_term -1)) * ((1 + interest_rate / 12) ^ period - 1) / (interest_rate / 12))
            TXT,
            'results' => ['loan_remaining' => <<<'TXT'
            (pow(144, -period)*loan*(-pow(12, period)*pow(interest_rate + 12, loan_term + period) + pow(144, period)*pow(interest_rate + 12, loan_term) + (-pow(12, loan_term) + pow(interest_rate + 12, loan_term))*pow(12*interest_rate + 144, period))/(-pow(12, loan_term) + pow(interest_rate + 12, loan_term)))
            TXT],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Loan balance turns Loan, Interest rate and Loan term into Loan remaining. The arithmetic is the whole method: loan remaining is worked out from loan by one formula, applied once. Loan remaining comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Loan balance calculator works', 'html' => <<<'TXT'
            <p>Loan balance answers one question from 4 numbers, and the answer is Loan remaining.</p><p>The result panel carries Loan remaining, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Loan</strong> — in USD</li><li><strong>Interest rate</strong> — in percent</li><li><strong>Loan term</strong> — in years / months</li><li><strong>Period</strong> — in years / months. The time that has passed by since you took a loan.</li></ul><p>The answer comes back as Loan remaining in USD. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Loan = 3 USD, Interest rate = 4 perc, Loan term = 5 yrsmos and Period = 6 yrsmos — through the same formula and the panel reports <strong>Loan remaining</strong> = -1.31 USD.</p><ul><li><strong>Loan remaining</strong> = -1.31 USD</li></ul>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Loan remaining</strong> = -1.31 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Interest rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => '<p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul></ul>'],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Loan, from 3 to 6 — and the answers go from <strong>Loan remaining</strong> -1.31 USD to <strong>Loan remaining</strong> -2.62 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Interest rate, Loan term and Period is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Loan remaining is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Loan left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Loan is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Interest rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Interest rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Loan and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Loan balance form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Loan</strong> takes a plain number with no unit attached. The page reads it when it works out Loan remaining. Fill it from a measurement rather than a memory — Loan is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Loan remaining. Fill it from a measurement rather than a memory — Interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Loan term</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. The page reads it when it works out Loan remaining. Fill it from a measurement rather than a memory — Loan term is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Period</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. The time that has passed by since you took a loan. The page reads it when it works out Loan remaining. Fill it from a measurement rather than a memory — Period is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Loan remaining</strong> is a plain number and the page's own defaults put it at -1.31. It is worked out from Period, Loan, Interest rate and Loan term. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Loan remaining</th></tr></thead><tbody><tr><td><strong>Loan</strong> +10%</td><td>-10%</td></tr><tr><td><strong>Interest rate</strong> +10%</td><td>-6.16%</td></tr><tr><td><strong>Loan term</strong> +10%</td><td>+55.45%</td></tr><tr><td><strong>Period</strong> +10%</td><td>-75.36%</td></tr></tbody></table><p>Ranked by leverage, Period sits at the top — a ten per cent error in that box shows up as roughly 75.4 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Loan = 1.5 USD, Interest rate = 2 perc, Loan term = 2.5 yrsmos and Period = 3 yrsmos and the page reports <strong>Loan remaining</strong> = -0.3758 USD.</li><li>Feed in Loan = 9 USD, Interest rate = 4 perc, Loan term = 5 yrsmos and Period = 6 yrsmos and the page reports <strong>Loan remaining</strong> = -3.93 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Loan balance actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Loan, Interest rate, Loan term and Period ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Loan — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Loan remaining in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Loan remaining is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover percent and years / months. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Loan, Interest rate and Loan term is what you already know and Loan remaining is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/apr">APR</a>, <a href="/finance/apy">APY</a> and <a href="/finance/arm-mortgage">ARM mortgage Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Loan balance calculator work out?', 'a' => 'Loan remaining, from Period, Loan, Interest rate and Loan term.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Loan (USD), Interest rate (percent), Loan term (years / months), Period (years / months). Enter loan, interest rate and loan term; Loan remaining is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Loan remaining = -1.31 USD. The figures come from Loan as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Loan remaining is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: Loan remaining is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Loan remaining keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/apr', 'name' => 'APR'],
            ['path' => '/finance/apy', 'name' => 'APY'],
            ['path' => '/finance/arm-mortgage', 'name' => 'ARM mortgage Calculator'],
        ],
        'authors' => [],
    ],
];
