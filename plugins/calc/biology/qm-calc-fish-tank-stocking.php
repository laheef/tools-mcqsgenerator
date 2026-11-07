<?php

/**
 * Fish Tank Stocking Calculator
 * /biology/fish-tank-stocking
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fish Tank Stocking Calculator',
    'meta' => ['title' => 'Fish Tank Stocking Calculator — Formula & Results', 'description' => 'Fish Tank Stocking Calculator reports stocking capacity and stocking level. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Fish Tank Stocking Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'volume',
                            'label' => 'True water volume',
                            'type' => 'number',
                            'suffix' => 'L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '160',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Adult length of the species',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Not the juvenile size',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                        [
                            'name' => 'fish_count',
                            'label' => 'Fish planned',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'filter',
                            'label' => 'Filter turnover',
                            'type' => 'number',
                            'suffix' => 'L/h',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '800',
                        ],
                        [
                            'name' => 'factor',
                            'label' => 'Stocking factor',
                            'type' => 'number',
                            'suffix' => 'cm per L',
                            'help' => '0.6 for goldfish, 0.8 for cichlids',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.0',
                        ],
                        [
                            'name' => 'capacity',
                            'label' => 'Stocking capacity',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'used',
                            'label' => 'Stocking level',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'biomass',
                            'label' => 'Adult biomass',
                            'type' => 'number',
                            'suffix' => 'g',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'turnover',
                            'label' => 'Turnovers per hour',
                            'type' => 'number',
                            'suffix' => 'per hour',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'max_fish',
                            'label' => 'Fish of this size that fit',
                            'type' => 'number',
                            'suffix' => 'fish',
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
            'title' => 'Stocking',
            'results' => [
                'capacity' => 'volume*factor',
                'used' => 'fish_count*length/max(0.001,volume*factor)*100',
                'biomass' => 'fish_count*pow(length,3)/1000*10',
                'turnover' => 'filter/volume',
                'max_fish' => 'volume*factor/length',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Fish Tank Stocking takes True water volume, Adult length of the species and Fish planned and returns Stocking capacity and Stocking level. Nothing is looked up on this page: stocking capacity is computed from true water volume and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Stocking capacity is opened in cm; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Fish Tank Stocking calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Fish Tank Stocking: it takes 5 numbers and reports Stocking capacity, Stocking level and Adult biomass.</p><p>In the form&#039;s own words, Stocking capacity = True water volume × Stocking factor.</p><p>What comes back is Stocking capacity, Stocking level, Adult biomass and Turnovers per hour — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs.</p><ul><li><strong>True water volume</strong> — in L</li><li><strong>Adult length of the species</strong> — in cm. Not the juvenile size</li><li><strong>Fish planned</strong> — a plain number, no unit</li><li><strong>Filter turnover</strong> — in L/h</li><li><strong>Stocking factor</strong> — in cm per L. 0.6 for goldfish, 0.8 for cichlids</li></ul><p>The answers come back as Stocking capacity in cm, Stocking level in %, Adult biomass in g, Turnovers per hour in per hour, Fish of this size that fit in fish. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — True water volume = 160 L, Adult length of the species = 6 cm, Fish planned = 20, Filter turnover = 800 L/h and Stocking factor = 1 cm per L — through the same formula and the panel reports <strong>Stocking capacity</strong> = 160 cm, <strong>Stocking level</strong> = 75 %, <strong>Adult biomass</strong> = 43.2 g, <strong>Turnovers per hour</strong> = 5 per hour and <strong>Fish of this size that fit</strong> = 26.67 fish.</p><ul><li><strong>Stocking capacity</strong> = 160 cm</li><li><strong>Stocking level</strong> = 75 %</li><li><strong>Adult biomass</strong> = 43.2 g</li><li><strong>Turnovers per hour</strong> = 5 per hour</li><li><strong>Fish of this size that fit</strong> = 26.67 fish</li></ul><p>The line behind those figures is <strong>Stocking capacity</strong> = <code>True water volume × Stocking factor</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Stocking capacity</strong> = 160, <strong>Stocking level</strong> = 75, <strong>Adult biomass</strong> = 43.2, <strong>Turnovers per hour</strong> = 5 and <strong>Fish of this size that fit</strong> = 26.67 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Stocking capacity takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Stocking capacity</strong> = <code>True water volume × Stocking factor</code></li><li><strong>Stocking level</strong> = <code>Fish planned × Adult length of the species ÷ max(0.001,True water volume × Stocking factor) × 100</code></li><li><strong>Adult biomass</strong> = <code>Fish planned × (Adult length of the species)^(3) ÷ 1000 × 10</code></li><li><strong>Turnovers per hour</strong> = <code>Filter turnover ÷ True water volume</code></li><li><strong>Fish of this size that fit</strong> = <code>True water volume × Stocking factor ÷ Adult length of the species</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Stocking capacity</strong> = <code>True water volume × Stocking factor</code> — the form to use when True water volume and Stocking factor are the values you have.</li><li><strong>Stocking level</strong> = <code>Fish planned × Adult length of the species ÷ max(0.001,True water volume × Stocking factor) × 100</code> — the form to use when Fish planned, Adult length of the species, True water volume and Stocking factor are the values you have.</li><li><strong>Adult biomass</strong> = <code>Fish planned × (Adult length of the species)^(3) ÷ 1000 × 10</code> — the form to use when Fish planned and Adult length of the species are the values you have.</li><li><strong>Turnovers per hour</strong> = <code>Filter turnover ÷ True water volume</code> — the form to use when Filter turnover and True water volume are the values you have.</li><li><strong>Fish of this size that fit</strong> = <code>True water volume × Stocking factor ÷ Adult length of the species</code> — the form to use when True water volume, Stocking factor and Adult length of the species are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Stocking capacity, Stocking level and Adult biomass can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — True water volume, from 160 to 320 — and the answers go from <strong>Stocking capacity</strong> 160 cm, <strong>Stocking level</strong> 75 %, <strong>Adult biomass</strong> 43.2 g, <strong>Turnovers per hour</strong> 5 per hour and <strong>Fish of this size that fit</strong> 26.67 fish to <strong>Stocking capacity</strong> 320 cm, <strong>Stocking level</strong> 37.5 %, <strong>Adult biomass</strong> 43.2 g, <strong>Turnovers per hour</strong> 2.5 per hour and <strong>Fish of this size that fit</strong> 53.33 fish.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Stocking capacity, Stocking level and Adult biomass are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>True water volume left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If True water volume is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Adult length of the species left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Adult length of the species is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Fish planned left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Fish planned is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert True water volume to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>True water volume</strong> is measured in L. Change it and Stocking capacity, Stocking level and Turnovers per hour changes with it. Have it to hand before you start: True water volume is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Adult length of the species</strong> is measured in cm. Not the juvenile size. Change it and Stocking level, Adult biomass and Fish of this size that fit changes with it. Have it to hand before you start: Adult length of the species is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Fish planned</strong> takes a plain number with no unit attached. Change it and Stocking level and Adult biomass changes with it. Have it to hand before you start: Fish planned is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Filter turnover</strong> is measured in L/h. Change it and Turnovers per hour changes with it. Have it to hand before you start: Filter turnover is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Stocking factor</strong> is measured in cm per L. 0.6 for goldfish, 0.8 for cichlids. Change it and Stocking capacity, Stocking level and Fish of this size that fit changes with it. Have it to hand before you start: Stocking factor is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Stocking capacity</strong> is a plain number and the page's own defaults put it at 160. It is worked out from True water volume and Stocking factor. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Stocking level</strong> is a plain number and the page's own defaults put it at 75. It is worked out from Fish planned, Adult length of the species, True water volume and Stocking factor. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Adult biomass</strong> is a plain number and the page's own defaults put it at 43.2. It is worked out from Fish planned and Adult length of the species. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Turnovers per hour</strong> is a plain number and the page's own defaults put it at 5. It is worked out from Filter turnover and True water volume. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Fish of this size that fit</strong> is a plain number and the page's own defaults put it at 26.67. It is worked out from True water volume, Stocking factor and Adult length of the species. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Stocking capacity</th><th>Stocking level</th><th>Adult biomass</th><th>Turnovers per hour</th><th>Fish of this size that fit</th></tr></thead><tbody><tr><td><strong>True water volume</strong> +10%</td><td>+10%</td><td>-9.09%</td><td>+0%</td><td>-9.09%</td><td>+10%</td></tr><tr><td><strong>Adult length of the species</strong> +10%</td><td>+0%</td><td>+10%</td><td>+33.1%</td><td>+0%</td><td>-9.09%</td></tr><tr><td><strong>Fish planned</strong> +10%</td><td>+0%</td><td>+10%</td><td>+10%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Filter turnover</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>Stocking factor</strong> +10%</td><td>+10%</td><td>-9.09%</td><td>+0%</td><td>+0%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Adult length of the species sits at the top — a ten per cent error in that box shows up as roughly 33.1 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Stocking capacity is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: True water volume, Adult length of the species and Fish planned measured, Stocking capacity and Stocking level wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/grass-seed">Grass seed Calculator</a>, <a href="/biology/growing-degree-days">Growing Degree Days Calculator</a> and <a href="/biology/guinea-pig-pregnancy">Guinea pig pregnancy</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fish Tank Stocking calculator work out?', 'a' => <<<'TXT'
            Stocking capacity, Stocking level, Adult biomass and Turnovers per hour, from True water volume and Stocking factor. The relationship is Stocking capacity = True water volume × Stocking factor.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            True water volume (L), Adult length of the species (cm), Fish planned, Filter turnover (L/h), Stocking factor (cm per L). Fill true water volume, adult length of the species and fish planned and leave Stocking capacity empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Stocking capacity, Stocking level, Adult biomass and Turnovers per hour can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Stocking capacity = 160 cm, Stocking level = 75 %, Adult biomass = 43.2 g, Turnovers per hour = 5 per hour and Fish of this size that fit = 26.67 fish. Those are the defaults written into the form — move True water volume and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Stocking capacity is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With True water volume left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Stocking capacity keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/grass-seed', 'name' => 'Grass seed Calculator'],
            ['path' => '/biology/growing-degree-days', 'name' => 'Growing Degree Days Calculator'],
            ['path' => '/biology/guinea-pig-pregnancy', 'name' => 'Guinea pig pregnancy'],
        ],
        'authors' => [],
    ],
];
