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
    'meta' => ['title' => 'Stomatal Density Calculator — Formula & Results', 'description' => 'Stomatal density is the number of stomata per square millimetre of leaf surface — the structural limit on how fast a leaf can take up carbon dioxide.', 'h1' => 'Stomatal Density Calculator', 'updated' => '2026-10-29'],
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
        Stomatal density is the number of stomata per square millimetre of leaf surface — the structural limit on how fast a leaf can take up carbon dioxide. It returns area sampled, stomatal density, stomatal density and pore index, and the panel shows all of them at once.
        
        This calculator converts a count in a microscope field into density per mm² and per cm².
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Stomatal Density', 'html' => <<<'TXT'
            <p>Density = stomata ÷ (fields × π × (diameter/2)²)</p>
            <figure class="calc-figure"><img src="/uploads/biology/stomatal-density.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Stomatal Density Calculator — A counted field, scaled to a square millimetre." title="Stomatal Density Calculator"><figcaption>A counted field, scaled to a square millimetre.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>stomata</code></td><td>stomata counted across all fields</td><td>stomata</td></tr><tr><td><code>fields</code></td><td>number of microscope fields</td><td>fields</td></tr><tr><td><code>diameter</code></td><td>field-of-view diameter at that magnification</td><td>mm</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Stomatal Density?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: stomata counted of <strong>46</strong> stomata, fields counted of <strong>5</strong>, field of view diameter of <strong>2.2</strong> mm, stomatal pore index (optional) of <strong>0.0021</strong> mm².</p>
            <p>Substituting them into the formula gives area sampled of <strong>19.01</strong> mm², stomatal density of <strong>2.42</strong> per mm², stomatal density of <strong>242.02</strong> per cm², pore index of <strong>0.0051</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>below 100 per mm²</td><td><strong>Low</strong></td><td>thick-leaved, shade or water-limited species</td></tr><tr><td>100 – 300</td><td><strong>Typical</strong></td><td>most mesophytic crop and wild species</td></tr><tr><td>above 400</td><td><strong>High</strong></td><td>sun-adapted grasses and fast-growing herbs</td></tr></tbody></table>
            <ul><li><p>Count on the abaxial (lower) surface of a dicot leaf and either surface of a grass; the two surfaces differ by a factor of two or more.</p></li><li><p>Stomatal density falls with rising atmospheric CO₂ and rises with growth temperature and light — which is why fossil leaves are used as palaeoclimate proxies.</p></li><li><p>Density is not conductance: guard-cell aperture and behaviour matter as much as count.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Forgetting to convert the field diameter from micrometres.</li><li>Counting only the top surface of a leaf whose stomata are mostly underneath.</li><li>Using a nail-varnish peel without noting which surface it came from.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I calculate stomatal density?', 'a' => 'Divide the number of stomata by the area of the field(s) they were counted in.'],
            ['q' => 'What is the stomatal ratio?', 'a' => 'Density on the upper surface divided by density on the lower, about 0 for most trees and about 1 for grasses.'],
            ['q' => 'What does the Stomatal Density actually calculate?', 'a' => <<<'TXT'
            It returns area sampled, stomatal density, stomatal density and pore index. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
            ['q' => 'Can I use it with the numbers straight from a datasheet?', 'a' => 'Yes. Every box states its unit, and nothing is converted behind your back, so a figure copied from a datasheet, a kit insert or a protocol goes in as printed.'],
        ],
        'related' => [],
    ],
];
