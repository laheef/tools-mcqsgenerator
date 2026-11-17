<?php

/**
 * Effective annual yield
 * /finance/effective-annual-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Effective annual yield',
    'meta' => ['title' => 'Effective annual yield — Free Online Calculator', 'description' => 'Effective annual yield works out coupon rate from face value, annual coupon payment and coupon frequency. The formula is printed in the form\'s own words.', 'h1' => 'Effective annual yield Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => 'Coupon rate',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'face_val',
                            'label' => 'Face value',
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
                            'name' => 'annual_pmt',
                            'label' => 'Annual coupon payment',
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
                            'name' => 'c_rate',
                            'label' => 'Coupon rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Effective annual yield',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'freq',
                            'label' => 'Coupon frequency',
                            'type' => 'select',
                            'options' => [
                                'Annually' => '1.000000000000000',
                                'Semi-annually' => '2.000000000000000',
                                'Quarterly' => '4.000000000000000',
                                'Monthly' => '12.000000000000000',
                                'Weekly' => '52.000000000000000',
                                'Daily' => '365.000000000000000',
                            ],
                            'control' => 'DROPDOWN',
                            'default' => 'Annually',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annual_yield',
                            'label' => 'Effective annual yield',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'c_rate = annual_pmt / face_val',
            'results' => ['annual_pmt' => 'c_rate*face_val', 'face_val' => 'annual_pmt/c_rate', 'c_rate' => 'annual_pmt/face_val'],
        ],
        [
            'title' => 'annual_yield = (1 + c_rate/freq) ^ freq - 1',
            'results' => ['annual_yield' => 'pow((c_rate + freq)/freq, freq) - 1', 'c_rate' => 'freq*(pow(annual_yield + 1, 1/freq) - 1)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Effective annual yield takes Face value and Annual coupon payment and returns Coupon rate and Effective annual yield. It is a single relationship that reads coupon rate out of face value, not a table of canned results keyed by them. Units for Coupon rate default to percent and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Effective annual yield calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Effective annual yield: it takes 2 numbers and reports Coupon rate and Effective annual yield.</p><p>Written with the labels from the form, Coupon rate = Annual coupon payment ÷ Face value.</p><p>The answers are Coupon rate and Effective annual yield; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Face value</strong> — in USD</li><li><strong>Annual coupon payment</strong> — in USD</li></ul><p>What you get back is Coupon rate in percent, Effective annual yield in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Coupon rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Coupon rate</strong> = <code>Annual coupon payment ÷ Face value</code></li><li><strong>Annual coupon payment</strong> = <code>Coupon rate × Face value</code></li><li><strong>Face value</strong> = <code>Annual coupon payment ÷ Coupon rate</code></li><li><strong>Effective annual yield</strong> = <code>((Coupon rate + Coupon frequency) ÷ Coupon frequency)^(Coupon frequency) − 1</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Coupon rate</strong> = <code>Annual coupon payment ÷ Face value</code> — the form to use when Annual coupon payment and Face value are the values you have.</li><li><strong>Annual coupon payment</strong> = <code>Coupon rate × Face value</code> — the form to use when Coupon rate and Face value are the values you have.</li><li><strong>Face value</strong> = <code>Annual coupon payment ÷ Coupon rate</code> — the form to use when Annual coupon payment and Coupon rate are the values you have.</li><li><strong>Effective annual yield</strong> = <code>((Coupon rate + Coupon frequency) ÷ Coupon frequency)^(Coupon frequency) − 1</code> — the form to use when Coupon rate and Coupon frequency are the values you have.</li><li><strong>Coupon rate</strong> = <code>Coupon frequency × ((Effective annual yield + 1)^(1 ÷ Coupon frequency) − 1)</code> — the form to use when Coupon frequency and Effective annual yield are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Coupon rate, Annual coupon payment and Face value can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Coupon rate and Effective annual yield are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Face value left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Face value is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Annual coupon payment left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Annual coupon payment is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Face value to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Face value</strong> takes a plain number with no unit attached. Change it and Annual coupon payment and Coupon rate changes with it. Have it to hand before you start: Face value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Annual coupon payment</strong> takes a plain number with no unit attached. Change it and Face value and Coupon rate changes with it. Have it to hand before you start: Annual coupon payment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Coupon rate</strong> is a percent figure. It is computed from Annual coupon payment and Face value, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Effective annual yield</strong> is a percent figure. It is computed from Coupon rate and Coupon frequency, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Face value and Annual coupon payment. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Face value into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Coupon rate in perc with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Coupon rate is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Face value and Annual coupon payment and the number you are missing is Coupon rate and Effective annual yield.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/carried-interest">Carried interest Calculator</a>, <a href="/finance/carry-trade">Carry trade Calculator</a> and <a href="/finance/cash-act-2020">CASH Act of 2020</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Effective annual yield calculator work out?', 'a' => 'Coupon rate and Effective annual yield, from Annual coupon payment and Face value. The relationship is Coupon rate = Annual coupon payment ÷ Face value.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Face value (USD), Annual coupon payment (USD). Fill face value and annual coupon payment and leave Coupon rate empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Coupon rate, Annual coupon payment, Face value and Effective annual yield can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Coupon rate is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Face value left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Coupon rate keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/carried-interest', 'name' => 'Carried interest Calculator'],
            ['path' => '/finance/carry-trade', 'name' => 'Carry trade Calculator'],
            ['path' => '/finance/cash-act-2020', 'name' => 'CASH Act of 2020'],
        ],
        'authors' => [],
    ],
];
