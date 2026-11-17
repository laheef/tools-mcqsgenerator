<?php

/**
 * Time value of money
 * /finance/time-value-of-money
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Time value of money',
    'meta' => ['title' => 'Time value of money — Free Online Calculator', 'description' => 'Enter interest rate, term and compound frequency and Time value of money returns future value. Results come back in USD, with any other unit a click away.', 'h1' => 'Time value of money Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
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
                            'name' => 't',
                            'label' => 'Term',
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
                            'name' => 'compound_frequency',
                            'label' => 'Compound frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Weekly' => '52.1775',
                                'Daily' => '365.242',
                                'Continuous' => '0',
                            ],
                            'dataset' => 'data',
                            'control' => 'DROPDOWN',
                            'default' => 'Yearly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PV',
                            'label' => 'Present value',
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
                            'name' => 'FV',
                            'label' => 'Future value',
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
            'title' => 'hidden',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ct2',
                            'label' => 'Ct2',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ct1',
                            'label' => 'Ct1',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'n',
                            'label' => 'Compounding frequency',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '0'],
                            'default' => '1',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'FV = (PV * (1 + (interest_rate  / n)) ^ (n * t)) * ct1 + (PV * 2.7182818284590452353602874713527 ^ (interest_rate  * t)) * ct2',
            'results' => ['FV' => 'PV*ct1*pow(interest_rate/n + 1, n*t) + pow(10000000000000000000000000000000, -interest_rate*t)*pow(27182818284590452353602874713527, interest_rate*t)*PV*ct2', 'ct2' => 'pow(27182818284590452353602874713527/10000000000000000000000000000000, -interest_rate*t)*(FV - PV*ct1*pow((interest_rate + n)/n, n*t))/PV', 'ct1' => <<<'TXT'
            pow(10000000000000000000000000000000, -interest_rate*t)*pow((interest_rate + n)/n, -n*t)*(pow(10000000000000000000000000000000, interest_rate*t)*FV - pow(27182818284590452353602874713527, interest_rate*t)*PV*ct2)/PV
            TXT, 'PV' => <<<'TXT'
            pow(10000000000000000000000000000000, interest_rate*t)*FV/(pow(10000000000000000000000000000000, interest_rate*t)*ct1*pow((interest_rate + n)/n, n*t) + pow(27182818284590452353602874713527, interest_rate*t)*ct2)
            TXT],
        ],
        [
            'title' => 'n = compound_frequency',
            'results' => ['n' => 'compound_frequency', 'compound_frequency' => 'n'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Interest rate, Term and Present value into Time value of money and the answer comes back as Compound frequency and Future value. The arithmetic is the whole method: compound frequency is worked out from interest rate by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Time value of money calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Time value of money: it takes 3 numbers and reports Compound frequency, Future value and Ct2.</p><p>The result panel carries Compound frequency, Future value, Ct2 and Ct1, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Interest rate</strong> — in percent</li><li><strong>Term</strong> — in years / months</li><li><strong>Present value</strong> — in USD</li></ul><p>What you get back is Compound frequency, Future value in USD, Ct2, Ct1, Compounding frequency, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Interest rate = 3 perc and Term = 4 yrsmos gives <strong>Compound frequency</strong> = 1 and <strong>Compounding frequency</strong> = 1.</p><ul><li><strong>Compound frequency</strong> = 1</li><li><strong>Compounding frequency</strong> = 1</li></ul>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Compound frequency</strong> = 1 and <strong>Compounding frequency</strong> = 1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Interest rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Compounding frequency</strong> = <code>Compound frequency</code></li><li><strong>Compound frequency</strong> = <code>Compounding frequency</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Compounding frequency</strong> = <code>Compound frequency</code> — the form to use when Compound frequency are the values you have.</li><li><strong>Compound frequency</strong> = <code>Compounding frequency</code> — the form to use when Compounding frequency are the values you have.</li></ul><p>Any one of Future value, Ct2 and Ct1 can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Interest rate, from 3 to 6 — and the answers go from <strong>Compound frequency</strong> 1 and <strong>Compounding frequency</strong> 1 to <strong>Compound frequency</strong> 1 and <strong>Compounding frequency</strong> 1.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Interest rate and Term carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Compound frequency, Future value and Ct2 are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Interest rate left as a guess.</strong> Anything typed into Interest rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Term left as a guess.</strong> Anything typed into Term is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Interest rate is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Time value of money form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Future value, Ct2 and Ct1 changes with it. Fill it from a measurement rather than a memory — Interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Term</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. Change it and Future value, Ct2 and Ct1 changes with it. Fill it from a measurement rather than a memory — Term is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Present value</strong> takes a plain number with no unit attached. Change it and Future value, Ct2 and Ct1 changes with it. Fill it from a measurement rather than a memory — Present value is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Compound frequency</strong> is a plain number and the page's own defaults put it at 1. The value follows from Compounding frequency. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Future value</strong> is a plain number. The value follows from Present value, Ct1, Interest rate and Compounding frequency. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Ct2</strong> is a plain number. The value follows from Interest rate, Term, Future value and Present value. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Ct1</strong> is a plain number. The value follows from Interest rate, Term, Compounding frequency and Future value. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Compounding frequency</strong> is a plain number and the page's own defaults put it at 1. The value follows from Compound frequency. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Compound frequency</th><th>Compounding frequency</th></tr></thead><tbody><tr><td><strong>Interest rate</strong> +10%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Term</strong> +10%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Interest rate: ten per cent there moves an answer by about 0 per cent, which is why that is the number to measure twice. By contrast, Interest rate and Term barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Interest rate = 1.5 perc and Term = 2 yrsmos and the page reports <strong>Compound frequency</strong> = 1 and <strong>Compounding frequency</strong> = 1.</li><li>Feed in Interest rate = 9 perc and Term = 4 yrsmos and the page reports <strong>Compound frequency</strong> = 1 and <strong>Compounding frequency</strong> = 1.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Time value of money actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Compound frequency is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover percent and years / months. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Interest rate, Term and Present value is what you already know and Compound frequency and Future value is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/california-overtime">California overtime</a>, <a href="/finance/california-sales-tax">California sales tax</a> and <a href="/finance/california-stimulus-check">California Stimulus Check Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Time value of money calculator work out?', 'a' => 'Compound frequency, Future value, Ct2 and Ct1, from Present value, Ct1, Interest rate and Compounding frequency.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Interest rate (percent), Term (years / months), Present value (USD). Enter interest rate, term and present value; Compound frequency is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Future value, Ct2, Ct1 and Present value blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Compound frequency = 1 and Compounding frequency = 1. The figures come from Interest rate as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Compound frequency is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Interest rate blank and the page solves for it, reporting Compound frequency instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Compound frequency at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/california-overtime', 'name' => 'California overtime'],
            ['path' => '/finance/california-sales-tax', 'name' => 'California sales tax'],
            ['path' => '/finance/california-stimulus-check', 'name' => 'California Stimulus Check Calculator'],
        ],
        'authors' => [],
    ],
];
