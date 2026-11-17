<?php

/**
 * Dart rate
 * /finance/dart-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dart rate',
    'meta' => ['title' => 'Dart rate Calculator: Formula, Steps & Examples', 'description' => 'Enter Total DART incidents and total hours worked and get DART rate back. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Dart rate Calculator', 'updated' => '2026-09-21'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalDarts',
                            'label' => 'Total DART incidents',
                            'type' => 'number',
                            'help' => 'This includes restricted work, transfer of duties, and days away from work.',
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
                            'name' => 'totalHours',
                            'label' => 'Total hours worked',
                            'type' => 'number',
                            'help' => 'All the hours worked by all the employees.',
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
                            'name' => 'dartRate',
                            'label' => 'DART rate',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'dartRate >0 and dartRate <= 1.875', 'text' => ' Your DART rate level is low.'],
                                ['when' => 'dartRate >1.875 and dartRate <= 4.125', 'text' => ' Your DART rate level is moderate.'],
                                ['when' => 'dartRate > 4.125', 'text' => 'Your DART rate level is high!'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => '(totalDarts * 200000)/totalHours = dartRate',
            'results' => ['dartRate' => '200000*totalDarts/totalHours', 'totalHours' => '200000*totalDarts/dartRate', 'totalDarts' => '(1/200000)*dartRate*totalHours'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Dart rate takes Total DART incidents and Total hours worked and returns DART rate. The arithmetic is the whole method: DART rate is worked out from total DART incidents by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Dart rate calculator works', 'html' => <<<'TXT'
            <p>Dart rate answers one question from 2 numbers, and the answer is DART rate.</p><p>In the form&#039;s own words, DART rate = 200000 × Total DART incidents ÷ Total hours worked.</p><p>The answers are DART rate; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Total DART incidents</strong> — in years. This includes restricted work, transfer of duties, and days away from work.</li><li><strong>Total hours worked</strong> — in years. All the hours worked by all the employees.</li></ul><p>The answer comes back as DART rate. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Total DART incidents = 10 yrs and Total hours worked = 100 yrs; the answers are <strong>DART rate</strong> = 20000.</p><ul><li><strong>DART rate</strong> = 20000</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>DART rate</strong> = <code>200000 × Total DART incidents ÷ Total hours worked</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>DART rate</strong> = 20000 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Total DART incidents offers 5 units and opens on years, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>DART rate</strong> = <code>200000 × Total DART incidents ÷ Total hours worked</code></li><li><strong>Total hours worked</strong> = <code>200000 × Total DART incidents ÷ DART rate</code></li><li><strong>Total DART incidents</strong> = <code>(1 ÷ 200000) × DART rate × Total hours worked</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>DART rate</strong> = <code>200000 × Total DART incidents ÷ Total hours worked</code> — the form to use when Total DART incidents and Total hours worked are the values you have.</li><li><strong>Total hours worked</strong> = <code>200000 × Total DART incidents ÷ DART rate</code> — the form to use when Total DART incidents and DART rate are the values you have.</li><li><strong>Total DART incidents</strong> = <code>(1 ÷ 200000) × DART rate × Total hours worked</code> — the form to use when DART rate and Total hours worked are the values you have.</li></ul><p>Any one of DART rate, Total hours worked and Total DART incidents can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Total DART incidents, from 10 to 20 — and the answers go from <strong>DART rate</strong> 20000 to <strong>DART rate</strong> 40000.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Total DART incidents and Total hours worked is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with DART rate is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Total DART incidents left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total DART incidents is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Total hours worked left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total hours worked is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Total DART incidents to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Total DART incidents</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. This includes restricted work, transfer of duties, and days away from work. It feeds DART rate and Total hours worked. Have it to hand before you start: Total DART incidents is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total hours worked</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. All the hours worked by all the employees. It feeds DART rate and Total DART incidents. Have it to hand before you start: Total hours worked is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>DART rate</strong> is a plain number and the page's own defaults put it at 20000. It is worked out from Total DART incidents and Total hours worked. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>DART rate</th></tr></thead><tbody><tr><td><strong>Total DART incidents</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Total hours worked</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Total DART incidents sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Total DART incidents = 5 yrs and Total hours worked = 50 yrs, the answer is <strong>DART rate</strong> = 20000.</li><li>With Total DART incidents = 30 yrs and Total hours worked = 100 yrs, the answer is <strong>DART rate</strong> = 60000.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Total DART incidents and Total hours worked. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Total DART incidents into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare DART rate with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> DART rate follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are years and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Total DART incidents and Total hours worked are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Total DART incidents and Total hours worked is what you already know and DART rate is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/effective-interest-rate">Effective interest rate Calculator</a>, <a href="/finance/emergency-fund">Emergency fund Calculator</a> and <a href="/finance/emi">EMI Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dart rate calculator work out?', 'a' => 'DART rate, from Total DART incidents and Total hours worked. The relationship is DART rate = 200000 × Total DART incidents ÷ Total hours worked.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Total DART incidents (years), Total hours worked (years). With total DART incidents and total hours worked in place, DART rate can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of DART rate, Total hours worked and Total DART incidents blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'DART rate = 20000. Those are the defaults written into the form — move Total DART incidents and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of DART rate is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Total DART incidents left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of DART rate keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/effective-interest-rate', 'name' => 'Effective interest rate Calculator'],
            ['path' => '/finance/emergency-fund', 'name' => 'Emergency fund Calculator'],
            ['path' => '/finance/emi', 'name' => 'EMI Calculator'],
        ],
        'authors' => [],
    ],
];
