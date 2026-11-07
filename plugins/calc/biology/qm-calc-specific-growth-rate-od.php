<?php

/**
 * Specific Growth Rate from OD
 * /biology/specific-growth-rate-od
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Specific Growth Rate from OD',
    'meta' => ['title' => 'Specific Growth Rate from OD — Formula & Results', 'description' => <<<'TXT'
    Specific Growth Rate from OD turns first OD₆₀₀ and Second OD₆₀₀ into doubling time and generations. Every box can be solved for, not only the one in the title.
    TXT, 'h1' => 'Specific Growth Rate from OD', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'od1',
                            'label' => 'First OD₆₀₀',
                            'type' => 'number',
                            'help' => 'Blank subtracted, in the linear range',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.15',
                        ],
                        [
                            'name' => 'od2',
                            'label' => 'Second OD₆₀₀',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.62',
                        ],
                        [
                            'name' => 't1',
                            'label' => 'First reading at',
                            'type' => 'number',
                            'suffix' => 'h',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 't2',
                            'label' => 'Second reading at',
                            'type' => 'number',
                            'suffix' => 'h',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3',
                        ],
                        [
                            'name' => 'mu',
                            'label' => 'Specific growth rate',
                            'type' => 'number',
                            'suffix' => '1/h',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'doubling',
                            'label' => 'Doubling time',
                            'type' => 'number',
                            'suffix' => 'min',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'generations',
                            'label' => 'Generations',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rate_per_day',
                            'label' => 'Growth rate',
                            'type' => 'number',
                            'suffix' => '1/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Growth',
            'results' => ['mu' => 'ln(od2/od1)/(t2-t1)', 'doubling' => 'ln(2)/mu*60', 'generations' => 'mu*(t2-t1)/ln(2)', 'rate_per_day' => 'mu*24'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Specific Growth Rate from OD turns First OD₆₀₀, Second OD₆₀₀ and First reading at into Specific growth rate and Doubling time. It is a single relationship that reads specific growth rate out of first OD₆₀₀, not a table of canned results keyed by them. Units for Specific growth rate default to 1/h and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Specific Growth Rate from OD calculator works', 'html' => <<<'TXT'
            <p>The Specific Growth Rate from OD calculator applies one relationship to 4 numbers and reports Specific growth rate, Doubling time and Generations.</p><p>In the form&#039;s own words, Specific growth rate = ln(Second OD₆₀₀ ÷ First OD₆₀₀) ÷ (Second reading at − First reading at).</p><p>The result panel carries Specific growth rate, Doubling time, Generations and Growth rate, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>First OD₆₀₀</strong> — a plain number, no unit. Blank subtracted, in the linear range</li><li><strong>Second OD₆₀₀</strong> — a plain number, no unit</li><li><strong>First reading at</strong> — in h</li><li><strong>Second reading at</strong> — in h</li></ul><p>The result boxes are Specific growth rate in 1/h, Doubling time in min, Generations, Growth rate in 1/day; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, First OD₆₀₀ = 0.15, Second OD₆₀₀ = 0.62, First reading at = 5 h and Second reading at = 3 h gives <strong>Specific growth rate</strong> = -0.7095 1/h, <strong>Doubling time</strong> = -58.61 min, <strong>Generations</strong> = 2.05 and <strong>Growth rate</strong> = -17.03 1/day.</p><ul><li><strong>Specific growth rate</strong> = -0.7095 1/h</li><li><strong>Doubling time</strong> = -58.61 min</li><li><strong>Generations</strong> = 2.05</li><li><strong>Growth rate</strong> = -17.03 1/day</li></ul><p>That is <strong>Specific growth rate</strong> = <code>ln(Second OD₆₀₀ ÷ First OD₆₀₀) ÷ (Second reading at − First reading at)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Specific growth rate</strong> = -0.7095, <strong>Doubling time</strong> = -58.61, <strong>Generations</strong> = 2.05 and <strong>Growth rate</strong> = -17.03 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Specific growth rate takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Specific growth rate</strong> = <code>ln(Second OD₆₀₀ ÷ First OD₆₀₀) ÷ (Second reading at − First reading at)</code></li><li><strong>Doubling time</strong> = <code>ln(2) ÷ Specific growth rate × 60</code></li><li><strong>Generations</strong> = <code>Specific growth rate × (Second reading at − First reading at) ÷ ln(2)</code></li><li><strong>Growth rate</strong> = <code>Specific growth rate × 24</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Specific growth rate</strong> = <code>ln(Second OD₆₀₀ ÷ First OD₆₀₀) ÷ (Second reading at − First reading at)</code> — the form to use when Second OD₆₀₀, First OD₆₀₀, Second reading at and First reading at are the values you have.</li><li><strong>Doubling time</strong> = <code>ln(2) ÷ Specific growth rate × 60</code> — the form to use when Specific growth rate are the values you have.</li><li><strong>Generations</strong> = <code>Specific growth rate × (Second reading at − First reading at) ÷ ln(2)</code> — the form to use when Specific growth rate, Second reading at and First reading at are the values you have.</li><li><strong>Growth rate</strong> = <code>Specific growth rate × 24</code> — the form to use when Specific growth rate are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Specific growth rate, Doubling time and Generations can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double First OD₆₀₀ from 0.15 to 0.3, leaving every other box alone. The panel moves from <strong>Specific growth rate</strong> -0.7095 1/h, <strong>Doubling time</strong> -58.61 min, <strong>Generations</strong> 2.05 and <strong>Growth rate</strong> -17.03 1/day to <strong>Specific growth rate</strong> -0.363 1/h, <strong>Doubling time</strong> -115 min, <strong>Generations</strong> 1.05 and <strong>Growth rate</strong> -8.71 1/day.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Specific growth rate, Doubling time and Generations are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>First OD₆₀₀ left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If First OD₆₀₀ is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Second OD₆₀₀ left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Second OD₆₀₀ is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>First reading at left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If First reading at is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert First OD₆₀₀ to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Specific Growth Rate from OD form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>First OD₆₀₀</strong> takes a plain number with no unit attached. Blank subtracted, in the linear range. It feeds Specific growth rate. Fill it from a measurement rather than a memory — First OD₆₀₀ is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Second OD₆₀₀</strong> takes a plain number with no unit attached. It feeds Specific growth rate. Fill it from a measurement rather than a memory — Second OD₆₀₀ is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>First reading at</strong> is measured in h. It feeds Specific growth rate and Generations. Fill it from a measurement rather than a memory — First reading at is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Second reading at</strong> is measured in h. It feeds Specific growth rate and Generations. Fill it from a measurement rather than a memory — Second reading at is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Specific growth rate</strong> is a plain number and the page's own defaults put it at -0.7095. The value follows from Second OD₆₀₀, First OD₆₀₀, Second reading at and First reading at. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Doubling time</strong> is a plain number and the page's own defaults put it at -58.61. The value follows from Specific growth rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Generations</strong> is a plain number and the page's own defaults put it at 2.05. The value follows from Specific growth rate, Second reading at and First reading at. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Growth rate</strong> is a plain number and the page's own defaults put it at -17.03. The value follows from Specific growth rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Specific growth rate</th><th>Doubling time</th><th>Generations</th><th>Growth rate</th></tr></thead><tbody><tr><td><strong>First OD₆₀₀</strong> +10%</td><td>+6.72%</td><td>-7.2%</td><td>-6.72%</td><td>+6.72%</td></tr><tr><td><strong>Second OD₆₀₀</strong> +10%</td><td>-6.72%</td><td>+6.29%</td><td>+6.72%</td><td>-6.72%</td></tr><tr><td><strong>First reading at</strong> +10%</td><td>+20%</td><td>-25%</td><td>+0%</td><td>+20%</td></tr><tr><td><strong>Second reading at</strong> +10%</td><td>-17.65%</td><td>+15%</td><td>+0%</td><td>-17.65%</td></tr></tbody></table><p>Ranked by leverage, First reading at sits at the top — a ten per cent error in that box shows up as roughly 25 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in First OD₆₀₀ = 0.075, Second OD₆₀₀ = 0.31, First reading at = 2.5 h and Second reading at = 1.5 h and the page reports <strong>Specific growth rate</strong> = -1.42 1/h, <strong>Doubling time</strong> = -29.31 min, <strong>Generations</strong> = 2.05 and <strong>Growth rate</strong> = -34.06 1/day.</li><li>Feed in First OD₆₀₀ = 0.45, Second OD₆₀₀ = 0.62, First reading at = 5 h and Second reading at = 3 h and the page reports <strong>Specific growth rate</strong> = -0.1602 1/h, <strong>Doubling time</strong> = -260 min, <strong>Generations</strong> = 0.4623 and <strong>Growth rate</strong> = -3.85 1/day.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Specific growth rate is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are First OD₆₀₀, Second OD₆₀₀ and First reading at and the number you are missing is Specific growth rate and Doubling time.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/huglin-index">Huglin Index Calculator</a>, <a href="/biology/hunting-tooth-ratio">Hunting Tooth Ratio Calculator</a> and <a href="/biology/ideal-fish-tank-size">Ideal Fish Tank Size Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Specific Growth Rate from OD calculator work out?', 'a' => <<<'TXT'
            Specific growth rate, Doubling time, Generations and Growth rate, from Second OD₆₀₀, First OD₆₀₀, Second reading at and First reading at. The relationship is Specific growth rate = ln(Second OD₆₀₀ ÷ First OD₆₀₀) ÷ (Second reading at − First reading at).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            First OD₆₀₀, Second OD₆₀₀, First reading at (h), Second reading at (h). Enter first OD₆₀₀, second OD₆₀₀ and first reading at; Specific growth rate is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Specific growth rate, Doubling time, Generations and Growth rate can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Specific growth rate = -0.7095 1/h, Doubling time = -58.61 min, Generations = 2.05 and Growth rate = -17.03 1/day. Those are the defaults written into the form — move First OD₆₀₀ and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Specific growth rate is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave First OD₆₀₀ blank and the page solves for it, reporting Specific growth rate instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Specific growth rate at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/huglin-index', 'name' => 'Huglin Index Calculator'],
            ['path' => '/biology/hunting-tooth-ratio', 'name' => 'Hunting Tooth Ratio Calculator'],
            ['path' => '/biology/ideal-fish-tank-size', 'name' => 'Ideal Fish Tank Size Calculator'],
        ],
        'authors' => [],
    ],
];
