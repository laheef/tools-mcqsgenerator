<?php

/**
 * Pet sitter rates
 * /biology/pet-sitter-rates
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pet sitter rates',
    'meta' => ['title' => 'Pet sitter rates — Formula, Steps & Examples', 'description' => 'Pet sitter rates multiply hours, days of care and an hourly charge into a total cost, and solve for any missing one. Money is rounded to the nearest cent.', 'h1' => 'Pet sitter rates Calculator', 'updated' => '2024-07-12'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hours_sitting',
                            'label' => 'The number of hours pet sitting',
                            'type' => 'number',
                            'help' => 'Hours pet sitting per day.',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'days_of_care',
                            'label' => 'Days of care',
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
                            'name' => 'pet_sitting_cost',
                            'label' => 'Pet sitting cost',
                            'type' => 'number',
                            'help' => 'Total cost for the period.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pet_sitting_rate',
                            'label' => 'Pet sitting rate',
                            'type' => 'number',
                            'suffix' => '/h',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'pet_sitting_cost = hours_sitting * days_of_care * pet_sitting_rate',
            'results' => ['pet_sitting_cost' => 'days_of_care*hours_sitting*pet_sitting_rate', 'pet_sitting_rate' => 'pet_sitting_cost/(days_of_care*hours_sitting)', 'hours_sitting' => 'pet_sitting_cost/(days_of_care*pet_sitting_rate)', 'days_of_care' => 'pet_sitting_cost/(hours_sitting*pet_sitting_rate)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Pet sitter rates takes The number of hours pet sitting, Days of care and Pet sitting rate and returns Pet sitting cost. Nothing is looked up on this page: pet sitting cost is computed from the number of hours pet sitting and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Pet sitting cost is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Pet sitter rates calculator works', 'html' => <<<'TXT'
            <p>Pet sitter rates answers one question from 3 numbers, and the answer is Pet sitting cost.</p><p>In the form&#039;s own words, Pet sitting cost = Days of care × The number of hours pet sitting × Pet sitting rate.</p><p>What comes back is Pet sitting cost — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>The number of hours pet sitting</strong> — in hours. Hours pet sitting per day.</li><li><strong>Days of care</strong> — a plain number, no unit</li><li><strong>Pet sitting rate</strong> — in /h</li></ul><p>What you get back is Pet sitting cost in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — The number of hours pet sitting = 10 hrs, Days of care = 1 and Pet sitting rate = 1000 /h — through the same formula and the panel reports <strong>Pet sitting cost</strong> = 10000 USD.</p><ul><li><strong>Pet sitting cost</strong> = 10000 USD</li></ul><p>That is <strong>Pet sitting cost</strong> = <code>Days of care × The number of hours pet sitting × Pet sitting rate</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Pet sitting cost</strong> = 10000 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: The number of hours pet sitting offers 18 units and opens on hours, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Pet sitting cost</strong> = <code>Days of care × The number of hours pet sitting × Pet sitting rate</code></li><li><strong>Pet sitting rate</strong> = <code>Pet sitting cost ÷ (Days of care × The number of hours pet sitting)</code></li><li><strong>The number of hours pet sitting</strong> = <code>Pet sitting cost ÷ (Days of care × Pet sitting rate)</code></li><li><strong>Days of care</strong> = <code>Pet sitting cost ÷ (The number of hours pet sitting × Pet sitting rate)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Pet sitting cost</strong> = <code>Days of care × The number of hours pet sitting × Pet sitting rate</code> — the form to use when Days of care, The number of hours pet sitting and Pet sitting rate are the values you have.</li><li><strong>Pet sitting rate</strong> = <code>Pet sitting cost ÷ (Days of care × The number of hours pet sitting)</code> — the form to use when Pet sitting cost, Days of care and The number of hours pet sitting are the values you have.</li><li><strong>The number of hours pet sitting</strong> = <code>Pet sitting cost ÷ (Days of care × Pet sitting rate)</code> — the form to use when Pet sitting cost, Days of care and Pet sitting rate are the values you have.</li><li><strong>Days of care</strong> = <code>Pet sitting cost ÷ (The number of hours pet sitting × Pet sitting rate)</code> — the form to use when Pet sitting cost, The number of hours pet sitting and Pet sitting rate are the values you have.</li></ul><p>Any one of Pet sitting cost, Pet sitting rate and The number of hours pet sitting can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — The number of hours pet sitting, from 10 to 20 — and the answers go from <strong>Pet sitting cost</strong> 10000 USD to <strong>Pet sitting cost</strong> 20000 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside The number of hours pet sitting is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Pet sitting cost is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>The number of hours pet sitting left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If The number of hours pet sitting is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Days of care left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Days of care is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert The number of hours pet sitting to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Pet sitter rates form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>The number of hours pet sitting</strong> is a hours quantity: the page opens it in hrs and converts anything else you pick before the formula runs. Hours pet sitting per day. Change it and Pet sitting cost, Pet sitting rate and Days of care changes with it. Fill it from a measurement rather than a memory — The number of hours pet sitting is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Days of care</strong> takes a plain number with no unit attached. Change it and Pet sitting cost, Pet sitting rate and The number of hours pet sitting changes with it. Fill it from a measurement rather than a memory — Days of care is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Pet sitting rate</strong> is measured in /h. Change it and Pet sitting cost, The number of hours pet sitting and Days of care changes with it. Fill it from a measurement rather than a memory — Pet sitting rate is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Pet sitting cost</strong> is a plain number and the page's own defaults put it at 10000. It is computed from Days of care, The number of hours pet sitting and Pet sitting rate, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Pet sitting cost</th></tr></thead><tbody><tr><td><strong>The number of hours pet sitting</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Days of care</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Pet sitting rate</strong> +10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, The number of hours pet sitting sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in The number of hours pet sitting = 5 hrs, Days of care = 0.5 and Pet sitting rate = 500 /h and the page reports <strong>Pet sitting cost</strong> = 1250 USD.</li><li>Feed in The number of hours pet sitting = 30 hrs, Days of care = 1 and Pet sitting rate = 1000 /h and the page reports <strong>Pet sitting cost</strong> = 30000 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Pet sitter rates actually offers.</p><ul><li><strong>hours</strong> — 18 units. It opens in <em>hrs</em>, and the chip also carries yrs, min, 15 sec, days, wks and mos. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Pet sitting cost follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are hours and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes The number of hours pet sitting, Days of care and Pet sitting rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are The number of hours pet sitting, Days of care and Pet sitting rate and the number you are missing is Pet sitting cost.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/dog-harness-size">Dog harness size</a>, <a href="/biology/dog-heat-cycle">Dog heat cycle</a> and <a href="/biology/dog-life-expectancy">Dog life expectancy Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pet sitter rates calculator work out?', 'a' => <<<'TXT'
            Pet sitting cost, from Days of care, The number of hours pet sitting and Pet sitting rate. The relationship is Pet sitting cost = Days of care × The number of hours pet sitting × Pet sitting rate.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            The number of hours pet sitting (hours), Days of care, Pet sitting rate (/h). Enter the number of hours pet sitting, days of care and pet sitting rate; Pet sitting cost is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Pet sitting cost, Pet sitting rate, The number of hours pet sitting and Days of care blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Pet sitting cost = 10000 USD. Those are the defaults written into the form — move The number of hours pet sitting and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Pet sitting cost is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave The number of hours pet sitting blank and the page solves for it, reporting Pet sitting cost instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Pet sitting cost keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dog-harness-size', 'name' => 'Dog harness size'],
            ['path' => '/biology/dog-heat-cycle', 'name' => 'Dog heat cycle'],
            ['path' => '/biology/dog-life-expectancy', 'name' => 'Dog life expectancy Calculator'],
        ],
        'authors' => [],
    ],
];
