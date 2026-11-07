<?php

/**
 * PCR Master Mix Calculator
 * /biology/pcr-master-mix-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'PCR Master Mix Calculator',
    'meta' => ['title' => 'PCR Master Mix Calculator — Formula & Results', 'description' => 'PCR Master Mix turns Reactions, Extra reactions and Volume per reaction into Total mix volume and Master mix to add. Each primer, from a 10 µM working…', 'h1' => 'PCR Master Mix Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'reactions',
                            'label' => 'Reactions',
                            'type' => 'number',
                            'help' => 'Samples plus controls',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '24',
                        ],
                        [
                            'name' => 'extra',
                            'label' => 'Extra reactions',
                            'type' => 'number',
                            'help' => 'Allowance for pipetting loss',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'rxn_vol',
                            'label' => 'Volume per reaction',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'mm_stock',
                            'label' => 'Master mix stock concentration',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '2× mix is used at half the final volume',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'primer_stock',
                            'label' => 'Primer stock',
                            'type' => 'number',
                            'suffix' => 'µM',
                            'help' => 'Each primer, from a 10 µM working stock',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'primer_final',
                            'label' => 'Primer final concentration',
                            'type' => 'number',
                            'suffix' => 'µM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.5',
                        ],
                        [
                            'name' => 'template',
                            'label' => 'Template volume per reaction',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total mix volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'mm_vol',
                            'label' => 'Master mix to add',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'primer_vol',
                            'label' => 'Each primer to add',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'water_vol',
                            'label' => 'Water to add',
                            'type' => 'number',
                            'suffix' => 'µL',
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
            'title' => 'Master mix',
            'results' => ['total' => '(reactions+extra)*rxn_vol', 'mm_vol' => '(reactions+extra)*rxn_vol/mm_stock', 'primer_vol' => '(reactions+extra)*rxn_vol*primer_final/primer_stock', 'water_vol' => '(reactions+extra)*rxn_vol-(reactions+extra)*rxn_vol/mm_stock-(reactions+extra)*rxn_vol*primer_final/primer_stock*2-(reactions+extra)*template'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        PCR Master Mix turns Reactions, Extra reactions and Volume per reaction into Total mix volume and Master mix to add. It is a single relationship that reads Total mix volume out of Reactions, not a table of canned results keyed by them. Units for Total mix volume default to µL and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the PCR Master Mix calculator works', 'html' => <<<'TXT'
            <p>The PCR Master Mix calculator applies one relationship to 7 numbers and reports Total mix volume, Master mix to add and Each primer to add.</p><p>In the form&#039;s own words, Total mix volume = (Reactions + Extra reactions) × Volume per reaction.</p><p>What comes back is Total mix volume, Master mix to add, Each primer to add and Water to add — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 7 boxes, and nothing else.</p><ul><li><strong>Reactions</strong> — a plain number, no unit. Samples plus controls</li><li><strong>Extra reactions</strong> — a plain number, no unit. Allowance for pipetting loss</li><li><strong>Volume per reaction</strong> — in µL</li><li><strong>Master mix stock concentration</strong> — in ×. 2× mix is used at half the final volume</li><li><strong>Primer stock</strong> — in µM. Each primer, from a 10 µM working stock</li><li><strong>Primer final concentration</strong> — in µM</li><li><strong>Template volume per reaction</strong> — in µL</li></ul><p>The answers come back as Total mix volume in µL, Master mix to add in µL, Each primer to add in µL, Water to add in µL. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Reactions = 24, Extra reactions = 2, Volume per reaction = 25 µL, Master mix stock concentration = 2 ×, Primer stock = 10 µM, Primer final concentration = 0.5 µM and Template volume per reaction = 1 µL — through the same formula and the panel reports &lt;strong&gt;Total mix volume&lt;/strong&gt; = 650 µL, &lt;strong&gt;Master mix to add&lt;/strong&gt; = 325 µL, &lt;strong&gt;Each primer to add&lt;/strong&gt; = 32.5 µL and &lt;strong&gt;Water to add&lt;/strong&gt; = 234 µL.</p><ul><li><strong>Total mix volume</strong> = 650 µL</li><li><strong>Master mix to add</strong> = 325 µL</li><li><strong>Each primer to add</strong> = 32.5 µL</li><li><strong>Water to add</strong> = 234 µL</li></ul><p>The line behind those figures is <strong>Total mix volume</strong> = <code>(Reactions + Extra reactions) × Volume per reaction</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Total mix volume&lt;/strong&gt; = 650, &lt;strong&gt;Master mix to add&lt;/strong&gt; = 325, &lt;strong&gt;Each primer to add&lt;/strong&gt; = 32.5 and &lt;strong&gt;Water to add&lt;/strong&gt; = 234 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Total mix volume takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Total mix volume</strong> = <code>(Reactions + Extra reactions) × Volume per reaction</code></li><li><strong>Master mix to add</strong> = <code>(Reactions + Extra reactions) × Volume per reaction ÷ Master mix stock concentration</code></li><li><strong>Each primer to add</strong> = <code>(Reactions + Extra reactions) × Volume per reaction × Primer final concentration ÷ Primer stock</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Total mix volume, Master mix to add and Each primer to add can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Reactions from 24 to 48, leaving every other box alone. The panel moves from &lt;strong&gt;Total mix volume&lt;/strong&gt; 650 µL, &lt;strong&gt;Master mix to add&lt;/strong&gt; 325 µL, &lt;strong&gt;Each primer to add&lt;/strong&gt; 32.5 µL and &lt;strong&gt;Water to add&lt;/strong&gt; 234 µL to &lt;strong&gt;Total mix volume&lt;/strong&gt; 1250 µL, &lt;strong&gt;Master mix to add&lt;/strong&gt; 625 µL, &lt;strong&gt;Each primer to add&lt;/strong&gt; 62.5 µL and &lt;strong&gt;Water to add&lt;/strong&gt; 450 µL.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Total mix volume, Master mix to add and Each primer to add are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Reactions to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Reactions, Extra reactions and Volume per reaction is what you already know and Total mix volume and Master mix to add is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/osmolarity-osmotic-pressure">Osmolarity / Osmotic Pressure Calculator</a>, <a href="/biology/pasture-stocking-rate">Pasture Stocking Rate Calculator</a> and <a href="/biology/pcr-annealing-temperature">PCR Annealing Temperature Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the PCR Master Mix calculator work out?', 'a' => <<<'TXT'
            Total mix volume, Master mix to add, Each primer to add and Water to add, from Reactions, Extra reactions and Volume per reaction. The relationship is Total mix volume = (Reactions + Extra reactions) × Volume per reaction.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Reactions, Extra reactions, Volume per reaction (µL), Master mix stock concentration (×), Primer stock (µM). Enter reactions, extra and rxn_vol; Total mix volume is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Total mix volume, Master mix to add, Each primer to add and Water to add can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Total mix volume = 650 µL, Master mix to add = 325 µL, Each primer to add = 32.5 µL and Water to add = 234 µL. That comes from the page's own defaults, entered in Reactions; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Total mix volume is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Reactions blank and the page solves for it, reporting Total mix volume instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Total mix volume keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/osmolarity-osmotic-pressure', 'name' => 'Osmolarity / Osmotic Pressure Calculator'],
            ['path' => '/biology/pasture-stocking-rate', 'name' => 'Pasture Stocking Rate Calculator'],
            ['path' => '/biology/pcr-annealing-temperature', 'name' => 'PCR Annealing Temperature Calculator'],
        ],
        'authors' => [],
    ],
];
