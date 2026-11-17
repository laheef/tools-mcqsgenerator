<?php

/**
 * EMI
 * /finance/emi
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'EMI',
    'meta' => ['title' => 'EMI Calculator — Free, With Worked Examples', 'description' => 'Enter principal loan amount, loan term and interest rate and EMI returns EMI (equated monthly installment) and total amount payable. Every figure is computed.', 'h1' => 'EMI Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Quickly find out the value of the monthly payment of your loan with our EMI calculator. Input the loan amount, the interest rate, and the term, and we'll do the rest.
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'principal',
                            'label' => 'Principal loan amount',
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
                            'name' => 'term',
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
                            'name' => 'rate',
                            'label' => 'Interest rate',
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
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'emi',
                            'label' => 'EMI (equated monthly installment)',
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
                            'name' => 'total_paid',
                            'label' => 'Total amount payable',
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
                            'name' => 'total',
                            'label' => 'Total interest due',
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
            'title' => 'emi = principal * (rate/12)  * (1+(rate/12))^term / (((1+(rate/12))^term) - 1)',
            'results' => ['emi' => '(1/12)*principal*rate*pow(rate + 12, term)/(-pow(12, term) + pow(rate + 12, term))', 'principal' => '12*emi*(-pow(12, term) + pow(rate + 12, term))*pow(rate + 12, -term)/rate'],
        ],
        [
            'title' => 'total = (emi * term) - principal',
            'results' => ['total' => 'emi*term - principal', 'term' => '(principal + total)/emi', 'principal' => 'emi*term - total', 'emi' => '(principal + total)/term'],
        ],
        [
            'title' => 'total_paid = principal + total',
            'results' => ['total' => '-principal + total_paid', 'total_paid' => 'principal + total', 'principal' => '-total + total_paid'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Principal loan amount, Loan term and Interest rate into EMI and the answer comes back as EMI (equated monthly installment) and Total amount payable. There is no hidden constant here: change EMI (equated monthly installment) and principal loan amount moves with it. The main result, EMI (equated monthly installment), is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the EMI calculator works', 'html' => <<<'TXT'
            <p>The EMI calculator applies one relationship to 3 numbers and reports EMI (equated monthly installment), Total amount payable and Total interest due.</p><p>The relationship it solves reads EMI (equated monthly installment) = (1 ÷ 12) × Principal loan amount × Interest rate × (Interest rate + 12)^(Loan term) ÷ ( − (12)^(Loan term) + (Interest rate + 12)^(Loan term)).</p><p>What comes back is EMI (equated monthly installment), Total amount payable and Total interest due — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Principal loan amount</strong> — in USD</li><li><strong>Loan term</strong> — in years / months</li><li><strong>Interest rate</strong> — in percent</li></ul><p>The result boxes are EMI (equated monthly installment) in USD, Total amount payable in USD, Total interest due in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Loan term lists 9 options and opens on years / months. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>EMI (equated monthly installment)</strong> = <code>(1 ÷ 12) × Principal loan amount × Interest rate × (Interest rate + 12)^(Loan term) ÷ ( − (12)^(Loan term) + (Interest rate + 12)^(Loan term))</code></li><li><strong>Principal loan amount</strong> = <code>12 × EMI (equated monthly installment) × ( − (12)^(Loan term) + (Interest rate + 12)^(Loan term)) × (Interest rate + 12)^(− Loan term) ÷ Interest rate</code></li><li><strong>Total interest due</strong> = <code>EMI (equated monthly installment) × Loan term − Principal loan amount</code></li><li><strong>Loan term</strong> = <code>(Principal loan amount + Total interest due) ÷ EMI (equated monthly installment)</code></li><li><strong>Total amount payable</strong> = <code>Principal loan amount + Total interest due</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>EMI (equated monthly installment)</strong> = <code>(1 ÷ 12) × Principal loan amount × Interest rate × (Interest rate + 12)^(Loan term) ÷ ( − (12)^(Loan term) + (Interest rate + 12)^(Loan term))</code> — the form to use when Principal loan amount, Interest rate and Loan term are the values you have.</li><li><strong>Principal loan amount</strong> = <code>12 × EMI (equated monthly installment) × ( − (12)^(Loan term) + (Interest rate + 12)^(Loan term)) × (Interest rate + 12)^(− Loan term) ÷ Interest rate</code> — the form to use when EMI (equated monthly installment), Loan term and Interest rate are the values you have.</li><li><strong>Total interest due</strong> = <code>EMI (equated monthly installment) × Loan term − Principal loan amount</code> — the form to use when EMI (equated monthly installment), Loan term and Principal loan amount are the values you have.</li><li><strong>Loan term</strong> = <code>(Principal loan amount + Total interest due) ÷ EMI (equated monthly installment)</code> — the form to use when Principal loan amount, Total interest due and EMI (equated monthly installment) are the values you have.</li><li><strong>Principal loan amount</strong> = <code>EMI (equated monthly installment) × Loan term − Total interest due</code> — the form to use when EMI (equated monthly installment), Loan term and Total interest due are the values you have.</li><li><strong>EMI (equated monthly installment)</strong> = <code>(Principal loan amount + Total interest due) ÷ Loan term</code> — the form to use when Principal loan amount, Total interest due and Loan term are the values you have.</li><li><strong>Total amount payable</strong> = <code>Principal loan amount + Total interest due</code> — the form to use when Principal loan amount and Total interest due are the values you have.</li><li><strong>Total interest due</strong> = <code>− Principal loan amount + Total amount payable</code> — the form to use when Principal loan amount and Total amount payable are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of EMI (equated monthly installment), Principal loan amount and Total interest due can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Loan term and Interest rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> EMI (equated monthly installment), Total amount payable and Total interest due are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Principal loan amount left as a guess.</strong> Anything typed into Principal loan amount is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Loan term left as a guess.</strong> Anything typed into Loan term is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Principal loan amount to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the EMI form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Principal loan amount</strong> takes a plain number with no unit attached. Change it and EMI (equated monthly installment), Total interest due and Loan term changes with it. Fill it from a measurement rather than a memory — Principal loan amount is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Loan term</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. Change it and EMI (equated monthly installment), Principal loan amount and Total interest due changes with it. Fill it from a measurement rather than a memory — Loan term is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and EMI (equated monthly installment) and Principal loan amount changes with it. Fill it from a measurement rather than a memory — Interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>EMI (equated monthly installment)</strong> is a plain number. It is worked out from Principal loan amount, Interest rate and Loan term. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total amount payable</strong> is a plain number. It is worked out from Principal loan amount and Total interest due. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total interest due</strong> is a plain number. It is worked out from EMI (equated monthly installment), Loan term and Principal loan amount. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on EMI actually offers.</p><ul><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind EMI (equated monthly installment) is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are years / months and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Principal loan amount, Loan term and Interest rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Principal loan amount, Loan term and Interest rate measured, EMI (equated monthly installment) and Total amount payable wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/fixed-asset-turnover">Fixed asset turnover</a>, <a href="/finance/fixed-deposit">Fixed deposit Calculator</a> and <a href="/finance/florida-overtime">Florida overtime Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the EMI calculator work out?', 'a' => <<<'TXT'
            EMI (equated monthly installment), Total amount payable and Total interest due, from Principal loan amount, Interest rate and Loan term. The relationship is EMI (equated monthly installment) = (1 ÷ 12) × Principal loan amount × Interest rate × (Interest rate + 12)^(Loan term) ÷ ( − (12)^(Loan term) + (Interest rate + 12)^(Loan term)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Principal loan amount (USD), Loan term (years / months), Interest rate (percent). Fill principal loan amount, loan term and interest rate and leave EMI (equated monthly installment) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. EMI (equated monthly installment), Principal loan amount, Total interest due and Loan term can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            EMI (equated monthly installment) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Principal loan amount blank and the page solves for it, reporting EMI (equated monthly installment) instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. EMI (equated monthly installment) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/fixed-asset-turnover', 'name' => 'Fixed asset turnover'],
            ['path' => '/finance/fixed-deposit', 'name' => 'Fixed deposit Calculator'],
            ['path' => '/finance/florida-overtime', 'name' => 'Florida overtime Calculator'],
        ],
        'authors' => [],
    ],
];
