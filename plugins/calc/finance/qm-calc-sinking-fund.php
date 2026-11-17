<?php

/**
 * Sinking fund
 * /finance/sinking-fund
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sinking fund',
    'meta' => ['title' => 'Sinking fund Calculator — Formula & Results', 'description' => 'Sinking fund turns money to accumulate and annual interest rate into USSF factor. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Sinking fund Calculator', 'updated' => '2026-09-26'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'money_accumulate',
                            'label' => 'Money to accumulate',
                            'type' => 'number',
                            'help' => 'Amount of money you want to have at the end of the period.',
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
                            'label' => 'Annual interest rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'compound_freq',
                            'label' => 'Rate compounding frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Semiannual' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Weekly' => '52',
                                'Daily' => '365',
                            ],
                            'dataset' => 'compounding_freq',
                            'control' => 'DROPDOWN',
                            'default' => 'Yearly',
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
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '60.000000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ussf',
                            'label' => 'USSF factor',
                            'type' => 'number',
                            'help' => 'Uniform Series Sinking Fund Factor — multiply your money to accumulate by this factor to get your required contribution',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'required_contribution',
                            'label' => 'Required contribution',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'compound_freq == 1 and required_contribution > 0', 'text' => 'Your yearly contribution should be {{required_contribution.monetaryValue}} to achieve your goal.&nbsp;'],
                                ['when' => 'compound_freq == 2 and required_contribution > 0', 'text' => 'Your semiannual contribution should be {{required_contribution.monetaryValue}} to achieve your goal.&nbsp;'],
                                ['when' => 'compound_freq == 4 and required_contribution > 0', 'text' => 'Your quarterly contribution should be {{required_contribution.monetaryValue}} to achieve your goal.&nbsp;'],
                                ['when' => 'compound_freq == 12 and required_contribution > 0', 'text' => 'Your monthly contribution should be {{required_contribution.monetaryValue}} to achieve your goal.&nbsp;'],
                                ['when' => 'compound_freq == 52 and required_contribution > 0', 'text' => 'Your weekly contribution should be {{required_contribution.monetaryValue}} to achieve your goal.&nbsp;'],
                                ['when' => 'compound_freq == 365 and required_contribution > 0', 'text' => 'Your daily contribution should be {{required_contribution.monetaryValue}} to achieve your goal.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest',
                            'label' => 'Interest',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'required_contribution = money_accumulate * ussf',
            'results' => ['required_contribution' => 'money_accumulate*ussf', 'money_accumulate' => 'required_contribution/ussf', 'ussf' => 'required_contribution/money_accumulate'],
        ],
        [
            'title' => 'interest= interest_rate / (compound_freq*100)',
            'results' => ['interest' => '(1/100)*interest_rate/compound_freq', 'interest_rate' => '100*compound_freq*interest', 'compound_freq' => '(1/100)*interest_rate/interest'],
        ],
        [
            'title' => 'ussf =  (interest / ((interest + 1) ^ (compound_freq * period) - 1))',
            'results' => ['period' => 'log((interest + ussf)/ussf)/(compound_freq*log(interest + 1))', 'ussf' => 'interest/(pow(interest + 1, compound_freq*period) - 1)', 'compound_freq' => 'log((interest + ussf)/ussf)/(period*log(interest + 1))'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Sinking fund works out Annual interest rate and Rate compounding frequency from Money to accumulate and USSF factor. Nothing is looked up on this page: annual interest rate is computed from money to accumulate and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Annual interest rate is opened in %; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Sinking fund calculator works', 'html' => <<<'TXT'
            <p>The Sinking fund calculator applies one relationship to 2 numbers and reports Annual interest rate, Rate compounding frequency and Period.</p><p>Written with the labels from the form, Required contribution = Money to accumulate × USSF factor.</p><p>What comes back is Annual interest rate, Rate compounding frequency, Period and Required contribution — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Money to accumulate</strong> — in USD. Amount of money you want to have at the end of the period.</li><li><strong>USSF factor</strong> — a plain number, no unit. Uniform Series Sinking Fund Factor — multiply your money to accumulate by this factor to get your required contribution</li></ul><p>The result boxes are Annual interest rate in %, Rate compounding frequency, Period in years / months, Required contribution in USD, Interest; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Money to accumulate = 10 USD, Annual interest rate = 100 %, Rate compounding frequency = 1, Period = 60 yrsmos, USSF factor = 10 and Interest = 100; the answers are <strong>Required contribution</strong> = 100 USD.</p><ul><li><strong>Required contribution</strong> = 100 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Required contribution</strong> = <code>Money to accumulate × USSF factor</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Required contribution</strong> = 100. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Period lists 9 options and opens on years / months. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Required contribution</strong> = <code>Money to accumulate × USSF factor</code></li><li><strong>Money to accumulate</strong> = <code>Required contribution ÷ USSF factor</code></li><li><strong>USSF factor</strong> = <code>Required contribution ÷ Money to accumulate</code></li><li><strong>Interest</strong> = <code>(1 ÷ 100) × Annual interest rate ÷ Rate compounding frequency</code></li><li><strong>Annual interest rate</strong> = <code>100 × Rate compounding frequency × Interest</code></li><li><strong>Rate compounding frequency</strong> = <code>(1 ÷ 100) × Annual interest rate ÷ Interest</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Required contribution</strong> = <code>Money to accumulate × USSF factor</code> — the form to use when Money to accumulate and USSF factor are the values you have.</li><li><strong>Money to accumulate</strong> = <code>Required contribution ÷ USSF factor</code> — the form to use when Required contribution and USSF factor are the values you have.</li><li><strong>USSF factor</strong> = <code>Required contribution ÷ Money to accumulate</code> — the form to use when Required contribution and Money to accumulate are the values you have.</li><li><strong>Interest</strong> = <code>(1 ÷ 100) × Annual interest rate ÷ Rate compounding frequency</code> — the form to use when Annual interest rate and Rate compounding frequency are the values you have.</li><li><strong>Annual interest rate</strong> = <code>100 × Rate compounding frequency × Interest</code> — the form to use when Rate compounding frequency and Interest are the values you have.</li><li><strong>Rate compounding frequency</strong> = <code>(1 ÷ 100) × Annual interest rate ÷ Interest</code> — the form to use when Annual interest rate and Interest are the values you have.</li><li><strong>USSF factor</strong> = <code>Interest ÷ ((Interest + 1)^(Rate compounding frequency × Period) − 1)</code> — the form to use when Interest, Rate compounding frequency and Period are the values you have.</li><li><strong>Period</strong> = <code>ln((Interest + USSF factor) ÷ USSF factor) ÷ (Rate compounding frequency × ln(Interest + 1))</code> — the form to use when Interest, USSF factor and Rate compounding frequency are the values you have.</li></ul><p>Any one of Required contribution, Money to accumulate and USSF factor can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Money to accumulate, from 10 to 20 — and the answers go from <strong>Required contribution</strong> 100 USD to <strong>Required contribution</strong> 200 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Annual interest rate, Rate compounding frequency and Period are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Money to accumulate left as a guess.</strong> Anything typed into Money to accumulate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>USSF factor left as a guess.</strong> Anything typed into USSF factor is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Money to accumulate and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Money to accumulate</strong> takes a plain number with no unit attached. Amount of money you want to have at the end of the period. The page reads it when it works out Required contribution and USSF factor. Have it to hand before you start: Money to accumulate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>USSF factor</strong> takes a plain number with no unit attached. Uniform Series Sinking Fund Factor — multiply your money to accumulate by this factor to get your required contribution. The page reads it when it works out Required contribution, Money to accumulate and Period. Have it to hand before you start: USSF factor is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Annual interest rate</strong> is a plain number. It is worked out from Rate compounding frequency and Interest. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Rate compounding frequency</strong> is a plain number. It is worked out from Annual interest rate and Interest. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Period</strong> is a years / months figure. It is worked out from Interest, USSF factor and Rate compounding frequency. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Required contribution</strong> is a plain number and the page's own defaults put it at 100. It is worked out from Money to accumulate and USSF factor. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Interest</strong> is a plain number. It is worked out from Annual interest rate and Rate compounding frequency. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Required contribution</th></tr></thead><tbody><tr><td><strong>Money to accumulate</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Annual interest rate</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Rate compounding frequency</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Period</strong> +10%</td><td>+0%</td></tr><tr><td><strong>USSF factor</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Interest</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Money to accumulate: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Annual interest rate, Rate compounding frequency and Period barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Money to accumulate = 5 USD, Annual interest rate = 50 %, Rate compounding frequency = 0.5, Period = 30 yrsmos, USSF factor = 5 and Interest = 50, the answer is <strong>Required contribution</strong> = 25 USD.</li><li>With Money to accumulate = 30 USD, Annual interest rate = 100 %, Rate compounding frequency = 1, Period = 60 yrsmos, USSF factor = 10 and Interest = 100, the answer is <strong>Required contribution</strong> = 300 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Annual interest rate is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover years / months. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Money to accumulate and USSF factor and the number you are missing is Annual interest rate and Rate compounding frequency.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/yearly-wage">Yearly wage Calculator</a>, <a href="/finance/yield-to-call">Yield to call Calculator</a> and <a href="/finance/yield-to-maturity">Yield to maturity</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sinking fund calculator work out?', 'a' => <<<'TXT'
            Annual interest rate, Rate compounding frequency, Period and Required contribution, from Money to accumulate and USSF factor. The relationship is Required contribution = Money to accumulate × USSF factor.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Money to accumulate (USD), USSF factor. Enter money to accumulate and USSF factor; Annual interest rate is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Required contribution, Money to accumulate, USSF factor and Interest blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Required contribution = 100 USD. That comes from the page\'s own defaults, entered in Money to accumulate; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Annual interest rate is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Money to accumulate left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Annual interest rate keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/yearly-wage', 'name' => 'Yearly wage Calculator'],
            ['path' => '/finance/yield-to-call', 'name' => 'Yield to call Calculator'],
            ['path' => '/finance/yield-to-maturity', 'name' => 'Yield to maturity'],
        ],
        'authors' => [],
    ],
];
