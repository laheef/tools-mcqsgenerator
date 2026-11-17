<?php

/**
 * PVIFA
 * /finance/pvifa
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'PVIFA',
    'meta' => ['title' => 'PVIFA Calculator: Formula, Steps & Examples', 'description' => 'Enter interest rate per period (r) and number of periods (n) and get PVIFA back. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'PVIFA Calculator', 'updated' => '2024-07-18'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Interest_rate_per_period',
                            'label' => 'Interest rate per period (r)',
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
                            'name' => 'Number_of_periods',
                            'label' => 'Number of periods (n)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pvifa',
                            'label' => 'PVIFA',
                            'type' => 'number',
                            'help' => 'Present Value Interest Factor of Annuity.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Additional settings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'One_payment',
                            'label' => 'One payment',
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
                            'name' => 'Present_value_of_annuity',
                            'label' => 'Present value of annuity',
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
            'title' => 'pvifa =  (1-(1+Interest_rate_per_period)^(-Number_of_periods))/Interest_rate_per_period',
            'results' => ['pvifa' => '1/Interest_rate_per_period - pow(Interest_rate_per_period + 1, -Number_of_periods)/Interest_rate_per_period', 'Number_of_periods' => 'log(-1/(Interest_rate_per_period*pvifa - 1))/log(Interest_rate_per_period + 1)'],
        ],
        [
            'title' => 'Present_value_of_annuity = One_payment * pvifa ',
            'results' => ['pvifa' => 'Present_value_of_annuity/One_payment', 'One_payment' => 'Present_value_of_annuity/pvifa', 'Present_value_of_annuity' => 'One_payment*pvifa'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        PVIFA takes Interest rate per period (r) and Number of periods (n) and returns PVIFA and One payment. Nothing is looked up on this page: PVIFA is computed from interest rate per period (r) and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the PVIFA calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind PVIFA: it takes 2 numbers and reports PVIFA, One payment and Present value of annuity.</p><p>The relationship it solves reads PVIFA = 1 ÷ Interest rate per period (r) − (Interest rate per period (r) + 1)^(− Number of periods (n)) ÷ Interest rate per period (r).</p><p>The result panel carries PVIFA, One payment and Present value of annuity, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Interest rate per period (r)</strong> — in percent</li><li><strong>Number of periods (n)</strong> — a plain number, no unit</li></ul><p>What you get back is PVIFA, One payment in USD, Present value of annuity in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Interest rate per period (r) offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>PVIFA</strong> = <code>1 ÷ Interest rate per period (r) − (Interest rate per period (r) + 1)^(− Number of periods (n)) ÷ Interest rate per period (r)</code></li><li><strong>Number of periods (n)</strong> = <code>ln( − 1 ÷ (Interest rate per period (r) × PVIFA − 1)) ÷ ln(Interest rate per period (r) + 1)</code></li><li><strong>Present value of annuity</strong> = <code>One payment × PVIFA</code></li><li><strong>One payment</strong> = <code>Present value of annuity ÷ PVIFA</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>PVIFA</strong> = <code>1 ÷ Interest rate per period (r) − (Interest rate per period (r) + 1)^(− Number of periods (n)) ÷ Interest rate per period (r)</code> — the form to use when Interest rate per period (r) and Number of periods (n) are the values you have.</li><li><strong>Number of periods (n)</strong> = <code>ln( − 1 ÷ (Interest rate per period (r) × PVIFA − 1)) ÷ ln(Interest rate per period (r) + 1)</code> — the form to use when Interest rate per period (r) and PVIFA are the values you have.</li><li><strong>Present value of annuity</strong> = <code>One payment × PVIFA</code> — the form to use when One payment and PVIFA are the values you have.</li><li><strong>PVIFA</strong> = <code>Present value of annuity ÷ One payment</code> — the form to use when Present value of annuity and One payment are the values you have.</li><li><strong>One payment</strong> = <code>Present value of annuity ÷ PVIFA</code> — the form to use when Present value of annuity and PVIFA are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of PVIFA, Number of periods (n) and Present value of annuity can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Interest rate per period (r) is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with PVIFA, One payment and Present value of annuity are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Interest rate per period (r) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Interest rate per period (r) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Number of periods (n) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of periods (n) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Interest rate per period (r) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the PVIFA form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Interest rate per period (r)</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds PVIFA and Number of periods (n). Fill it from a measurement rather than a memory — Interest rate per period (r) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of periods (n)</strong> takes a plain number with no unit attached. It feeds PVIFA. Fill it from a measurement rather than a memory — Number of periods (n) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>PVIFA</strong> is a plain number. It is computed from Interest rate per period (r) and Number of periods (n), so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>One payment</strong> is a plain number. It is computed from Present value of annuity and PVIFA, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Present value of annuity</strong> is a plain number. It is computed from One payment and PVIFA, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on PVIFA actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Interest rate per period (r) and Number of periods (n) ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Interest rate per period (r) — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check PVIFA against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> PVIFA is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Interest rate per period (r) and Number of periods (n) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Interest rate per period (r) and Number of periods (n) and the number you are missing is PVIFA and One payment.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/interest-coverage-ratio">Interest coverage ratio Calculator</a>, <a href="/finance/interest-per-day">Interest per day Calculator</a> and <a href="/finance/interest-rate">Interest rate Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the PVIFA calculator work out?', 'a' => <<<'TXT'
            PVIFA, One payment and Present value of annuity, from Interest rate per period (r) and Number of periods (n). The relationship is PVIFA = 1 ÷ Interest rate per period (r) − (Interest rate per period (r) + 1)^(− Number of periods (n)) ÷ Interest rate per period (r).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Interest rate per period (r) (percent), Number of periods (n). Enter interest rate per period (r) and number of periods (n); PVIFA is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. PVIFA, Number of periods (n), Present value of annuity and One payment can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally PVIFA is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Interest rate per period (r) blank and the page solves for it, reporting PVIFA instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. PVIFA keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/interest-coverage-ratio', 'name' => 'Interest coverage ratio Calculator'],
            ['path' => '/finance/interest-per-day', 'name' => 'Interest per day Calculator'],
            ['path' => '/finance/interest-rate', 'name' => 'Interest rate Calculator'],
        ],
        'authors' => [],
    ],
];
