<?php

/**
 * Percent Germination Calculator
 * /biology/percent-germination
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Percent Germination Calculator',
    'meta' => ['title' => 'Percent Germination Calculator — Formula & Results', 'description' => 'Percent Germination Calculator works out viability (germinated + dormant) from seeds germinated and seeds sown. The formula is printed in the form\'s own words.', 'h1' => 'Percent Germination Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'germinated',
                            'label' => 'Seeds germinated',
                            'type' => 'number',
                            'suffix' => 'seeds',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '88',
                        ],
                        [
                            'name' => 'sown',
                            'label' => 'Seeds sown',
                            'type' => 'number',
                            'suffix' => 'seeds',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'dead',
                            'label' => 'Seeds rotted or dead',
                            'type' => 'number',
                            'suffix' => 'seeds',
                            'help' => 'Optional — separates non-viable from dormant',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'germination',
                            'label' => 'Germination',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'viability',
                            'label' => 'Viability (germinated + dormant)',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'seed_needed',
                            'label' => 'Seeds needed for 10 000 plants',
                            'type' => 'number',
                            'suffix' => 'seeds',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'sow_rate',
                            'label' => 'Sowing rate for 1 000 plants/m²',
                            'type' => 'number',
                            'suffix' => 'seeds/m²',
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
            'title' => 'Germination',
            'results' => ['germination' => 'germinated/sown*100', 'viability' => '(sown-dead)/sown*100', 'seed_needed' => '10000/(germinated/sown)', 'sow_rate' => '1000/(germinated/sown)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Percent Germination takes Seeds germinated, Seeds sown and Seeds rotted or dead and returns Germination and Viability (germinated + dormant). It is a single relationship that reads germination out of seeds germinated, not a table of canned results keyed by them. Units for Germination default to % and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Percent Germination calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Percent Germination: it takes 3 numbers and reports Germination, Viability (germinated + dormant) and Seeds needed for 10 000 plants.</p><p>Written with the labels from the form, Germination = Seeds germinated ÷ Seeds sown × 100.</p><p>The answers are Germination, Viability (germinated + dormant), Seeds needed for 10 000 plants and Sowing rate for 1 000 plants/m²; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Seeds germinated</strong> — in seeds</li><li><strong>Seeds sown</strong> — in seeds</li><li><strong>Seeds rotted or dead</strong> — in seeds. Optional — separates non-viable from dormant</li></ul><p>The result boxes are Germination in %, Viability (germinated + dormant) in %, Seeds needed for 10 000 plants in seeds, Sowing rate for 1 000 plants/m² in seeds/m²; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Seeds germinated = 88 seeds, Seeds sown = 100 seeds and Seeds rotted or dead = 5 seeds; the answers are <strong>Germination</strong> = 88 %, <strong>Viability (germinated + dormant)</strong> = 95 %, <strong>Seeds needed for 10 000 plants</strong> = 11364 seeds and <strong>Sowing rate for 1 000 plants/m²</strong> = 1136 seeds/m².</p><ul><li><strong>Germination</strong> = 88 %</li><li><strong>Viability (germinated + dormant)</strong> = 95 %</li><li><strong>Seeds needed for 10 000 plants</strong> = 11364 seeds</li><li><strong>Sowing rate for 1 000 plants/m²</strong> = 1136 seeds/m²</li></ul><p>The line behind those figures is <strong>Germination</strong> = <code>Seeds germinated ÷ Seeds sown × 100</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Germination</strong> = 88, <strong>Viability (germinated + dormant)</strong> = 95, <strong>Seeds needed for 10 000 plants</strong> = 11364 and <strong>Sowing rate for 1 000 plants/m²</strong> = 1136 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Germination takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Germination</strong> = <code>Seeds germinated ÷ Seeds sown × 100</code></li><li><strong>Viability (germinated + dormant)</strong> = <code>(Seeds sown − Seeds rotted or dead) ÷ Seeds sown × 100</code></li><li><strong>Seeds needed for 10 000 plants</strong> = <code>10000 ÷ (Seeds germinated ÷ Seeds sown)</code></li><li><strong>Sowing rate for 1 000 plants/m²</strong> = <code>1000 ÷ (Seeds germinated ÷ Seeds sown)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Germination</strong> = <code>Seeds germinated ÷ Seeds sown × 100</code> — the form to use when Seeds germinated and Seeds sown are the values you have.</li><li><strong>Viability (germinated + dormant)</strong> = <code>(Seeds sown − Seeds rotted or dead) ÷ Seeds sown × 100</code> — the form to use when Seeds sown and Seeds rotted or dead are the values you have.</li><li><strong>Seeds needed for 10 000 plants</strong> = <code>10000 ÷ (Seeds germinated ÷ Seeds sown)</code> — the form to use when Seeds germinated and Seeds sown are the values you have.</li><li><strong>Sowing rate for 1 000 plants/m²</strong> = <code>1000 ÷ (Seeds germinated ÷ Seeds sown)</code> — the form to use when Seeds germinated and Seeds sown are the values you have.</li></ul><p>Any one of Germination, Viability (germinated + dormant) and Seeds needed for 10 000 plants can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Seeds germinated from 88 to 176, leaving every other box alone. The panel moves from <strong>Germination</strong> 88 %, <strong>Viability (germinated + dormant)</strong> 95 %, <strong>Seeds needed for 10 000 plants</strong> 11364 seeds and <strong>Sowing rate for 1 000 plants/m²</strong> 1136 seeds/m² to <strong>Germination</strong> 176 %, <strong>Viability (germinated + dormant)</strong> 95 %, <strong>Seeds needed for 10 000 plants</strong> 5682 seeds and <strong>Sowing rate for 1 000 plants/m²</strong> 568 seeds/m².</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Germination, Viability (germinated + dormant) and Seeds needed for 10 000 plants are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Seeds germinated left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Seeds germinated is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Seeds sown left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Seeds sown is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Seeds rotted or dead left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Seeds rotted or dead is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Seeds germinated to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Percent Germination form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Seeds germinated</strong> is measured in seeds. The page reads it when it works out Germination, Seeds needed for 10 000 plants and Sowing rate for 1 000 plants/m². Fill it from a measurement rather than a memory — Seeds germinated is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Seeds sown</strong> is measured in seeds. The page reads it when it works out Germination, Viability (germinated + dormant) and Seeds needed for 10 000 plants. Fill it from a measurement rather than a memory — Seeds sown is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Seeds rotted or dead</strong> is measured in seeds. Optional — separates non-viable from dormant. The page reads it when it works out Viability (germinated + dormant). Fill it from a measurement rather than a memory — Seeds rotted or dead is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Germination</strong> is a plain number and the page's own defaults put it at 88. The value follows from Seeds germinated and Seeds sown. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Viability (germinated + dormant)</strong> is a plain number and the page's own defaults put it at 95. The value follows from Seeds sown and Seeds rotted or dead. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Seeds needed for 10 000 plants</strong> is a plain number and the page's own defaults put it at 11364. The value follows from Seeds germinated and Seeds sown. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Sowing rate for 1 000 plants/m²</strong> is a plain number and the page's own defaults put it at 1136. The value follows from Seeds germinated and Seeds sown. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Germination</th><th>Viability (germinated + dormant)</th><th>Seeds needed for 10 000 plants</th><th>Sowing rate for 1 000 plants/m²</th></tr></thead><tbody><tr><td><strong>Seeds germinated</strong> +10%</td><td>+10%</td><td>+0%</td><td>-9.09%</td><td>-9.09%</td></tr><tr><td><strong>Seeds sown</strong> +10%</td><td>-9.09%</td><td>+0.48%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Seeds rotted or dead</strong> +10%</td><td>+0%</td><td>-0.53%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Seeds germinated sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Seeds germinated = 44 seeds, Seeds sown = 50 seeds and Seeds rotted or dead = 2.5 seeds and the page reports <strong>Germination</strong> = 88 %, <strong>Viability (germinated + dormant)</strong> = 95 %, <strong>Seeds needed for 10 000 plants</strong> = 11364 seeds and <strong>Sowing rate for 1 000 plants/m²</strong> = 1136 seeds/m².</li><li>Feed in Seeds germinated = 264 seeds, Seeds sown = 100 seeds and Seeds rotted or dead = 5 seeds and the page reports <strong>Germination</strong> = 264 %, <strong>Viability (germinated + dormant)</strong> = 95 %, <strong>Seeds needed for 10 000 plants</strong> = 3788 seeds and <strong>Sowing rate for 1 000 plants/m²</strong> = 379 seeds/m².</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Germination follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Seeds germinated, Seeds sown and Seeds rotted or dead and the number you are missing is Germination and Viability (germinated + dormant).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/dog-raisin-toxicity">Dog raisin toxicity Calculator</a>, <a href="/biology/dog-size">Dog size Calculator</a> and <a href="/biology/dog-water-intake">Dog water intake Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Percent Germination calculator work out?', 'a' => <<<'TXT'
            Germination, Viability (germinated + dormant), Seeds needed for 10 000 plants and Sowing rate for 1 000 plants/m², from Seeds germinated and Seeds sown. The relationship is Germination = Seeds germinated ÷ Seeds sown × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Seeds germinated (seeds), Seeds sown (seeds), Seeds rotted or dead (seeds). With seeds germinated, seeds sown and seeds rotted or dead in place, Germination can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Germination, Viability (germinated + dormant), Seeds needed for 10 000 plants and Sowing rate for 1 000 plants/m² blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Germination = 88 %, Viability (germinated + dormant) = 95 %, Seeds needed for 10 000 plants = 11364 seeds and Sowing rate for 1 000 plants/m² = 1136 seeds/m². Those are the defaults written into the form — move Seeds germinated and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Germination is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Seeds germinated blank and the page solves for it, reporting Germination instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Germination keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dog-raisin-toxicity', 'name' => 'Dog raisin toxicity Calculator'],
            ['path' => '/biology/dog-size', 'name' => 'Dog size Calculator'],
            ['path' => '/biology/dog-water-intake', 'name' => 'Dog water intake Calculator'],
        ],
        'authors' => [],
    ],
];
