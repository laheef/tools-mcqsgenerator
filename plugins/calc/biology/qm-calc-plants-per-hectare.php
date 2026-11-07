<?php

/**
 * Plants Per Hectare Calculator
 * /biology/plants-per-hectare
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Plants Per Hectare Calculator',
    'meta' => ['title' => 'Plants Per Hectare Calculator — Formula & Results', 'description' => <<<'TXT'
    Plants Per Hectare works out Plants needed and Plants per hectare from Area to plant, Row spacing and In-row spacing. Distance between plants in a rowExpected…
    TXT, 'h1' => 'Plants Per Hectare Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Area to plant',
                            'type' => 'number',
                            'suffix' => 'ha',
                            'help' => '1 hectare = 10 000 m²',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'row_cm',
                            'label' => 'Row spacing',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Distance between rows',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '75',
                        ],
                        [
                            'name' => 'plant_cm',
                            'label' => 'In-row spacing',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Distance between plants in a row',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                        [
                            'name' => 'loss_pct',
                            'label' => 'Expected losses',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Germination gaps, pest damage, headlands',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'plants',
                            'label' => 'Plants needed',
                            'type' => 'number',
                            'help' => 'After losses',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'plants_per_ha',
                            'label' => 'Plants per hectare',
                            'type' => 'number',
                            'suffix' => '/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'area_per_plant',
                            'label' => 'Space per plant',
                            'type' => 'number',
                            'suffix' => 'm²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'seedlings',
                            'label' => 'Seedlings to buy',
                            'type' => 'number',
                            'help' => 'Plants plus losses, rounded up',
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
            'title' => 'Density',
            'results' => ['area_per_plant' => 'row_cm*plant_cm/10000', 'plants_per_ha' => '10000/(row_cm*plant_cm/10000)', 'plants' => 'area*10000/(row_cm*plant_cm/10000)*(1+loss_pct/100)', 'seedlings' => 'round(area*10000/(row_cm*plant_cm/10000)*(1+loss_pct/100))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Plants Per Hectare works out Plants needed and Plants per hectare from Area to plant, Row spacing and In-row spacing. Nothing is looked up on this page: Plants needed is computed from Area to plant and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Plants Per Hectare calculator works', 'html' => <<<'TXT'
            <p>Plants Per Hectare answers one question from 4 numbers, and the answer is Plants needed, Plants per hectare and Space per plant.</p><p>The relationship it solves reads Space per plant = Row spacing × In-row spacing ÷ 10000.</p><p>The result panel carries Plants needed, Plants per hectare, Space per plant and Seedlings to buy, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Area to plant</strong> — in ha. 1 hectare = 10 000 m²</li><li><strong>Row spacing</strong> — in cm. Distance between rows</li><li><strong>In-row spacing</strong> — in cm. Distance between plants in a row</li><li><strong>Expected losses</strong> — in %. Germination gaps, pest damage, headlands</li></ul><p>The result boxes are Plants needed, Plants per hectare in /ha, Space per plant in m², Seedlings to buy; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Area to plant = 1 ha, Row spacing = 75 cm, In-row spacing = 30 cm and Expected losses = 5 %; the answers are &lt;strong&gt;Space per plant&lt;/strong&gt; = 0.225 m², &lt;strong&gt;Plants per hectare&lt;/strong&gt; = 44444 /ha, &lt;strong&gt;Plants needed&lt;/strong&gt; = 46667 and &lt;strong&gt;Seedlings to buy&lt;/strong&gt; = 46667.</p><ul><li><strong>Space per plant</strong> = 0.225 m²</li><li><strong>Plants per hectare</strong> = 44444 /ha</li><li><strong>Plants needed</strong> = 46667</li><li><strong>Seedlings to buy</strong> = 46667</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Space per plant</strong> = <code>Row spacing × In-row spacing ÷ 10000</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Space per plant&lt;/strong&gt; = 0.225, &lt;strong&gt;Plants per hectare&lt;/strong&gt; = 44444, &lt;strong&gt;Plants needed&lt;/strong&gt; = 46667 and &lt;strong&gt;Seedlings to buy&lt;/strong&gt; = 46667. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Plants needed is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Space per plant</strong> = <code>Row spacing × In-row spacing ÷ 10000</code></li><li><strong>Plants per hectare</strong> = <code>10000 ÷ (Row spacing × In-row spacing ÷ 10000)</code></li><li><strong>Plants needed</strong> = <code>Area to plant × 10000 ÷ (Row spacing × In-row spacing ÷ 10000) × (1 + Expected losses ÷ 100)</code></li><li><strong>Seedlings to buy</strong> = <code>round(Area to plant × 10000 ÷ (Row spacing × In-row spacing ÷ 10000) × (1 + Expected losses ÷ 100))</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Space per plant, Plants per hectare and Plants needed can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Area to plant, from 1 to 2 — and the answers go from &lt;strong&gt;Space per plant&lt;/strong&gt; 0.225 m², &lt;strong&gt;Plants per hectare&lt;/strong&gt; 44444 /ha, &lt;strong&gt;Plants needed&lt;/strong&gt; 46667 and &lt;strong&gt;Seedlings to buy&lt;/strong&gt; 46667 to &lt;strong&gt;Space per plant&lt;/strong&gt; 0.225 m², &lt;strong&gt;Plants per hectare&lt;/strong&gt; 44444 /ha, &lt;strong&gt;Plants needed&lt;/strong&gt; 93333 and &lt;strong&gt;Seedlings to buy&lt;/strong&gt; 93333.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Plants needed, Plants per hectare and Space per plant are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Area to plant and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Area to plant, Row spacing and In-row spacing and the number you are missing is Plants needed and Plants per hectare.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/rabbit-gestation">Rabbit gestation Calculator</a>, <a href="/biology/raised-bed-soil">Raised bed soil Calculator</a> and <a href="/biology/random-sequence-generator">Random Sequence Generator Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Plants Per Hectare calculator work out?', 'a' => <<<'TXT'
            Plants needed, Plants per hectare, Space per plant and Seedlings to buy, from Row spacing and In-row spacing. The relationship is Space per plant = Row spacing × In-row spacing ÷ 10000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Area to plant (ha), Row spacing (cm), In-row spacing (cm), Expected losses (%). With area, row_cm and plant_cm in place, Plants needed can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Space per plant, Plants per hectare, Plants needed and Seedlings to buy can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Space per plant = 0.225 m², Plants per hectare = 44444 /ha, Plants needed = 46667 and Seedlings to buy = 46667. That comes from the page's own defaults, entered in Area to plant; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Plants needed is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Area to plant blank and the page solves for it, reporting Plants needed instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Plants needed at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/rabbit-gestation', 'name' => 'Rabbit gestation Calculator'],
            ['path' => '/biology/raised-bed-soil', 'name' => 'Raised bed soil Calculator'],
            ['path' => '/biology/random-sequence-generator', 'name' => 'Random Sequence Generator Calculator'],
        ],
        'authors' => [],
    ],
];
