<?php

/**
 * Aquarium Water Volume Calculator
 * /biology/aquarium-water-volume
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Aquarium Water Volume Calculator',
    'meta' => ['title' => 'Aquarium Water Volume Calculator — Formula & Results', 'description' => <<<'TXT'
    Aquarium Water Volume takes Shape, Length and Width or diameter and returns Gross volume and True water volume. There is no hidden constant here: change Gross…
    TXT, 'h1' => 'Aquarium Water Volume Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'shape',
                            'label' => 'Shape',
                            'type' => 'select',
                            'options' => ['Rectangular' => '1', 'Bow-front' => '0.85', 'Cylinder' => '0.785'],
                            'default' => 'Rectangular',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '90',
                        ],
                        [
                            'name' => 'width',
                            'label' => 'Width or diameter',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '45',
                        ],
                        [
                            'name' => 'height',
                            'label' => 'Water height',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '45',
                        ],
                        [
                            'name' => 'substrate',
                            'label' => 'Substrate depth',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Displaces water and must be subtracted',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'litres',
                            'label' => 'Gross volume',
                            'type' => 'number',
                            'suffix' => 'L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'net',
                            'label' => 'True water volume',
                            'type' => 'number',
                            'suffix' => 'L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gallons',
                            'label' => 'True volume',
                            'type' => 'number',
                            'suffix' => 'US gal',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'weight',
                            'label' => 'Weight of the water',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'turnover',
                            'label' => 'Filter turnover needed (5x per hour)',
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
            'title' => 'Tank',
            'results' => [
                'litres' => 'length*width*height*shape/1000',
                'net' => 'length*width*height*shape/1000-length*width*substrate/1000',
                'gallons' => '(length*width*height*shape/1000-length*width*substrate/1000)/3.785',
                'weight' => 'length*width*height*shape/1000-length*width*substrate/1000',
                'turnover' => '(length*width*height*shape/1000-length*width*substrate/1000)*5',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Aquarium Water Volume takes Shape, Length and Width or diameter and returns Gross volume and True water volume. There is no hidden constant here: change Gross volume and Shape moves with it. The main result, Gross volume, is reported in L.
        TXT,
        'sections' => [
            ['title' => 'How the Aquarium Water Volume calculator works', 'html' => <<<'TXT'
            <p>The Aquarium Water Volume calculator applies one relationship to 5 numbers and reports Gross volume, True water volume and True volume.</p><p>In the form&#039;s own words, Gross volume = Length × Width or diameter × Water height × Shape ÷ 1000.</p><p>The answers are Gross volume, True water volume, True volume and Weight of the water; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Shape</strong> — a plain number, no unit</li><li><strong>Length</strong> — in cm</li><li><strong>Width or diameter</strong> — in cm</li><li><strong>Water height</strong> — in cm</li><li><strong>Substrate depth</strong> — in cm. Displaces water and must be subtracted</li></ul><p>What you get back is Gross volume in L, True water volume in L, True volume in US gal, Weight of the water in kg, Filter turnover needed (5x per hour) in L/h, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Shape = 1, Length = 90 cm, Width or diameter = 45 cm, Water height = 45 cm and Substrate depth = 5 cm gives &lt;strong&gt;Gross volume&lt;/strong&gt; = 182 L, &lt;strong&gt;True water volume&lt;/strong&gt; = 162 L, &lt;strong&gt;True volume&lt;/strong&gt; = 42.8 US gal, &lt;strong&gt;Weight of the water&lt;/strong&gt; = 162 kg and &lt;strong&gt;Filter turnover needed (5x per hour)&lt;/strong&gt; = 810 L/h.</p><ul><li><strong>Gross volume</strong> = 182 L</li><li><strong>True water volume</strong> = 162 L</li><li><strong>True volume</strong> = 42.8 US gal</li><li><strong>Weight of the water</strong> = 162 kg</li><li><strong>Filter turnover needed (5x per hour)</strong> = 810 L/h</li></ul><p>That is <strong>Gross volume</strong> = <code>Length × Width or diameter × Water height × Shape ÷ 1000</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Gross volume&lt;/strong&gt; = 182, &lt;strong&gt;True water volume&lt;/strong&gt; = 162, &lt;strong&gt;True volume&lt;/strong&gt; = 42.8, &lt;strong&gt;Weight of the water&lt;/strong&gt; = 162 and &lt;strong&gt;Filter turnover needed (5x per hour)&lt;/strong&gt; = 810 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Gross volume takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Gross volume</strong> = <code>Length × Width or diameter × Water height × Shape ÷ 1000</code></li><li><strong>True water volume</strong> = <code>Length × Width or diameter × Water height × Shape ÷ 1000 − Length × Width or diameter × Substrate depth ÷ 1000</code></li><li><strong>True volume</strong> = <code>(Length × Width or diameter × Water height × Shape ÷ 1000 − Length × Width or diameter × Substrate depth ÷ 1000) ÷ 3.785</code></li><li><strong>Weight of the water</strong> = <code>Length × Width or diameter × Water height × Shape ÷ 1000 − Length × Width or diameter × Substrate depth ÷ 1000</code></li><li><strong>Filter turnover needed (5x per hour)</strong> = <code>(Length × Width or diameter × Water height × Shape ÷ 1000 − Length × Width or diameter × Substrate depth ÷ 1000) × 5</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Gross volume, True water volume and True volume can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Shape from 1 to 2, leaving every other box alone. The panel moves from &lt;strong&gt;Gross volume&lt;/strong&gt; 182 L, &lt;strong&gt;True water volume&lt;/strong&gt; 162 L, &lt;strong&gt;True volume&lt;/strong&gt; 42.8 US gal, &lt;strong&gt;Weight of the water&lt;/strong&gt; 162 kg and &lt;strong&gt;Filter turnover needed (5x per hour)&lt;/strong&gt; 810 L/h to &lt;strong&gt;Gross volume&lt;/strong&gt; 365 L, &lt;strong&gt;True water volume&lt;/strong&gt; 344 L, &lt;strong&gt;True volume&lt;/strong&gt; 90.95 US gal, &lt;strong&gt;Weight of the water&lt;/strong&gt; 344 kg and &lt;strong&gt;Filter turnover needed (5x per hour)&lt;/strong&gt; 1721 L/h.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Gross volume, True water volume and True volume are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Shape and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Shape, Length and Width or diameter is what you already know and Gross volume and True water volume is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/annealing-temperature">Annealing temperature Calculator</a>, <a href="/biology/atp-cellular-respiration-energy-yield">ATP / Cellular Respiration Energy Yield Calculator</a> and <a href="/biology/autosomal-dominant-pedigree">Autosomal Dominant Pedigree Analyzer Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Aquarium Water Volume calculator work out?', 'a' => <<<'TXT'
            Gross volume, True water volume, True volume and Weight of the water, from Length, Width or diameter, Water height and Shape. The relationship is Gross volume = Length × Width or diameter × Water height × Shape ÷ 1000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Shape, Length (cm), Width or diameter (cm), Water height (cm), Substrate depth (cm). With shape, length and width in place, Gross volume can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Gross volume, True water volume, True volume and Weight of the water can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Gross volume = 182 L, True water volume = 162 L, True volume = 42.8 US gal, Weight of the water = 162 kg and Filter turnover needed (5x per hour) = 810 L/h. Those are the defaults written into the form — move Shape and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Gross volume is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Shape blank and the page solves for it, reporting Gross volume instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Gross volume keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/annealing-temperature', 'name' => 'Annealing temperature Calculator'],
            ['path' => '/biology/atp-cellular-respiration-energy-yield', 'name' => 'ATP / Cellular Respiration Energy Yield Calculator'],
            ['path' => '/biology/autosomal-dominant-pedigree', 'name' => 'Autosomal Dominant Pedigree Analyzer Calculator'],
        ],
        'authors' => [],
    ],
];
