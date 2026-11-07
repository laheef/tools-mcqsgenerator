<?php

/**
 * Lime Requirement Calculator
 * /biology/lime-requirement
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lime Requirement Calculator',
    'meta' => ['title' => 'Lime Requirement Calculator — Formula & Results', 'description' => <<<'TXT'
    Lime Requirement turns Current pH, Target pH and Soil texture into Lime required and As pure CaCO₃ equivalent. There is no hidden constant here: change Lime…
    TXT, 'h1' => 'Lime Requirement Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'ph_now',
                            'label' => 'Current pH',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5.4',
                        ],
                        [
                            'name' => 'ph_target',
                            'label' => 'Target pH',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6.5',
                        ],
                        [
                            'name' => 'texture',
                            'label' => 'Soil texture',
                            'type' => 'select',
                            'options' => [
                                'Sand' => '1',
                                'Sandy loam' => '0.6',
                                'Loam' => '0.4',
                                'Clay loam' => '0.25',
                                'Clay' => '0.18',
                            ],
                            'control' => 'SELECT',
                            'default' => 'Loam',
                        ],
                        [
                            'name' => 'buffer',
                            'label' => 'Buffer index',
                            'type' => 'number',
                            'help' => 'From a lime requirement test; lower means more lime',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6.4',
                        ],
                        [
                            'name' => 'rate',
                            'label' => 'Lime required',
                            'type' => 'number',
                            'suffix' => 't/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pure_caco3',
                            'label' => 'As pure CaCO₃ equivalent',
                            'type' => 'number',
                            'suffix' => 't/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'splits',
                            'label' => 'Application splits recommended',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ph_gain',
                            'label' => 'pH increase per tonne',
                            'type' => 'number',
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
            'title' => 'Lime',
            'results' => ['rate' => '(ph_target-ph_now)*buffer*texture', 'pure_caco3' => '(ph_target-ph_now)*buffer*texture*0.9', 'splits' => 'max(1,ceil((ph_target-ph_now)*buffer*texture/2))', 'ph_gain' => '(ph_target-ph_now)/((ph_target-ph_now)*buffer*texture)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Lime Requirement turns Current pH, Target pH and Soil texture into Lime required and As pure CaCO₃ equivalent. There is no hidden constant here: change Lime required and Current pH moves with it. The main result, Lime required, is reported in t/ha.
        TXT,
        'sections' => [
            ['title' => 'How the Lime Requirement calculator works', 'html' => <<<'TXT'
            <p>The Lime Requirement calculator applies one relationship to 4 numbers and reports Lime required, As pure CaCO₃ equivalent and Application splits recommended.</p><p>Written with the labels from the form, Lime required = (Target pH − Current pH) × Buffer index × Soil texture.</p><p>The result panel carries Lime required, As pure CaCO₃ equivalent, Application splits recommended and pH increase per tonne, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Current pH</strong> — a plain number, no unit</li><li><strong>Target pH</strong> — a plain number, no unit</li><li><strong>Soil texture</strong> — a plain number, no unit</li><li><strong>Buffer index</strong> — a plain number, no unit. From a lime requirement test; lower means more lime</li></ul><p>The answers come back as Lime required in t/ha, As pure CaCO₃ equivalent in t/ha, Application splits recommended, pH increase per tonne. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Current pH = 5.4, Target pH = 6.5, Soil texture = 0.4 and Buffer index = 6.4 — through the same formula and the panel reports &lt;strong&gt;Lime required&lt;/strong&gt; = 2.82 t/ha, &lt;strong&gt;As pure CaCO₃ equivalent&lt;/strong&gt; = 2.53 t/ha, &lt;strong&gt;Application splits recommended&lt;/strong&gt; = 2 and &lt;strong&gt;pH increase per tonne&lt;/strong&gt; = 0.3906.</p><ul><li><strong>Lime required</strong> = 2.82 t/ha</li><li><strong>As pure CaCO₃ equivalent</strong> = 2.53 t/ha</li><li><strong>Application splits recommended</strong> = 2</li><li><strong>pH increase per tonne</strong> = 0.3906</li></ul><p>That is <strong>Lime required</strong> = <code>(Target pH − Current pH) × Buffer index × Soil texture</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Lime required&lt;/strong&gt; = 2.82, &lt;strong&gt;As pure CaCO₃ equivalent&lt;/strong&gt; = 2.53, &lt;strong&gt;Application splits recommended&lt;/strong&gt; = 2 and &lt;strong&gt;pH increase per tonne&lt;/strong&gt; = 0.3906 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Lime required takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Lime required</strong> = <code>(Target pH − Current pH) × Buffer index × Soil texture</code></li><li><strong>As pure CaCO₃ equivalent</strong> = <code>(Target pH − Current pH) × Buffer index × Soil texture × 0.9</code></li><li><strong>Application splits recommended</strong> = <code>max(1,ceil((Target pH − Current pH) × Buffer index × Soil texture ÷ 2))</code></li><li><strong>pH increase per tonne</strong> = <code>(Target pH − Current pH) ÷ ((Target pH − Current pH) × Buffer index × Soil texture)</code></li></ul><p>Any one of Lime required, As pure CaCO₃ equivalent and Application splits recommended can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Current pH from 5.4 to 10.8, leaving every other box alone. The panel moves from &lt;strong&gt;Lime required&lt;/strong&gt; 2.82 t/ha, &lt;strong&gt;As pure CaCO₃ equivalent&lt;/strong&gt; 2.53 t/ha, &lt;strong&gt;Application splits recommended&lt;/strong&gt; 2 and &lt;strong&gt;pH increase per tonne&lt;/strong&gt; 0.3906 to &lt;strong&gt;Lime required&lt;/strong&gt; -11.01 t/ha, &lt;strong&gt;As pure CaCO₃ equivalent&lt;/strong&gt; -9.91 t/ha, &lt;strong&gt;Application splits recommended&lt;/strong&gt; 1 and &lt;strong&gt;pH increase per tonne&lt;/strong&gt; 0.3906.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Lime required, As pure CaCO₃ equivalent and Application splits recommended are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Current pH and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Current pH, Target pH and Soil texture measured, Lime required and As pure CaCO₃ equivalent wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/specimen-size-from-image">Actual Specimen Size from Image Calculator</a>, <a href="/biology/agarose-gel-calculator">Agarose Gel (gel percentage and loading) Calculator</a> and <a href="/biology/alamarblue-cell-viability">AlamarBlue Cell Viability / Percent Reduction Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Lime Requirement calculator work out?', 'a' => <<<'TXT'
            Lime required, As pure CaCO₃ equivalent, Application splits recommended and pH increase per tonne, from Target pH, Current pH, Buffer index and Soil texture. The relationship is Lime required = (Target pH − Current pH) × Buffer index × Soil texture.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Current pH, Target pH, Soil texture, Buffer index. Enter ph_now, ph_target and texture; Lime required is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Lime required, As pure CaCO₃ equivalent, Application splits recommended and pH increase per tonne blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Lime required = 2.82 t/ha, As pure CaCO₃ equivalent = 2.53 t/ha, Application splits recommended = 2 and pH increase per tonne = 0.3906. That comes from the page's own defaults, entered in Current pH; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Lime required is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Current pH left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Lime required at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/specimen-size-from-image', 'name' => 'Actual Specimen Size from Image Calculator'],
            ['path' => '/biology/agarose-gel-calculator', 'name' => 'Agarose Gel (gel percentage and loading) Calculator'],
            ['path' => '/biology/alamarblue-cell-viability', 'name' => 'AlamarBlue Cell Viability / Percent Reduction Calculator'],
        ],
        'authors' => [],
    ],
];
