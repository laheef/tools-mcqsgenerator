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
    'meta' => ['title' => 'Fish Tank Stocking Calculator — Formula & Results', 'description' => 'Stocking is limited by filter capacity and by the space adult fish need, and both are usually miscalculated because people stock for the size the fish are now', 'h1' => 'Fish Tank Stocking Calculator', 'updated' => '2026-10-29'],
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
        Fish Tank Stocking takes True water volume, Adult length of the species and Fish planned and returns Stocking capacity and Stocking level. Nothing is looked up on this page: Stocking capacity is computed from True water volume and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Stocking capacity is opened in cm; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Fish Tank Stocking calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Fish Tank Stocking: it takes 5 numbers and reports Stocking capacity, Stocking level and Adult biomass.</p><p>In the form&#039;s own words, Stocking capacity = True water volume × Stocking factor.</p><p>What comes back is Stocking capacity, Stocking level, Adult biomass and Turnovers per hour — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs.</p><ul><li><strong>True water volume</strong> — in L</li><li><strong>Adult length of the species</strong> — in cm. Not the juvenile size</li><li><strong>Fish planned</strong> — a plain number, no unit</li><li><strong>Filter turnover</strong> — in L/h</li><li><strong>Stocking factor</strong> — in cm per L. 0.6 for goldfish, 0.8 for cichlids</li></ul><p>The answers come back as Stocking capacity in cm, Stocking level in %, Adult biomass in g, Turnovers per hour in per hour, Fish of this size that fit in fish. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — True water volume = 160 L, Adult length of the species = 6 cm, Fish planned = 20, Filter turnover = 800 L/h and Stocking factor = 1 cm per L — through the same formula and the panel reports &lt;strong&gt;Stocking capacity&lt;/strong&gt; = 160 cm, &lt;strong&gt;Stocking level&lt;/strong&gt; = 75 %, &lt;strong&gt;Adult biomass&lt;/strong&gt; = 43.2 g, &lt;strong&gt;Turnovers per hour&lt;/strong&gt; = 5 per hour and &lt;strong&gt;Fish of this size that fit&lt;/strong&gt; = 26.67 fish.</p><ul><li><strong>Stocking capacity</strong> = 160 cm</li><li><strong>Stocking level</strong> = 75 %</li><li><strong>Adult biomass</strong> = 43.2 g</li><li><strong>Turnovers per hour</strong> = 5 per hour</li><li><strong>Fish of this size that fit</strong> = 26.67 fish</li></ul><p>The line behind those figures is <strong>Stocking capacity</strong> = <code>True water volume × Stocking factor</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Stocking capacity&lt;/strong&gt; = 160, &lt;strong&gt;Stocking level&lt;/strong&gt; = 75, &lt;strong&gt;Adult biomass&lt;/strong&gt; = 43.2, &lt;strong&gt;Turnovers per hour&lt;/strong&gt; = 5 and &lt;strong&gt;Fish of this size that fit&lt;/strong&gt; = 26.67 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Stocking capacity takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Stocking capacity</strong> = <code>True water volume × Stocking factor</code></li><li><strong>Stocking level</strong> = <code>Fish planned × Adult length of the species ÷ max(0.001,True water volume × Stocking factor) × 100</code></li><li><strong>Adult biomass</strong> = <code>Fish planned × (Adult length of the species)^(3) ÷ 1000 × 10</code></li><li><strong>Turnovers per hour</strong> = <code>Filter turnover ÷ True water volume</code></li><li><strong>Fish of this size that fit</strong> = <code>True water volume × Stocking factor ÷ Adult length of the species</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Stocking capacity, Stocking level and Adult biomass can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — True water volume, from 160 to 320 — and the answers go from &lt;strong&gt;Stocking capacity&lt;/strong&gt; 160 cm, &lt;strong&gt;Stocking level&lt;/strong&gt; 75 %, &lt;strong&gt;Adult biomass&lt;/strong&gt; 43.2 g, &lt;strong&gt;Turnovers per hour&lt;/strong&gt; 5 per hour and &lt;strong&gt;Fish of this size that fit&lt;/strong&gt; 26.67 fish to &lt;strong&gt;Stocking capacity&lt;/strong&gt; 320 cm, &lt;strong&gt;Stocking level&lt;/strong&gt; 37.5 %, &lt;strong&gt;Adult biomass&lt;/strong&gt; 43.2 g, &lt;strong&gt;Turnovers per hour&lt;/strong&gt; 2.5 per hour and &lt;strong&gt;Fish of this size that fit&lt;/strong&gt; 53.33 fish.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Stocking capacity, Stocking level and Adult biomass are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert True water volume to one scale before entering anything.</li></ul>
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
            True water volume (L), Adult length of the species (cm), Fish planned, Filter turnover (L/h), Stocking factor (cm per L). Fill volume, length and fish_count and leave Stocking capacity empty if you would rather have that one solved instead.
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
