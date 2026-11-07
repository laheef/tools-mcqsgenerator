<?php

/**
 * Livestock Water Requirement Calculator
 * /biology/livestock-water-requirement
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Livestock Water Requirement Calculator',
    'meta' => ['title' => 'Livestock Water Requirement Calculator — Biology', 'description' => 'Livestock Water Requirement Calculator works out water per animal per day and herd water per day from species, number of animals and average body weight.', 'h1' => 'Livestock Water Requirement Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'species',
                            'label' => 'Species',
                            'type' => 'select',
                            'options' => [
                                'Cattle' => '1',
                                'Sheep' => '2',
                                'Goat' => '3',
                                'Pig' => '4',
                                'Horse' => '5',
                                'Poultry' => '6',
                            ],
                            'control' => 'SELECT',
                            'default' => 'Cattle',
                        ],
                        [
                            'name' => 'head',
                            'label' => 'Number of animals',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'weight',
                            'label' => 'Average body weight',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'help' => 'Adult weight',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '500',
                        ],
                        [
                            'name' => 'temp',
                            'label' => 'Ambient temperature',
                            'type' => 'number',
                            'suffix' => '°C',
                            'help' => 'Daily average or expected maximum',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'per_head',
                            'label' => 'Water per animal per day',
                            'type' => 'number',
                            'suffix' => 'L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'daily',
                            'label' => 'Herd water per day',
                            'type' => 'number',
                            'suffix' => 'L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'weekly',
                            'label' => 'Herd water per week',
                            'type' => 'number',
                            'suffix' => 'L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'flow',
                            'label' => 'Peak flow for a 4-hour drinking window',
                            'type' => 'number',
                            'suffix' => 'L/h',
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
            'title' => 'Water',
            'results' => [
                'per_head' => <<<'TXT'
                if_else(species==1, weight*0.10, if_else(species==2, weight*0.08, if_else(species==3, weight*0.09, if_else(species==4, weight*0.12, if_else(species==5, weight*0.06, weight*0.20)))))*(1+max(0,temp-20)*0.02)
                TXT,
                'daily' => 'head*per_head',
                'weekly' => 'head*per_head*7',
                'flow' => 'head*per_head/4',
                'head' => 'daily/per_head',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Livestock Water Requirement turns Species, Number of animals and Average body weight into Water per animal per day and Herd water per day. Nothing is looked up on this page: water per animal per day is computed from species and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Water per animal per day is opened in L; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Livestock Water Requirement calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Livestock Water Requirement: it takes 4 numbers and reports Water per animal per day, Herd water per day and Herd water per week.</p><p>The result panel carries Water per animal per day, Herd water per day, Herd water per week and Peak flow for a 4-hour drinking window, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Species</strong> — a plain number, no unit</li><li><strong>Number of animals</strong> — a plain number, no unit</li><li><strong>Average body weight</strong> — in kg. Adult weight</li><li><strong>Ambient temperature</strong> — in °C. Daily average or expected maximum</li></ul><p>The answers come back as Water per animal per day in L, Herd water per day in L, Herd water per week in L, Peak flow for a 4-hour drinking window in L/h. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Species = 1, Average body weight = 500 kg and Ambient temperature = 25 °C gives <strong>Water per animal per day</strong> = 55 L.</p><ul><li><strong>Water per animal per day</strong> = 55 L</li></ul>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Water per animal per day</strong> = 55 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Water per animal per day takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Herd water per day</strong> = <code>Number of animals × Water per animal per day</code></li><li><strong>Herd water per week</strong> = <code>Number of animals × Water per animal per day × 7</code></li><li><strong>Peak flow for a 4-hour drinking window</strong> = <code>Number of animals × Water per animal per day ÷ 4</code></li><li><strong>Number of animals</strong> = <code>Herd water per day ÷ Water per animal per day</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Herd water per day</strong> = <code>Number of animals × Water per animal per day</code> — the form to use when Number of animals and Water per animal per day are the values you have.</li><li><strong>Herd water per week</strong> = <code>Number of animals × Water per animal per day × 7</code> — the form to use when Number of animals and Water per animal per day are the values you have.</li><li><strong>Peak flow for a 4-hour drinking window</strong> = <code>Number of animals × Water per animal per day ÷ 4</code> — the form to use when Number of animals and Water per animal per day are the values you have.</li><li><strong>Number of animals</strong> = <code>Herd water per day ÷ Water per animal per day</code> — the form to use when Herd water per day and Water per animal per day are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Water per animal per day, Herd water per day and Herd water per week can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Species, from 1 to 2 — and the answers go from <strong>Water per animal per day</strong> 55 L to <strong>Water per animal per day</strong> 44 L.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Water per animal per day, Herd water per day and Herd water per week are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Species left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Species is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Number of animals left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of animals is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Average body weight left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Average body weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Species and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Species</strong> takes a plain number with no unit attached. The page reads it when it works out Water per animal per day. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Species is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of animals</strong> takes a plain number with no unit attached. The page reads it when it works out Herd water per day, Herd water per week and Peak flow for a 4-hour drinking window. Have it to hand before you start: Number of animals is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Average body weight</strong> is measured in kg. The page reads it when it works out Water per animal per day. Have it to hand before you start: Average body weight is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Ambient temperature</strong> is measured in °C. Daily average or expected maximum. The page reads it when it works out Water per animal per day. Have it to hand before you start: Ambient temperature is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Water per animal per day</strong> is a plain number and the page's own defaults put it at 55. The value follows from Species, Average body weight and Ambient temperature. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Herd water per day</strong> is a plain number. The value follows from Number of animals and Water per animal per day. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Herd water per week</strong> is a plain number. The value follows from Number of animals and Water per animal per day. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Peak flow for a 4-hour drinking window</strong> is a plain number. The value follows from Number of animals and Water per animal per day. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Water per animal per day</th></tr></thead><tbody><tr><td><strong>Species</strong> +10%</td><td>+100%</td></tr><tr><td><strong>Average body weight</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Ambient temperature</strong> +10%</td><td>+4.55%</td></tr></tbody></table><p>Ranked by leverage, Species sits at the top — a ten per cent error in that box shows up as roughly 100 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Species = 0.5, Average body weight = 250 kg and Ambient temperature = 12.5 °C, the answer is <strong>Water per animal per day</strong> = 50 L.</li><li>With Species = 3, Average body weight = 500 kg and Ambient temperature = 25 °C, the answer is <strong>Water per animal per day</strong> = 49.5 L.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Water per animal per day follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Species, Number of animals and Average body weight are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Species, Number of animals and Average body weight measured, Water per animal per day and Herd water per day wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/pet-sitter-rates">Pet sitter rates Calculator</a>, <a href="/biology/phenotypic-ratio">Phenotypic Ratio Calculator</a> and <a href="/biology/photosynthesis-rate">Photosynthesis Rate Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Livestock Water Requirement calculator work out?', 'a' => <<<'TXT'
            Water per animal per day, Herd water per day, Herd water per week and Peak flow for a 4-hour drinking window, from Species, Average body weight and Ambient temperature.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Species, Number of animals, Average body weight (kg), Ambient temperature (°C). Fill species, number of animals and average body weight and leave Water per animal per day empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Water per animal per day, Herd water per day, Herd water per week and Peak flow for a 4-hour drinking window can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Water per animal per day = 55 L. The figures come from Species as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Water per animal per day is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Species left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Water per animal per day keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/pet-sitter-rates', 'name' => 'Pet sitter rates Calculator'],
            ['path' => '/biology/phenotypic-ratio', 'name' => 'Phenotypic Ratio Calculator'],
            ['path' => '/biology/photosynthesis-rate', 'name' => 'Photosynthesis Rate Calculator'],
        ],
        'authors' => [],
    ],
];
