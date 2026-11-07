<?php

/**
 * Goat gestation
 * /biology/goat-gestation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Goat gestation',
    'meta' => ['title' => 'Goat gestation Calculator — Formula & Results', 'description' => 'Goat gestation takes Breeding date and Kidding date and returns 🐐 The breed of your goat is…. A result box can be typed into, and doing so changes the…', 'h1' => 'Goat gestation Calculator', 'updated' => '2025-04-07'],
    'raw' => [
        'vars' => [
            'calving' => ['type' => 'date', 'rnd' => null],
            'currentDate' => ['type' => 'date', 'rnd' => null],
            'day' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'daysUntil' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'difference' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'exposed' => ['type' => 'date', 'rnd' => null],
            'miniature' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'OgfDXm_ssq5E-OFxSUvwE', 'c' => null],
                ],
                'ds' => 'p_OHW1janDuegiSjO3cSL',
            ],
            'negDifference' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'x2j51r5jRiijGIqMg5X7b',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'miniature',
                                    'vt' => 'valueSelect',
                                    'l' => '🐐 The breed of your goat is...',
                                    'ds' => 'p_OHW1janDuegiSjO3cSL',
                                    'opts' => [
                                        ['OgfDXm_ssq5E-OFxSUvwE', 'standard breed', '1'],
                                        ['yCWH5owyz2QfAj3gulGL_', 'miniature breed', '0'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'exposed', 'vt' => 'date', 'l' => 'Breeding date'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'calving', 'vt' => 'date', 'l' => 'Kidding date'],
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
                                        [null, 'Your goat\'s due date is on a&nbsp;'],
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
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        ['difference > 1', 'Your goat is going to give birth in {{difference.formattedValue}} days!'],
                                        ['difference < 1', 'Your goat is going to give birth in {{difference.formattedValue}} day!'],
                                        ['calving == currentDate', 'Your goat gives birth today!!'],
                                        ['calving < currentDate', 'Your goat gave birth {{negDifference.formattedValue}} day(s) ago!'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'w8W2Uf_VPl2U43profVzQ',
                'title' => 'Hidden variables',
                'desc' => '',
                'm' => [
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
                                ['t' => 'v', 'n' => 'daysUntil', 'vt' => 'numerical', 'l' => 'Days until'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'currentDate', 'vt' => 'date', 'l' => 'Current date'],
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
                                ['t' => 'v', 'n' => 'negDifference', 'vt' => 'numerical', 'l' => 'Neg difference'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'calving = exposed + 150 - 5 * (1 - miniature)',
                'var' => [
                    [
                        'l' => 'miniature',
                        'f' => '(1/5)*calving - 1/5*exposed - 29',
                        'r' => ['exposed', 'calving'],
                    ],
                    [
                        'l' => 'exposed',
                        'f' => 'calving - 5*miniature - 145',
                        'r' => ['miniature', 'calving'],
                    ],
                    [
                        'l' => 'calving',
                        'f' => 'exposed + 5*miniature + 145',
                        'r' => ['miniature', 'exposed'],
                    ],
                ],
            ],
            [
                'formula' => 'day = getDayOfWeek (calving)',
                'var' => [
                    [
                        'l' => 'day',
                        'f' => 'getDayOfWeek(calving)',
                        'r' => ['calving'],
                    ],
                ],
            ],
            [
                'formula' => 'daysUntil = calving - exposed',
                'var' => [
                    [
                        'l' => 'exposed',
                        'f' => 'calving - daysUntil',
                        'r' => ['calving', 'daysUntil'],
                    ],
                    [
                        'l' => 'calving',
                        'f' => 'daysUntil + exposed',
                        'r' => ['exposed', 'daysUntil'],
                    ],
                    [
                        'l' => 'daysUntil',
                        'f' => 'calving - exposed',
                        'r' => ['exposed', 'calving'],
                    ],
                ],
            ],
            [
                'formula' => 'difference = calving - currentDate',
                'var' => [
                    [
                        'l' => 'calving',
                        'f' => 'currentDate + difference',
                        'r' => ['currentDate', 'difference'],
                    ],
                    [
                        'l' => 'currentDate',
                        'f' => 'calving - difference',
                        'r' => ['calving', 'difference'],
                    ],
                    [
                        'l' => 'difference',
                        'f' => 'calving - currentDate',
                        'r' => ['calving', 'currentDate'],
                    ],
                ],
            ],
            [
                'formula' => 'negDifference = difference * -1',
                'var' => [
                    [
                        'l' => 'difference',
                        'f' => '-negDifference',
                        'r' => ['negDifference'],
                    ],
                    [
                        'l' => 'negDifference',
                        'f' => '-difference',
                        'r' => ['difference'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'p_OHW1janDuegiSjO3cSL' => [
                'name' => 'miniature',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'OgfDXm_ssq5E-OFxSUvwE', 'label' => 'standard breed', 'value' => '1'],
                    ['uid' => 'yCWH5owyz2QfAj3gulGL_', 'label' => 'miniature breed', 'value' => '0'],
                ],
            ],
        ],
        'js' => '"use strict";omni.define("getDayOfWeek",function(dateInput){var date=new Date(dateInput*1000*60*60*24);return date.getUTCDay()});//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Goat gestation takes Breeding date and Kidding date and returns 🐐 The breed of your goat is…. Nothing is looked up on this page: 🐐 The breed of your goat is... is computed from Breeding date and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Goat gestation calculator works', 'html' => <<<'TXT'
            <p>Goat gestation answers one question from 2 numbers, and the answer is 🐐 The breed of your goat is….</p><p>The relationship it solves reads 🐐 The breed of your goat is... = (1 ÷ 5) × Kidding date − 1 ÷ 5 × Breeding date − 29.</p><p>The answers are 🐐 The breed of your goat is…; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Breeding date</strong> — a plain number, no unit, entered as a date</li><li><strong>Kidding date</strong> — a plain number, no unit, entered as a date</li></ul><p>The answer comes back as 🐐 The breed of your goat is…. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Breeding date = 1.772e+12 and Kidding date = 1.772e+12; the answers are &lt;strong&gt;🐐 The breed of your goat is…&lt;/strong&gt; = 1.</p><ul><li><strong>🐐 The breed of your goat is…</strong> = 1</li></ul><p>The line behind those figures is <strong>🐐 The breed of your goat is...</strong> = <code>(1 ÷ 5) × Kidding date − 1 ÷ 5 × Breeding date − 29</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;🐐 The breed of your goat is...&lt;/strong&gt; = 1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: 🐐 The breed of your goat is... takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>🐐 The breed of your goat is...</strong> = <code>(1 ÷ 5) × Kidding date − 1 ÷ 5 × Breeding date − 29</code></li><li><strong>Breeding date</strong> = <code>Kidding date − 5 × 🐐 The breed of your goat is... − 145</code></li><li><strong>Kidding date</strong> = <code>Breeding date + 5 × 🐐 The breed of your goat is... + 145</code></li><li><strong>day</strong> = <code>getDayOfWeek(Kidding date)</code></li><li><strong>daysUntil</strong> = <code>Kidding date − Breeding date</code></li><li><strong>currentDate</strong> = <code>Kidding date − difference</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>🐐 The breed of your goat is...</strong> = <code>(1 ÷ 5) × Kidding date − 1 ÷ 5 × Breeding date − 29</code> — the form to use when Breeding date and Kidding date are the values you have.</li><li><strong>Breeding date</strong> = <code>Kidding date − 5 × 🐐 The breed of your goat is... − 145</code> — the form to use when 🐐 The breed of your goat is… and Kidding date are the values you have.</li><li><strong>Kidding date</strong> = <code>Breeding date + 5 × 🐐 The breed of your goat is... + 145</code> — the form to use when 🐐 The breed of your goat is… and Breeding date are the values you have.</li><li><strong>day</strong> = <code>getDayOfWeek(Kidding date)</code> — the form to use when Kidding date are the values you have.</li><li><strong>Breeding date</strong> = <code>Kidding date − daysUntil</code> — the form to use when Kidding date are the values you have.</li><li><strong>Kidding date</strong> = <code>daysUntil + Breeding date</code> — the form to use when Breeding date are the values you have.</li><li><strong>daysUntil</strong> = <code>Kidding date − Breeding date</code> — the form to use when Breeding date and Kidding date are the values you have.</li><li><strong>Kidding date</strong> = <code>currentDate + difference</code> — the form to use when the other values are known.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of 🐐 The breed of your goat is…, Breeding date and Kidding date can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Breeding date, from 1.772e+12 to 3.545e+12 — and the answers go from &lt;strong&gt;🐐 The breed of your goat is...&lt;/strong&gt; 1 to &lt;strong&gt;🐐 The breed of your goat is...&lt;/strong&gt; 1.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with 🐐 The breed of your goat is… is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Breeding date left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Breeding date is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Kidding date left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Kidding date is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Breeding date and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Goat gestation form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Breeding date</strong> takes a plain number with no unit attached. Change it and 🐐 The breed of your goat is… and Kidding date changes with it. Fill it from a measurement rather than a memory — Breeding date is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Kidding date</strong> takes a plain number with no unit attached. Change it and 🐐 The breed of your goat is… and Breeding date changes with it. Fill it from a measurement rather than a memory — Kidding date is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>🐐 The breed of your goat is…</strong> is a plain number and the page's own defaults put it at 1. It is worked out from Breeding date and Kidding date. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>🐐 The breed of your goat is…</th></tr></thead><tbody><tr><td><strong>Breeding date</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Kidding date</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Breeding date sits at the top — a ten per cent error in that box shows up as roughly 0 per cent in the answer. By contrast, Breeding date and Kidding date barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Breeding date = 8.862e+11 and Kidding date = 8.862e+11 and the page reports <strong>🐐 The breed of your goat is…</strong> = 1, <strong>day</strong> = 5 and <strong>daysUntil</strong> = 0.</li><li>Feed in Breeding date = 5.317e+12 and Kidding date = 1.772e+12 and the page reports <strong>🐐 The breed of your goat is…</strong> = 1, <strong>day</strong> = 0 and <strong>daysUntil</strong> = -41026.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Breeding date and Kidding date ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Breeding date — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check 🐐 The breed of your goat is… against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> 🐐 The breed of your goat is… follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Breeding date and Kidding date are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Breeding date and Kidding date is what you already know and 🐐 The breed of your goat is… is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/gc-content-calculator">GC Content Calculator</a>, <a href="/biology/gc-content-sequence">GC Content from a Sequence — Sliding Window</a> and <a href="/biology/gdu">GDU (growing degree units) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Goat gestation calculator work out?', 'a' => <<<'TXT'
            🐐 The breed of your goat is…, from Breeding date and Kidding date. The relationship is 🐐 The breed of your goat is... = (1 ÷ 5) × Kidding date − 1 ÷ 5 × Breeding date − 29.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Breeding date, Kidding date. Enter exposed and calving; 🐐 The breed of your goat is... is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. 🐐 The breed of your goat is…, Breeding date, Kidding date and day can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => '🐐 The breed of your goat is… = 1. That comes from the page\'s own defaults, entered in Breeding date; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            🐐 The breed of your goat is... is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Breeding date blank and the page solves for it, reporting 🐐 The breed of your goat is... instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of 🐐 The breed of your goat is... keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/gc-content-calculator', 'name' => 'GC Content Calculator'],
            ['path' => '/biology/gc-content-sequence', 'name' => 'GC Content from a Sequence — Sliding Window'],
            ['path' => '/biology/gdu', 'name' => 'GDU (growing degree units) Calculator'],
        ],
        'authors' => [],
    ],
];
