<?php

/**
 * Dream come true
 * /finance/dream-come-true
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dream come true',
    'meta' => ['title' => 'Dream come true — Formula, Steps & Examples', 'description' => 'Dream come true turns price tag on your dream and initial savings into time you need. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Dream come true Calculator', 'updated' => '2026-09-02'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price',
                            'label' => 'Price tag on your dream',
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
                            'name' => 'initial_balance',
                            'label' => 'Initial savings',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wage',
                            'label' => 'Monthly savings',
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
                            'name' => 'r',
                            'label' => 'Interest rate (per year)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'percentyear',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'months',
                            'label' => 'Time you need',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'This interest rate looks a bit too good to be true... Are you sure you can find such an investment?'],
                                ['when' => 'r <= 0.15/12', 'text' => 'You found a gem among investments! You just have to save a bit, your money will do most of the work.'],
                                ['when' => 'r <= 0.10/12', 'text' => 'It looks like a good investment option — your money is working for you!'],
                                ['when' => 'r <= 0.04/12', 'text' => 'You found an average investment. Maybe try looking into alternative options?'],
                                ['when' => 'r < 0.02/12', 'text' => 'It seems that your investment has a small interest rate... Are you sure there are no better options?'],
                                ['when' => null, 'text' => 'If you implement this plan, you will make your dream happen in just {{yrs.value}} years and {{mths.value}} months!'],
                                ['when' => 'mths ==1', 'text' => 'If you implement this plan, you will make your dream happen in just {{yrs.value}} years and {{mths.value}} month!'],
                                ['when' => 'mths ==0', 'text' => 'If you implement this plan, you will make your dream happen in just {{yrs.value}} years!'],
                                ['when' => 'mths ==0 and yrs ==1', 'text' => 'If you implement this plan, you will make your dream happen in just {{yrs.value}} year!'],
                                ['when' => 'yrs ==0', 'text' => 'If you implement this plan, you will make your dream happen in just {{mths.value}} months!'],
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
                            'name' => 'fake2',
                            'label' => 'Fake2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fake',
                            'label' => 'Fake',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initial',
                            'label' => 'Initial',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'yrs',
                            'label' => 'Yrs',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mths',
                            'label' => 'Mths',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest_earned',
                            'label' => 'Interest earned',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthly',
                            'label' => 'Monthly',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'intr_e',
                            'label' => 'Intr e',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'months = log((price + wage/r)/(wage /r +initial_balance)) / (log(1+r))',
            'results' => ['months' => 'log((price*r + wage)/(initial_balance*r + wage))/log(r + 1)', 'price' => '(-wage + (initial_balance*r + wage)*exp(months*log(r + 1)))/r', 'wage' => '-r*(initial_balance*exp(months*log(r + 1)) - price)/(exp(months*log(r + 1)) - 1)', 'initial_balance' => '(price*r - wage*exp(months*log(r + 1)) + wage)*exp(-months*log(r + 1))/r'],
        ],
        [
            'title' => 'initial=round(initial_balance*1)',
            'results' => ['initial' => 'round(initial_balance)'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Dream come true turns Price tag on your dream, Initial savings and Monthly savings into Time you need and Initial. Nothing is looked up on this page: time you need is computed from price tag on your dream and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Time you need is opened in years / months; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Dream come true calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Dream come true: it takes 4 numbers and reports Time you need and Initial.</p><p>Written with the labels from the form, Time you need = ln((Price tag on your dream × Interest rate (per year) + Monthly savings) ÷ (Initial savings × Interest rate (per year) + Monthly savings)) ÷ ln(Interest rate (per year) + 1).</p><p>What comes back is Time you need and Initial — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Price tag on your dream</strong> — in USD</li><li><strong>Initial savings</strong> — in USD</li><li><strong>Monthly savings</strong> — in USD</li><li><strong>Interest rate (per year)</strong> — in interest rate per year</li></ul><p>The answers come back as Time you need in years / months, Initial. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Time you need offers 9 units and opens on years / months, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Time you need</strong> = <code>ln((Price tag on your dream × Interest rate (per year) + Monthly savings) ÷ (Initial savings × Interest rate (per year) + Monthly savings)) ÷ ln(Interest rate (per year) + 1)</code></li><li><strong>Price tag on your dream</strong> = <code>( − Monthly savings + (Initial savings × Interest rate (per year) + Monthly savings) × e^(Time you need × ln(Interest rate (per year) + 1))) ÷ Interest rate (per year)</code></li><li><strong>Monthly savings</strong> = <code>− Interest rate (per year) × (Initial savings × e^(Time you need × ln(Interest rate (per year) + 1)) − Price tag on your dream) ÷ (e^(Time you need × ln(Interest rate (per year) + 1)) − 1)</code></li><li><strong>Initial savings</strong> = <code>(Price tag on your dream × Interest rate (per year) − Monthly savings × e^(Time you need × ln(Interest rate (per year) + 1)) + Monthly savings) × e^( − Time you need × ln(Interest rate (per year) + 1)) ÷ Interest rate (per year)</code></li><li><strong>Initial</strong> = <code>round(Initial savings)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Time you need</strong> = <code>ln((Price tag on your dream × Interest rate (per year) + Monthly savings) ÷ (Initial savings × Interest rate (per year) + Monthly savings)) ÷ ln(Interest rate (per year) + 1)</code> — the form to use when Price tag on your dream, Interest rate (per year), Monthly savings and Initial savings are the values you have.</li><li><strong>Price tag on your dream</strong> = <code>( − Monthly savings + (Initial savings × Interest rate (per year) + Monthly savings) × e^(Time you need × ln(Interest rate (per year) + 1))) ÷ Interest rate (per year)</code> — the form to use when Monthly savings, Initial savings, Interest rate (per year) and Time you need are the values you have.</li><li><strong>Monthly savings</strong> = <code>− Interest rate (per year) × (Initial savings × e^(Time you need × ln(Interest rate (per year) + 1)) − Price tag on your dream) ÷ (e^(Time you need × ln(Interest rate (per year) + 1)) − 1)</code> — the form to use when Interest rate (per year), Initial savings, Time you need and Price tag on your dream are the values you have.</li><li><strong>Initial savings</strong> = <code>(Price tag on your dream × Interest rate (per year) − Monthly savings × e^(Time you need × ln(Interest rate (per year) + 1)) + Monthly savings) × e^( − Time you need × ln(Interest rate (per year) + 1)) ÷ Interest rate (per year)</code> — the form to use when Price tag on your dream, Interest rate (per year), Monthly savings and Time you need are the values you have.</li><li><strong>Initial</strong> = <code>round(Initial savings)</code> — the form to use when Initial savings are the values you have.</li></ul><p>Any one of Time you need, Price tag on your dream and Monthly savings can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Interest rate (per year) is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Time you need and Initial are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Price tag on your dream left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Price tag on your dream is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Initial savings left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Initial savings is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Price tag on your dream to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Price tag on your dream</strong> takes a plain number with no unit attached. The page reads it when it works out Time you need, Monthly savings and Initial savings. Have it to hand before you start: Price tag on your dream is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Initial savings</strong> takes a plain number with no unit attached. The page reads it when it works out Time you need, Price tag on your dream and Monthly savings. Have it to hand before you start: Initial savings is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Monthly savings</strong> takes a plain number with no unit attached. The page reads it when it works out Time you need, Price tag on your dream and Initial savings. Have it to hand before you start: Monthly savings is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Interest rate (per year)</strong> is a interest rate per year quantity: the page opens it in percentyear and converts anything else you pick before the formula runs. The page reads it when it works out Time you need, Price tag on your dream and Monthly savings. Have it to hand before you start: Interest rate (per year) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Time you need</strong> is a years / months figure. The value follows from Price tag on your dream, Interest rate (per year), Monthly savings and Initial savings. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Initial</strong> is a plain number. The value follows from Initial savings. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>interest rate per year</strong> — opens in <em>percentyear</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Time you need is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover years / months and interest rate per year. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Price tag on your dream, Initial savings and Monthly savings measured, Time you need and Initial wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/gst">GST</a>, <a href="/finance/gst-qst">GST/QST Calculator</a> and <a href="/finance/hedge-ratio">Hedge ratio Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dream come true calculator work out?', 'a' => <<<'TXT'
            Time you need and Initial, from Price tag on your dream, Interest rate (per year), Monthly savings and Initial savings. The relationship is Time you need = ln((Price tag on your dream × Interest rate (per year) + Monthly savings) ÷ (Initial savings × Interest rate (per year) + Monthly savings)) ÷ ln(Interest rate (per year) + 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Price tag on your dream (USD), Initial savings (USD), Monthly savings (USD), Interest rate (per year) (interest rate per year). Enter price tag on your dream, initial savings and monthly savings; Time you need is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Time you need, Price tag on your dream, Monthly savings and Initial savings blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Time you need is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Price tag on your dream left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Time you need at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/gst', 'name' => 'GST'],
            ['path' => '/finance/gst-qst', 'name' => 'GST/QST Calculator'],
            ['path' => '/finance/hedge-ratio', 'name' => 'Hedge ratio Calculator'],
        ],
        'authors' => [],
    ],
];
