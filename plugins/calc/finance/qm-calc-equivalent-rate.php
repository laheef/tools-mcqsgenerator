<?php

/**
 * Equivalent rate
 * /finance/equivalent-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Equivalent rate',
    'meta' => ['title' => 'Equivalent rate — Formula, Steps & Examples', 'description' => 'Equivalent rate reports equivalent interest rate and Effective annual interest rate (AER). Every box can be solved for, not only the one in the title.', 'h1' => 'Equivalent rate Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'NomIntRate',
                            'label' => 'Nominal interest rate',
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
                            'name' => 'CompFreq',
                            'label' => 'Compounding frequency',
                            'type' => 'number',
                            'suffix' => '/yr',
                            'help' => 'Number of times per year that compounding occurs (daily is 365).',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'NewCompFreq',
                            'label' => 'New compounding frequency',
                            'type' => 'number',
                            'suffix' => '/yr',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'EqRate',
                            'label' => 'Equivalent interest rate',
                            'type' => 'number',
                            'help' => 'The adjusted interest rate, given the new compounding frequency.',
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
                            'name' => 'EffIntRate',
                            'label' => 'Effective annual interest rate (AER)',
                            'type' => 'number',
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
            'title' => 'EqRate = NewCompFreq * ((1 + NomIntRate / CompFreq) ^ (CompFreq / NewCompFreq) - 1)',
            'results' => ['NomIntRate' => 'CompFreq*(pow((EqRate + NewCompFreq)/NewCompFreq, NewCompFreq/CompFreq) - 1)', 'EqRate' => 'NewCompFreq*(pow((CompFreq + NomIntRate)/CompFreq, CompFreq/NewCompFreq) - 1)'],
        ],
        [
            'title' => 'EffIntRate =  ((1 + NomIntRate / CompFreq) ^ (CompFreq / 1) - 1)',
            'results' => ['NomIntRate' => 'CompFreq*(pow(EffIntRate + 1, 1/CompFreq) - 1)', 'EffIntRate' => 'pow((CompFreq + NomIntRate)/CompFreq, CompFreq) - 1'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Nominal interest rate, Compounding frequency and New compounding frequency into Equivalent rate and the answer comes back as Equivalent interest rate and Effective annual interest rate (AER). There is no hidden constant here: change equivalent interest rate and nominal interest rate moves with it. The main result, Equivalent interest rate, is reported in percent.
        TXT,
        'sections' => [
            ['title' => 'How the Equivalent rate calculator works', 'html' => <<<'TXT'
            <p>Equivalent rate answers one question from 3 numbers, and the answer is Equivalent interest rate and Effective annual interest rate (AER).</p><p>In the form&#039;s own words, Equivalent interest rate = New compounding frequency × (((Compounding frequency + Nominal interest rate) ÷ Compounding frequency)^(Compounding frequency ÷ New compounding frequency) − 1).</p><p>The result panel carries Equivalent interest rate and Effective annual interest rate (AER), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Nominal interest rate</strong> — in percent</li><li><strong>Compounding frequency</strong> — in /yr. Number of times per year that compounding occurs (daily is 365).</li><li><strong>New compounding frequency</strong> — in /yr</li></ul><p>The answers come back as Equivalent interest rate in percent, Effective annual interest rate (AER) in percent. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Equivalent interest rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Equivalent interest rate</strong> = <code>New compounding frequency × (((Compounding frequency + Nominal interest rate) ÷ Compounding frequency)^(Compounding frequency ÷ New compounding frequency) − 1)</code></li><li><strong>Nominal interest rate</strong> = <code>Compounding frequency × (((Equivalent interest rate + New compounding frequency) ÷ New compounding frequency)^(New compounding frequency ÷ Compounding frequency) − 1)</code></li><li><strong>Effective annual interest rate (AER)</strong> = <code>((Compounding frequency + Nominal interest rate) ÷ Compounding frequency)^(Compounding frequency) − 1</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Equivalent interest rate</strong> = <code>New compounding frequency × (((Compounding frequency + Nominal interest rate) ÷ Compounding frequency)^(Compounding frequency ÷ New compounding frequency) − 1)</code> — the form to use when New compounding frequency, Compounding frequency and Nominal interest rate are the values you have.</li><li><strong>Nominal interest rate</strong> = <code>Compounding frequency × (((Equivalent interest rate + New compounding frequency) ÷ New compounding frequency)^(New compounding frequency ÷ Compounding frequency) − 1)</code> — the form to use when Compounding frequency, Equivalent interest rate and New compounding frequency are the values you have.</li><li><strong>Effective annual interest rate (AER)</strong> = <code>((Compounding frequency + Nominal interest rate) ÷ Compounding frequency)^(Compounding frequency) − 1</code> — the form to use when Compounding frequency and Nominal interest rate are the values you have.</li><li><strong>Nominal interest rate</strong> = <code>Compounding frequency × ((Effective annual interest rate (AER) + 1)^(1 ÷ Compounding frequency) − 1)</code> — the form to use when Compounding frequency and Effective annual interest rate (AER) are the values you have.</li></ul><p>Any one of Equivalent interest rate, Nominal interest rate and Effective annual interest rate (AER) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Nominal interest rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Equivalent interest rate and Effective annual interest rate (AER) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Nominal interest rate left as a guess.</strong> Anything typed into Nominal interest rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Compounding frequency left as a guess.</strong> Anything typed into Compounding frequency is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Nominal interest rate to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Equivalent rate form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Nominal interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Equivalent interest rate and Effective annual interest rate (AER). Fill it from a measurement rather than a memory — Nominal interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Compounding frequency</strong> is measured in /yr. Number of times per year that compounding occurs (daily is 365). It feeds Nominal interest rate, Equivalent interest rate and Effective annual interest rate (AER). Fill it from a measurement rather than a memory — Compounding frequency is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>New compounding frequency</strong> is measured in /yr. It feeds Nominal interest rate and Equivalent interest rate. Fill it from a measurement rather than a memory — New compounding frequency is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Equivalent interest rate</strong> is a percent figure. The value follows from New compounding frequency, Compounding frequency and Nominal interest rate. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Effective annual interest rate (AER)</strong> is a percent figure. The value follows from Compounding frequency and Nominal interest rate. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Equivalent rate actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Nominal interest rate, Compounding frequency and New compounding frequency ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Nominal interest rate — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Equivalent interest rate in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Equivalent interest rate is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Nominal interest rate, Compounding frequency and New compounding frequency measured, Equivalent interest rate and Effective annual interest rate (AER) wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/lease-mileage">Lease mileage Calculator</a>, <a href="/finance/lease">Lease</a> and <a href="/finance/lemonade-stand">Lemonade stand Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Equivalent rate is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Nominal interest rate, Compounding frequency and New compounding frequency beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Equivalent rate calculator work out?', 'a' => <<<'TXT'
            Equivalent interest rate and Effective annual interest rate (AER), from New compounding frequency, Compounding frequency and Nominal interest rate. The relationship is Equivalent interest rate = New compounding frequency × (((Compounding frequency + Nominal interest rate) ÷ Compounding frequency)^(Compounding frequency ÷ New compounding frequency) − 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Nominal interest rate (percent), Compounding frequency (/yr), New compounding frequency (/yr). Enter nominal interest rate, compounding frequency and new compounding frequency; Equivalent interest rate is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Equivalent interest rate, Nominal interest rate and Effective annual interest rate (AER) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Equivalent interest rate is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Nominal interest rate blank and the page solves for it, reporting Equivalent interest rate instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Equivalent interest rate at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/lease-mileage', 'name' => 'Lease mileage Calculator'],
            ['path' => '/finance/lease', 'name' => 'Lease'],
            ['path' => '/finance/lemonade-stand', 'name' => 'Lemonade stand Calculator'],
        ],
        'authors' => [],
    ],
];
