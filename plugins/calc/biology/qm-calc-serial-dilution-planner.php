<?php

/**
 * Serial Dilution Planner
 * /biology/serial-dilution-planner
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Serial Dilution Planner',
    'meta' => ['title' => 'Serial Dilution Planner — Formula & Results', 'description' => 'Serial Dilution Planner turns Starting concentration, Dilution factor per step and Number of steps into Transfer volume and Diluent per tube.', 'h1' => 'Serial Dilution Planner', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'stock',
                            'label' => 'Starting concentration',
                            'type' => 'number',
                            'help' => 'Any unit — mg/mL, µM, CFU/mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'factor',
                            'label' => 'Dilution factor per step',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '10 for a tenfold series',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'steps',
                            'label' => 'Number of steps',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                        [
                            'name' => 'tube_vol',
                            'label' => 'Volume in each tube',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'transfer',
                            'label' => 'Transfer volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'diluent',
                            'label' => 'Diluent per tube',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'final',
                            'label' => 'Final concentration',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_diluent',
                            'label' => 'Diluent needed in total',
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
            'title' => 'Series',
            'results' => ['transfer' => 'tube_vol/factor', 'diluent' => 'tube_vol-tube_vol/factor', 'final' => 'stock/pow(factor,steps)', 'total_diluent' => '(tube_vol-tube_vol/factor)*steps'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Serial Dilution Planner turns Starting concentration, Dilution factor per step and Number of steps into Transfer volume and Diluent per tube. There is no hidden constant here: change Transfer volume and Starting concentration moves with it. The main result, Transfer volume, is reported in µL.
        TXT,
        'sections' => [
            ['title' => 'How the Serial Dilution Planner calculator works', 'html' => <<<'TXT'
            <p>Serial Dilution Planner answers one question from 4 numbers, and the answer is Transfer volume, Diluent per tube and Final concentration.</p><p>The relationship it solves reads Transfer volume = Volume in each tube ÷ Dilution factor per step.</p><p>What comes back is Transfer volume, Diluent per tube, Final concentration and Diluent needed in total — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Starting concentration</strong> — a plain number, no unit. Any unit — mg/mL, µM, CFU/mL</li><li><strong>Dilution factor per step</strong> — in ×. 10 for a tenfold series</li><li><strong>Number of steps</strong> — a plain number, no unit</li><li><strong>Volume in each tube</strong> — in µL</li></ul><p>The result boxes are Transfer volume in µL, Diluent per tube in µL, Final concentration, Diluent needed in total in µL; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Starting concentration = 1000, Dilution factor per step = 10 ×, Number of steps = 6 and Volume in each tube = 1000 µL; the answers are &lt;strong&gt;Transfer volume&lt;/strong&gt; = 100 µL, &lt;strong&gt;Diluent per tube&lt;/strong&gt; = 900 µL, &lt;strong&gt;Final concentration&lt;/strong&gt; = 0.001 and &lt;strong&gt;Diluent needed in total&lt;/strong&gt; = 5400 µL.</p><ul><li><strong>Transfer volume</strong> = 100 µL</li><li><strong>Diluent per tube</strong> = 900 µL</li><li><strong>Final concentration</strong> = 0.001</li><li><strong>Diluent needed in total</strong> = 5400 µL</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Transfer volume</strong> = <code>Volume in each tube ÷ Dilution factor per step</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Transfer volume&lt;/strong&gt; = 100, &lt;strong&gt;Diluent per tube&lt;/strong&gt; = 900, &lt;strong&gt;Final concentration&lt;/strong&gt; = 0.001 and &lt;strong&gt;Diluent needed in total&lt;/strong&gt; = 5400 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Transfer volume takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Transfer volume</strong> = <code>Volume in each tube ÷ Dilution factor per step</code></li><li><strong>Diluent per tube</strong> = <code>Volume in each tube − Volume in each tube ÷ Dilution factor per step</code></li><li><strong>Final concentration</strong> = <code>Starting concentration ÷ (Dilution factor per step)^(Number of steps)</code></li><li><strong>Diluent needed in total</strong> = <code>(Volume in each tube − Volume in each tube ÷ Dilution factor per step) × Number of steps</code></li></ul><p>Any one of Transfer volume, Diluent per tube and Final concentration can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Starting concentration from 1000 to 2000, leaving every other box alone. The panel moves from &lt;strong&gt;Transfer volume&lt;/strong&gt; 100 µL, &lt;strong&gt;Diluent per tube&lt;/strong&gt; 900 µL, &lt;strong&gt;Final concentration&lt;/strong&gt; 0.001 and &lt;strong&gt;Diluent needed in total&lt;/strong&gt; 5400 µL to &lt;strong&gt;Transfer volume&lt;/strong&gt; 100 µL, &lt;strong&gt;Diluent per tube&lt;/strong&gt; 900 µL, &lt;strong&gt;Final concentration&lt;/strong&gt; 0.002 and &lt;strong&gt;Diluent needed in total&lt;/strong&gt; 5400 µL.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Transfer volume, Diluent per tube and Final concentration are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Starting concentration to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Starting concentration, Dilution factor per step and Number of steps measured, Transfer volume and Diluent per tube wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/dog-coat-color">Dog Coat Colour Calculator</a>, <a href="/biology/dog-crate-size">Dog crate size</a> and <a href="/biology/dog-food">Dog food Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Serial Dilution Planner calculator work out?', 'a' => <<<'TXT'
            Transfer volume, Diluent per tube, Final concentration and Diluent needed in total, from Volume in each tube and Dilution factor per step. The relationship is Transfer volume = Volume in each tube ÷ Dilution factor per step.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Starting concentration, Dilution factor per step (×), Number of steps, Volume in each tube (µL). With stock, factor and steps in place, Transfer volume can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Transfer volume, Diluent per tube, Final concentration and Diluent needed in total blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Transfer volume = 100 µL, Diluent per tube = 900 µL, Final concentration = 0.001 and Diluent needed in total = 5400 µL. That comes from the page's own defaults, entered in Starting concentration; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Transfer volume is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Starting concentration blank and the page solves for it, reporting Transfer volume instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Transfer volume keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dog-coat-color', 'name' => 'Dog Coat Colour Calculator'],
            ['path' => '/biology/dog-crate-size', 'name' => 'Dog crate size'],
            ['path' => '/biology/dog-food', 'name' => 'Dog food Calculator'],
        ],
        'authors' => [],
    ],
];
