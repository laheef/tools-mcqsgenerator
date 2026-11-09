<?php

/**
 * Dog pregnancy
 * /biology/dog-pregnancy
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog pregnancy',
    'meta' => ['title' => 'Dog pregnancy Calculator: Formula & Example', 'description' => 'Dog pregnancy works out due date. Each figure is computed from the boxes you fill, never read from a table. The formula is printed in the form\'s own words.', 'h1' => 'Dog pregnancy Calculator', 'updated' => '2026-10-05'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'matingDate', 'label' => 'Mating date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'dueDate', 'label' => 'Due date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'difference > 1', 'text' => ' Your dog is going to give birth in {{difference.formattedValue}}&nbsp;days!'],
                                ['when' => 'difference < 1', 'text' => ' Your dog is going to give birth in {{difference.formattedValue}}&nbsp;day!'],
                                ['when' => 'dueDate == currentDate', 'text' => ' Your dog gives birth today!!'],
                                ['when' => 'dueDate < currentDate', 'text' => ' Your dog gave birth {{negDifference.formattedValue}}&nbsp;day(s) ago!'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => ' Your dog\'s due date is on&nbsp;'],
                                ['when' => 'day == 0', 'text' => 'Sunday!'],
                                ['when' => 'day == 1', 'text' => 'Monday!'],
                                ['when' => 'day == 2', 'text' => 'Tuesday!'],
                                ['when' => 'day == 3', 'text' => 'Wednesday!'],
                                ['when' => 'day == 4', 'text' => 'Thursday!'],
                                ['when' => 'day == 5', 'text' => 'Friday!'],
                                ['when' => 'day == 6', 'text' => 'Saturday!'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'currentDate', 'label' => 'Currentdate', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference',
                            'label' => 'Difference',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'day',
                            'label' => 'Day',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'negDifference',
                            'label' => 'Neg difference',
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
            'title' => 'dueDate = matingDate + 63',
            'results' => ['dueDate' => 'matingDate + 63', 'matingDate' => 'dueDate - 63'],
        ],
        [
            'title' => 'difference = dueDate - currentDate',
            'results' => ['difference' => '-currentDate + dueDate', 'dueDate' => 'currentDate + difference', 'currentDate' => '-difference + dueDate'],
        ],
        [
            'title' => 'day = getDayOfWeek (dueDate)',
            'results' => ['day' => 'getDayOfWeek(dueDate)'],
        ],
        [
            'title' => 'negDifference = difference * -1',
            'results' => ['negDifference' => '-difference', 'difference' => '-negDifference'],
        ],
    ],
    'js' => '"use strict";omni.define("getDayOfWeek",function(dateInput){var date=new Date(dateInput*1000*60*60*24);return date.getUTCDay()});//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Dog pregnancy turns Mating date into Due date and Currentdate. Nothing is looked up on this page: due date is computed from mating date and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Dog pregnancy calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Dog pregnancy: it takes 1 number and reports Due date, Currentdate and Difference.</p><p>The relationship it solves reads Due date = Mating date + 63.</p><p>What comes back is Due date, Currentdate, Difference and Day — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Mating date</strong> — a plain number, no unit, entered as a date</li></ul><p>The result boxes are Due date, Currentdate, Difference, Day, Neg difference; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Mating date = Sun 1 March 2026 — through the same formula and the panel reports <strong>Due date</strong> = Sun 3 May 2026 and <strong>Day</strong> = 0.</p><ul><li><strong>Due date</strong> = Sun 3 May 2026</li><li><strong>Day</strong> = 0</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Due date</strong> = <code>Mating date + 63</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Due date</strong> = Sun 3 May 2026 and <strong>Day</strong> = 0 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Due date takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Due date</strong> = <code>Mating date + 63</code></li><li><strong>Mating date</strong> = <code>Due date − 63</code></li><li><strong>Difference</strong> = <code>− Currentdate + Due date</code></li><li><strong>Currentdate</strong> = <code>− Difference + Due date</code></li><li><strong>Day</strong> = <code>getDayOfWeek(Due date)</code></li><li><strong>Neg difference</strong> = <code>− Difference</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Due date</strong> = <code>Mating date + 63</code> — the form to use when Mating date are the values you have.</li><li><strong>Mating date</strong> = <code>Due date − 63</code> — the form to use when Due date are the values you have.</li><li><strong>Difference</strong> = <code>− Currentdate + Due date</code> — the form to use when Currentdate and Due date are the values you have.</li><li><strong>Due date</strong> = <code>Currentdate + Difference</code> — the form to use when Currentdate and Difference are the values you have.</li><li><strong>Currentdate</strong> = <code>− Difference + Due date</code> — the form to use when Difference and Due date are the values you have.</li><li><strong>Day</strong> = <code>getDayOfWeek(Due date)</code> — the form to use when Due date are the values you have.</li><li><strong>Neg difference</strong> = <code>− Difference</code> — the form to use when Difference are the values you have.</li><li><strong>Difference</strong> = <code>− Neg difference</code> — the form to use when Neg difference are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Due date, Mating date and Difference can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Mating date, from Sun 1 March 2026 to Wed 29 April 2082 — and the answers go from <strong>Due date</strong> Sun 3 May 2026 and <strong>Day</strong> 0 to <strong>Due date</strong> Wed 1 July 2082 and <strong>Day</strong> 3.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Due date, Currentdate and Difference are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Mating date left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Mating date is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Mating date is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Dog pregnancy form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Mating date</strong> takes a plain number with no unit attached. It feeds Due date. Fill it from a measurement rather than a memory — Mating date is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Due date</strong> is a plain number and the page's own defaults put it at Sun 3 May 2026. It is computed from Mating date, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Currentdate</strong> is a plain number. It is computed from Difference and Due date, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Difference</strong> is a plain number. It is computed from Currentdate and Due date, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Day</strong> is a plain number and the page's own defaults put it at 0. It is computed from Due date, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Neg difference</strong> is a plain number. It is computed from Difference, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Due date</th><th>Day</th></tr></thead><tbody><tr><td><strong>Mating date</strong> +10%</td><td>+9.97%</td><td>—</td></tr></tbody></table><p>Ranked by leverage, Mating date sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Mating date = Fri 30 January 1998 and the page reports <strong>Due date</strong> = Fri 3 April 1998 and <strong>Day</strong> = 5.</li><li>Feed in Mating date = Sat 28 June 2138 and the page reports <strong>Due date</strong> = Sat 30 August 2138 and <strong>Day</strong> = 6.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Mating date ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Mating date — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Due date against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Due date follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Mating date are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Mating date measured, Due date and Currentdate wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog pregnancy calculator work out?', 'a' => 'Due date, Currentdate, Difference and Day, from Mating date. The relationship is Due date = Mating date + 63.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mating date. Fill mating date and leave Due date empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Due date, Mating date, Difference and Currentdate can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Due date = Sun 3 May 2026 and Day = 0. Those are the defaults written into the form — move Mating date and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Due date is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Mating date blank and the page solves for it, reporting Due date instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Due date keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/plant-population', 'name' => 'Plant population Calculator'],
            ['path' => '/biology/plants', 'name' => 'Plant spacing Calculator'],
            ['path' => '/biology/plants-per-hectare', 'name' => 'Plants Per Hectare Calculator'],
        ],
        'authors' => [],
    ],
];
