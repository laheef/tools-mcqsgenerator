<?php

/**
 * CD (certificate of deposit)
 * /finance/cd
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'CD (certificate of deposit)',
    'meta' => ['title' => 'CD (certificate of deposit) — Free Online Calculator', 'description' => 'CD (certificate of deposit) reports final balance and interest earned. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'CD (certificate of deposit) Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => 'CD details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initial_deposit',
                            'label' => 'Initial deposit',
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
                            'help' => 'Annual interest rate.',
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
                            'name' => 'term',
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
                            'name' => 'compounding_frequency',
                            'label' => 'Compounding frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1.000000000000000',
                                'Half-yearly' => '2.000000000000000',
                                'Quarterly' => '4.000000000000000',
                                'Monthly' => '12.000000000000000',
                                'Weekly' => '52.177500000000000',
                                'Daily' => '365.242000000000000',
                            ],
                            'dataset' => 'compound frequency',
                            'control' => 'DROPDOWN',
                            'default' => 'Yearly',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'final_balance',
                            'label' => 'Final balance',
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
                            'name' => 'interest_earned',
                            'label' => 'Interest earned',
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
            'title' => 'final_balance = initial_deposit * (1 + interest_rate / compounding_frequency) ^ (term * compounding_frequency)',
            'results' => ['interest_rate' => 'compounding_frequency*(pow(final_balance/initial_deposit, 1/(compounding_frequency*term)) - 1)', 'initial_deposit' => 'final_balance*pow((compounding_frequency + interest_rate)/compounding_frequency, -compounding_frequency*term)', 'final_balance' => 'initial_deposit*pow((compounding_frequency + interest_rate)/compounding_frequency, compounding_frequency*term)', 'term' => 'log(final_balance/initial_deposit)/(compounding_frequency*log((compounding_frequency + interest_rate)/compounding_frequency))'],
        ],
        [
            'title' => 'interest_earned = final_balance - initial_deposit',
            'results' => ['final_balance' => 'initial_deposit + interest_earned', 'initial_deposit' => 'final_balance - interest_earned', 'interest_earned' => 'final_balance - initial_deposit'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        CD (certificate of deposit) works out Final balance and Interest earned from Initial deposit, Interest rate and Term. Nothing is looked up on this page: final balance is computed from initial deposit and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Final balance is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the CD (certificate of deposit) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind CD (certificate of deposit): it takes 4 numbers and reports Final balance and Interest earned.</p><p>Written with the labels from the form, Final balance = Initial deposit × ((Compounding frequency + Interest rate) ÷ Compounding frequency)^(Compounding frequency × Term).</p><p>The answers are Final balance and Interest earned; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Initial deposit</strong> — in USD</li><li><strong>Interest rate</strong> — in percent. Annual interest rate.</li><li><strong>Term</strong> — in years / months</li><li><strong>Compounding frequency</strong> — a plain number, no unit</li></ul><p>The result boxes are Final balance in USD, Interest earned in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Interest rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Final balance</strong> = <code>Initial deposit × ((Compounding frequency + Interest rate) ÷ Compounding frequency)^(Compounding frequency × Term)</code></li><li><strong>Interest rate</strong> = <code>Compounding frequency × ((Final balance ÷ Initial deposit)^(1 ÷ (Compounding frequency × Term)) − 1)</code></li><li><strong>Initial deposit</strong> = <code>Final balance × ((Compounding frequency + Interest rate) ÷ Compounding frequency)^(− Compounding frequency × Term)</code></li><li><strong>Term</strong> = <code>ln(Final balance ÷ Initial deposit) ÷ (Compounding frequency × ln((Compounding frequency + Interest rate) ÷ Compounding frequency))</code></li><li><strong>Interest earned</strong> = <code>Final balance − Initial deposit</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Final balance</strong> = <code>Initial deposit × ((Compounding frequency + Interest rate) ÷ Compounding frequency)^(Compounding frequency × Term)</code> — the form to use when Initial deposit, Compounding frequency, Interest rate and Term are the values you have.</li><li><strong>Interest rate</strong> = <code>Compounding frequency × ((Final balance ÷ Initial deposit)^(1 ÷ (Compounding frequency × Term)) − 1)</code> — the form to use when Compounding frequency, Final balance, Initial deposit and Term are the values you have.</li><li><strong>Initial deposit</strong> = <code>Final balance × ((Compounding frequency + Interest rate) ÷ Compounding frequency)^(− Compounding frequency × Term)</code> — the form to use when Final balance, Compounding frequency, Interest rate and Term are the values you have.</li><li><strong>Term</strong> = <code>ln(Final balance ÷ Initial deposit) ÷ (Compounding frequency × ln((Compounding frequency + Interest rate) ÷ Compounding frequency))</code> — the form to use when Final balance, Initial deposit, Compounding frequency and Interest rate are the values you have.</li><li><strong>Interest earned</strong> = <code>Final balance − Initial deposit</code> — the form to use when Final balance and Initial deposit are the values you have.</li><li><strong>Final balance</strong> = <code>Initial deposit + Interest earned</code> — the form to use when Initial deposit and Interest earned are the values you have.</li><li><strong>Initial deposit</strong> = <code>Final balance − Interest earned</code> — the form to use when Final balance and Interest earned are the values you have.</li></ul><p>Any one of Final balance, Interest rate and Initial deposit can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Interest rate and Term carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Final balance and Interest earned are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Initial deposit left as a guess.</strong> Anything typed into Initial deposit is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Interest rate left as a guess.</strong> Anything typed into Interest rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Initial deposit is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the CD (certificate of deposit) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Initial deposit</strong> takes a plain number with no unit attached. Change it and Interest rate, Final balance and Term changes with it. Fill it from a measurement rather than a memory — Initial deposit is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Annual interest rate. Change it and Initial deposit, Final balance and Term changes with it. Fill it from a measurement rather than a memory — Interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Term</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. Change it and Interest rate, Initial deposit and Final balance changes with it. Fill it from a measurement rather than a memory — Term is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Compounding frequency</strong> takes a plain number with no unit attached. Change it and Interest rate, Initial deposit and Final balance changes with it. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Compounding frequency is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Final balance</strong> is a plain number. It is worked out from Initial deposit, Compounding frequency, Interest rate and Term. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Interest earned</strong> is a plain number. It is worked out from Final balance and Initial deposit. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on CD (certificate of deposit) actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Final balance is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover percent and years / months. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Initial deposit, Interest rate and Term measured, Final balance and Interest earned wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/texas-tax">Texas tax Calculator</a>, <a href="/finance/time-and-a-half">Time and a half Calculator</a> and <a href="/finance/time-value-of-money">Time value of money</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what CD (certificate of deposit) is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Initial deposit, Interest rate, Term and Compounding frequency beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the CD (certificate of deposit) calculator work out?', 'a' => <<<'TXT'
            Final balance and Interest earned, from Initial deposit, Compounding frequency, Interest rate and Term. The relationship is Final balance = Initial deposit × ((Compounding frequency + Interest rate) ÷ Compounding frequency)^(Compounding frequency × Term).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial deposit (USD), Interest rate (percent), Term (years / months), Compounding frequency. With initial deposit, interest rate and term in place, Final balance can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Final balance, Interest rate, Initial deposit and Term blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Final balance is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Initial deposit blank and the page solves for it, reporting Final balance instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Final balance keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/texas-tax', 'name' => 'Texas tax Calculator'],
            ['path' => '/finance/time-and-a-half', 'name' => 'Time and a half Calculator'],
            ['path' => '/finance/time-value-of-money', 'name' => 'Time value of money'],
        ],
        'authors' => [],
    ],
];
