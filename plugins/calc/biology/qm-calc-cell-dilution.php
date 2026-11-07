<?php

/**
 * Cell dilution
 * /biology/cell-dilution
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cell dilution',
    'meta' => ['title' => 'Cell dilution Calculator — Formula & Results', 'description' => 'Cell dilution: Enter Initial concentration, Final concentration and Final volume into Cell dilution and the answer comes back as Volume for suspension.', 'h1' => 'Cell dilution Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'concentrationInitial',
                            'label' => 'Initial concentration',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'suspensionVolume',
                            'label' => 'Volume for suspension',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'concentrationFinal',
                            'label' => 'Final concentration',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'volumeFinal',
                            'label' => 'Final volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'concentrationInitial*suspensionVolume=concentrationFinal*volumeFinal',
            'results' => ['suspensionVolume' => 'concentrationFinal*volumeFinal/concentrationInitial', 'concentrationInitial' => 'concentrationFinal*volumeFinal/suspensionVolume', 'volumeFinal' => 'concentrationInitial*suspensionVolume/concentrationFinal', 'concentrationFinal' => 'concentrationInitial*suspensionVolume/volumeFinal'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Initial concentration, Final concentration and Final volume into Cell dilution and the answer comes back as Volume for suspension. Nothing is looked up on this page: Volume for suspension is computed from Initial concentration and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Volume for suspension is opened in milliliters; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Cell dilution calculator works', 'html' => <<<'TXT'
            <p>The Cell dilution calculator applies one relationship to 3 numbers and reports Volume for suspension.</p><p>In the form&#039;s own words, Volume for suspension = Final concentration × Final volume ÷ Initial concentration.</p><p>The result panel carries Volume for suspension, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Initial concentration</strong> — in milliliters</li><li><strong>Final concentration</strong> — in milliliters</li><li><strong>Final volume</strong> — in milliliters</li></ul><p>The result box is Volume for suspension in milliliters. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Initial concentration = 10 ml, Final concentration = 100 ml and Final volume = 1000 ml; the answers are &lt;strong&gt;Volume for suspension&lt;/strong&gt; = 10000 ml.</p><ul><li><strong>Volume for suspension</strong> = 10000 ml</li></ul><p>That is <strong>Volume for suspension</strong> = <code>Final concentration × Final volume ÷ Initial concentration</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Volume for suspension&lt;/strong&gt; = 10000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Volume for suspension lists 40 options and opens on milliliters. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Volume for suspension</strong> = <code>Final concentration × Final volume ÷ Initial concentration</code></li><li><strong>Initial concentration</strong> = <code>Final concentration × Final volume ÷ Volume for suspension</code></li><li><strong>Final volume</strong> = <code>Initial concentration × Volume for suspension ÷ Final concentration</code></li><li><strong>Final concentration</strong> = <code>Initial concentration × Volume for suspension ÷ Final volume</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Volume for suspension, Initial concentration and Final volume can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Initial concentration, from 10 to 20 — and the answers go from &lt;strong&gt;Volume for suspension&lt;/strong&gt; 10000 ml to &lt;strong&gt;Volume for suspension&lt;/strong&gt; 5000 ml.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Initial concentration, Final concentration and Final volume carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Volume for suspension is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Initial concentration and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Initial concentration, Final concentration and Final volume and the number you are missing is Volume for suspension.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/medullary-index">Medullary Index Calculator</a>, <a href="/biology/metacam-dosage-cat">Metacam dosage for cats</a> and <a href="/biology/mic-zone-of-inhibition">MIC and Zone of Inhibition Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cell dilution calculator work out?', 'a' => <<<'TXT'
            Volume for suspension, from Final concentration, Final volume and Initial concentration. The relationship is Volume for suspension = Final concentration × Final volume ÷ Initial concentration.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial concentration (milliliters), Final concentration (milliliters), Final volume (milliliters). Fill concentrationInitial, concentrationFinal and volumeFinal and leave Volume for suspension empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Volume for suspension, Initial concentration, Final volume and Final concentration can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Volume for suspension = 10000 ml. That comes from the page\'s own defaults, entered in Initial concentration; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Volume for suspension is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Initial concentration left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Volume for suspension keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/medullary-index', 'name' => 'Medullary Index Calculator'],
            ['path' => '/biology/metacam-dosage-cat', 'name' => 'Metacam dosage for cats'],
            ['path' => '/biology/mic-zone-of-inhibition', 'name' => 'MIC and Zone of Inhibition Calculator'],
        ],
        'authors' => [],
    ],
];
