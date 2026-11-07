<?php

/**
 * Stomatal Density Calculator
 * /biology/stomatal-density
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Stomatal Density Calculator',
    'meta' => ['title' => 'Stomatal Density Calculator — Formula & Results', 'description' => 'Stomatal Density works out Stomatal density and Stomatal density from Stomata counted, Fields counted and Field of view diameter. Stomatal density is opened…', 'h1' => 'Stomatal Density Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'stomata',
                            'label' => 'Stomata counted',
                            'type' => 'number',
                            'suffix' => 'stomata',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '46',
                        ],
                        [
                            'name' => 'fields',
                            'label' => 'Fields counted',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'diameter',
                            'label' => 'Field of view diameter',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'help' => 'From the microscope magnification',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2.2',
                        ],
                        [
                            'name' => 'spi',
                            'label' => 'Stomatal pore index (optional)',
                            'type' => 'number',
                            'suffix' => 'mm²',
                            'help' => 'Mean pore area × density',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.0021',
                        ],
                        [
                            'name' => 'density',
                            'label' => 'Stomatal density',
                            'type' => 'number',
                            'suffix' => 'per mm²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_cm2',
                            'label' => 'Stomatal density',
                            'type' => 'number',
                            'suffix' => 'per cm²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'area',
                            'label' => 'Area sampled',
                            'type' => 'number',
                            'suffix' => 'mm²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'index',
                            'label' => 'Pore index',
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
            'title' => 'Density',
            'results' => ['area' => 'fields*3.14159265358979*pow(diameter/2,2)', 'density' => 'stomata/(fields*3.14159265358979*pow(diameter/2,2))', 'per_cm2' => 'stomata/(fields*3.14159265358979*pow(diameter/2,2))*100', 'index' => 'stomata/(fields*3.14159265358979*pow(diameter/2,2))*spi'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Stomatal Density works out Stomatal density and Stomatal density from Stomata counted, Fields counted and Field of view diameter. Nothing is looked up on this page: Stomatal density is computed from Stomata counted and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Stomatal density is opened in per mm²; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Stomatal Density calculator works', 'html' => <<<'TXT'
            <p>Stomatal Density answers one question from 4 numbers, and the answer is Stomatal density, Stomatal density and Area sampled.</p><p>Written with the labels from the form, Area sampled = Fields counted × 3.14159265358979 × (Field of view diameter ÷ 2)^(2).</p><p>The result panel carries Stomatal density, Stomatal density, Area sampled and Pore index, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Stomata counted</strong> — in stomata</li><li><strong>Fields counted</strong> — a plain number, no unit</li><li><strong>Field of view diameter</strong> — in mm. From the microscope magnification</li><li><strong>Stomatal pore index (optional)</strong> — in mm². Mean pore area × density</li></ul><p>The answers come back as Stomatal density in per mm², Stomatal density in per cm², Area sampled in mm², Pore index. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Stomata counted = 46 stomata, Fields counted = 5, Field of view diameter = 2.2 mm and Stomatal pore index (optional) = 0.0021 mm²; the answers are &lt;strong&gt;Area sampled&lt;/strong&gt; = 19.01 mm², &lt;strong&gt;Stomatal density&lt;/strong&gt; = 2.42 per mm², &lt;strong&gt;Stomatal density&lt;/strong&gt; = 242 per cm² and &lt;strong&gt;Pore index&lt;/strong&gt; = 0.0051.</p><ul><li><strong>Area sampled</strong> = 19.01 mm²</li><li><strong>Stomatal density</strong> = 2.42 per mm²</li><li><strong>Stomatal density</strong> = 242 per cm²</li><li><strong>Pore index</strong> = 0.0051</li></ul><p>That is <strong>Area sampled</strong> = <code>Fields counted × 3.14159265358979 × (Field of view diameter ÷ 2)^(2)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Area sampled&lt;/strong&gt; = 19.01, &lt;strong&gt;Stomatal density&lt;/strong&gt; = 2.42, &lt;strong&gt;Stomatal density&lt;/strong&gt; = 242 and &lt;strong&gt;Pore index&lt;/strong&gt; = 0.0051. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Stomatal density is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Area sampled</strong> = <code>Fields counted × 3.14159265358979 × (Field of view diameter ÷ 2)^(2)</code></li><li><strong>Stomatal density</strong> = <code>Stomata counted ÷ (Fields counted × 3.14159265358979 × (Field of view diameter ÷ 2)^(2))</code></li><li><strong>Pore index</strong> = <code>Stomata counted ÷ (Fields counted × 3.14159265358979 × (Field of view diameter ÷ 2)^(2)) × Stomatal pore index (optional)</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Area sampled, Stomatal density and Stomatal density can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Stomata counted, from 46 to 92 — and the answers go from &lt;strong&gt;Area sampled&lt;/strong&gt; 19.01 mm², &lt;strong&gt;Stomatal density&lt;/strong&gt; 2.42 per mm², &lt;strong&gt;Stomatal density&lt;/strong&gt; 242 per cm² and &lt;strong&gt;Pore index&lt;/strong&gt; 0.0051 to &lt;strong&gt;Area sampled&lt;/strong&gt; 19.01 mm², &lt;strong&gt;Stomatal density&lt;/strong&gt; 4.84 per mm², &lt;strong&gt;Stomatal density&lt;/strong&gt; 484 per cm² and &lt;strong&gt;Pore index&lt;/strong&gt; 0.0102.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Stomatal density, Stomatal density and Area sampled are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Stomata counted is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Stomata counted, Fields counted and Field of view diameter is what you already know and Stomatal density and Stomatal density is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/dog-crate-size">Dog crate size</a>, <a href="/biology/dog-food">Dog food Calculator</a> and <a href="/biology/dog-harness-size">Dog harness size</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Stomatal Density calculator work out?', 'a' => <<<'TXT'
            Stomatal density, Stomatal density, Area sampled and Pore index, from Fields counted and Field of view diameter. The relationship is Area sampled = Fields counted × 3.14159265358979 × (Field of view diameter ÷ 2)^(2).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Stomata counted (stomata), Fields counted, Field of view diameter (mm), Stomatal pore index (optional) (mm²). Fill stomata, fields and diameter and leave Stomatal density empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Area sampled, Stomatal density, Stomatal density and Pore index can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Area sampled = 19.01 mm², Stomatal density = 2.42 per mm², Stomatal density = 242 per cm² and Pore index = 0.0051. The figures come from Stomata counted as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Stomatal density is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Stomata counted blank and the page solves for it, reporting Stomatal density instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Stomatal density keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dog-crate-size', 'name' => 'Dog crate size'],
            ['path' => '/biology/dog-food', 'name' => 'Dog food Calculator'],
            ['path' => '/biology/dog-harness-size', 'name' => 'Dog harness size'],
        ],
        'authors' => [],
    ],
];
