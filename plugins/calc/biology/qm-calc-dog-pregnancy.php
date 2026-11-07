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
    'meta' => ['title' => 'Dog pregnancy Calculator — Formula, Units & Example', 'description' => <<<'TXT'
    Dog pregnancy turns Mating date into Due date. Fill in 1 box and the page has everything it needs.Mating date — a plain number, no unit, entered as a dateThe…
    TXT, 'h1' => 'Dog pregnancy Calculator', 'updated' => '2026-10-05'],
    'raw' => [
        'vars' => [
            'currentDate' => ['type' => 'date', 'rnd' => null],
            'day' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'difference' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'dueDate' => ['type' => 'date', 'rnd' => null],
            'matingDate' => ['type' => 'date', 'rnd' => null],
            'negDifference' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'D5WPUuaJyeIQwS3__K-g1',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'matingDate', 'vt' => 'date', 'l' => 'Mating date'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'dueDate', 'vt' => 'date', 'l' => 'Due date'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        ['difference > 1', '🐶 Your dog is going to give birth in {{difference.formattedValue}}&nbsp;days!'],
                                        ['difference < 1', '🐶 Your dog is going to give birth in {{difference.formattedValue}}&nbsp;day!'],
                                        ['dueDate == currentDate', '🐶 Your dog gives birth today!!'],
                                        ['dueDate < currentDate', '🐶 Your dog gave birth {{negDifference.formattedValue}}&nbsp;day(s) ago!'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, '🐕 Your dog\'s due date is on&nbsp;'],
                                        ['day == 0', 'Sunday!'],
                                        ['day == 1', 'Monday!'],
                                        ['day == 2', 'Tuesday!'],
                                        ['day == 3', 'Wednesday!'],
                                        ['day == 4', 'Thursday!'],
                                        ['day == 5', 'Friday!'],
                                        ['day == 6', 'Saturday!'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'UkmKtR1gNIVMnwHRqrfev',
                'title' => 'Hidden variables',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'currentDate', 'vt' => 'date', 'l' => 'Currentdate'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'difference', 'vt' => 'numerical', 'l' => 'Difference'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'day', 'vt' => 'numerical', 'l' => 'Day'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'negDifference', 'vt' => 'numerical', 'l' => 'Neg difference'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'dueDate = matingDate + 63',
                'var' => [
                    [
                        'l' => 'dueDate',
                        'f' => 'matingDate + 63',
                        'r' => ['matingDate'],
                    ],
                    [
                        'l' => 'matingDate',
                        'f' => 'dueDate - 63',
                        'r' => ['dueDate'],
                    ],
                ],
            ],
            [
                'formula' => 'difference = dueDate - currentDate',
                'var' => [
                    [
                        'l' => 'difference',
                        'f' => '-currentDate + dueDate',
                        'r' => ['dueDate', 'currentDate'],
                    ],
                    [
                        'l' => 'dueDate',
                        'f' => 'currentDate + difference',
                        'r' => ['difference', 'currentDate'],
                    ],
                    [
                        'l' => 'currentDate',
                        'f' => '-difference + dueDate',
                        'r' => ['difference', 'dueDate'],
                    ],
                ],
            ],
            [
                'formula' => 'day = getDayOfWeek (dueDate)',
                'var' => [
                    [
                        'l' => 'day',
                        'f' => 'getDayOfWeek(dueDate)',
                        'r' => ['dueDate'],
                    ],
                ],
            ],
            [
                'formula' => 'negDifference = difference * -1',
                'var' => [
                    [
                        'l' => 'negDifference',
                        'f' => '-difference',
                        'r' => ['difference'],
                    ],
                    [
                        'l' => 'difference',
                        'f' => '-negDifference',
                        'r' => ['negDifference'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";omni.define("getDayOfWeek",function(dateInput){var date=new Date(dateInput*1000*60*60*24);return date.getUTCDay()});//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Dog pregnancy turns Mating date into Due date. Nothing is looked up on this page: Due date is computed from Mating date and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Dog pregnancy calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Dog pregnancy: it takes 1 number and reports Due date.</p><p>The relationship it solves reads Due date = Mating date + 63.</p><p>What comes back is Due date — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Mating date</strong> — a plain number, no unit, entered as a date</li></ul><p>The result box is Due date. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Mating date = 1.772e+12 — through the same formula and the panel reports &lt;strong&gt;Due date&lt;/strong&gt; = 1.778e+12.</p><ul><li><strong>Due date</strong> = 1.778e+12</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Due date</strong> = <code>Mating date + 63</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Due date&lt;/strong&gt; = 1.778e+12 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Due date takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Due date</strong> = <code>Mating date + 63</code></li><li><strong>Mating date</strong> = <code>Due date − 63</code></li><li><strong>difference</strong> = <code>− currentDate + Due date</code></li><li><strong>currentDate</strong> = <code>− difference + Due date</code></li><li><strong>day</strong> = <code>getDayOfWeek(Due date)</code></li><li><strong>negDifference</strong> = <code>− difference</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Due date</strong> = <code>Mating date + 63</code> — the form to use when Mating date are the values you have.</li><li><strong>Mating date</strong> = <code>Due date − 63</code> — the form to use when Due date are the values you have.</li><li><strong>difference</strong> = <code>− currentDate + Due date</code> — the form to use when Due date are the values you have.</li><li><strong>Due date</strong> = <code>currentDate + difference</code> — the form to use when the other values are known.</li><li><strong>currentDate</strong> = <code>− difference + Due date</code> — the form to use when Due date are the values you have.</li><li><strong>day</strong> = <code>getDayOfWeek(Due date)</code> — the form to use when Due date are the values you have.</li><li><strong>negDifference</strong> = <code>− difference</code> — the form to use when the other values are known.</li><li><strong>difference</strong> = <code>− negDifference</code> — the form to use when the other values are known.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Due date, Mating date and difference can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Mating date, from 1.772e+12 to 3.545e+12 — and the answers go from &lt;strong&gt;Due date&lt;/strong&gt; 1.778e+12 to &lt;strong&gt;Due date&lt;/strong&gt; 3.550e+12.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Due date is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Mating date left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Mating date is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Mating date is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Dog pregnancy form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Mating date</strong> takes a plain number with no unit attached. It feeds Due date. Fill it from a measurement rather than a memory — Mating date is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Due date</strong> is a plain number and the page's own defaults put it at 1.778e+12. It is computed from Mating date, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Due date</th></tr></thead><tbody><tr><td><strong>Mating date</strong> +10%</td><td>+9.97%</td></tr></tbody></table><p>Ranked by leverage, Mating date sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Mating date = 8.862e+11 and the page reports <strong>Due date</strong> = 8.916e+11 and <strong>day</strong> = 5.</li><li>Feed in Mating date = 5.317e+12 and the page reports <strong>Due date</strong> = 5.322e+12 and <strong>day</strong> = 6.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Mating date ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Mating date — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Due date against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Due date follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Mating date are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Mating date measured, Due date wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/plant-population">Plant population Calculator</a>, <a href="/biology/plants">Plant spacing Calculator</a> and <a href="/biology/plants-per-hectare">Plants Per Hectare Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Dog pregnancy is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Dog pregnancy is a number to act on, so the useful question is what to do with Due date once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Mating date alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog pregnancy calculator work out?', 'a' => 'Due date, from Mating date. The relationship is Due date = Mating date + 63.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mating date. Fill matingDate and leave Due date empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Due date, Mating date, difference and currentDate can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Due date = 1.778e+12. Those are the defaults written into the form — move Mating date and every result box follows.'],
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
