<?php

/**
 * Field Capacity Calculator
 * /biology/field-capacity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Field Capacity Calculator',
    'meta' => ['title' => 'Field Capacity Calculator — Formula & Results', 'description' => 'Enter Wet soil mass, Oven-dry soil mass and Core volume into Field Capacity and the answer comes back as Field capacity (gravimetric) and Field capacity…', 'h1' => 'Field Capacity Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'wet',
                            'label' => 'Wet soil mass',
                            'type' => 'number',
                            'suffix' => 'g',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '620',
                        ],
                        [
                            'name' => 'dry',
                            'label' => 'Oven-dry soil mass',
                            'type' => 'number',
                            'suffix' => 'g',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '500',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Core volume',
                            'type' => 'number',
                            'suffix' => 'cm³',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '300',
                        ],
                        [
                            'name' => 'fc',
                            'label' => 'Field capacity (gravimetric)',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'vol',
                            'label' => 'Field capacity (volumetric)',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bulk',
                            'label' => 'Bulk density',
                            'type' => 'number',
                            'suffix' => 'g/cm³',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'water',
                            'label' => 'Water stored in the root zone',
                            'type' => 'number',
                            'suffix' => 'mm',
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
            'title' => 'Soil water',
            'results' => ['fc' => '(wet-dry)/dry*100', 'vol' => '(wet-dry)/volume*100', 'bulk' => 'dry/volume', 'water' => '(wet-dry)/volume*100*600/100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Wet soil mass, Oven-dry soil mass and Core volume into Field Capacity and the answer comes back as Field capacity (gravimetric) and Field capacity (volumetric). It is a single relationship that reads Field capacity (gravimetric) out of Wet soil mass, not a table of canned results keyed by them. Units for Field capacity (gravimetric) default to % and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Field Capacity calculator works', 'html' => <<<'TXT'
            <p>The Field Capacity calculator applies one relationship to 3 numbers and reports Field capacity (gravimetric), Field capacity (volumetric) and Bulk density.</p><p>The relationship it solves reads Field capacity (gravimetric) = (Wet soil mass − Oven-dry soil mass) ÷ Oven-dry soil mass × 100.</p><p>The result panel carries Field capacity (gravimetric), Field capacity (volumetric), Bulk density and Water stored in the root zone, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Wet soil mass</strong> — in g</li><li><strong>Oven-dry soil mass</strong> — in g</li><li><strong>Core volume</strong> — in cm³</li></ul><p>The answers come back as Field capacity (gravimetric) in %, Field capacity (volumetric) in %, Bulk density in g/cm³, Water stored in the root zone in mm. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Wet soil mass = 620 g, Oven-dry soil mass = 500 g and Core volume = 300 cm³ — through the same formula and the panel reports &lt;strong&gt;Field capacity (gravimetric)&lt;/strong&gt; = 24 %, &lt;strong&gt;Field capacity (volumetric)&lt;/strong&gt; = 40 %, &lt;strong&gt;Bulk density&lt;/strong&gt; = 1.67 g/cm³ and &lt;strong&gt;Water stored in the root zone&lt;/strong&gt; = 240 mm.</p><ul><li><strong>Field capacity (gravimetric)</strong> = 24 %</li><li><strong>Field capacity (volumetric)</strong> = 40 %</li><li><strong>Bulk density</strong> = 1.67 g/cm³</li><li><strong>Water stored in the root zone</strong> = 240 mm</li></ul><p>The line behind those figures is <strong>Field capacity (gravimetric)</strong> = <code>(Wet soil mass − Oven-dry soil mass) ÷ Oven-dry soil mass × 100</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Field capacity (gravimetric)&lt;/strong&gt; = 24, &lt;strong&gt;Field capacity (volumetric)&lt;/strong&gt; = 40, &lt;strong&gt;Bulk density&lt;/strong&gt; = 1.67 and &lt;strong&gt;Water stored in the root zone&lt;/strong&gt; = 240. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Field capacity (gravimetric) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Field capacity (gravimetric)</strong> = <code>(Wet soil mass − Oven-dry soil mass) ÷ Oven-dry soil mass × 100</code></li><li><strong>Field capacity (volumetric)</strong> = <code>(Wet soil mass − Oven-dry soil mass) ÷ Core volume × 100</code></li><li><strong>Bulk density</strong> = <code>Oven-dry soil mass ÷ Core volume</code></li><li><strong>Water stored in the root zone</strong> = <code>(Wet soil mass − Oven-dry soil mass) ÷ Core volume × 100 × 600 ÷ 100</code></li></ul><p>Any one of Field capacity (gravimetric), Field capacity (volumetric) and Bulk density can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Wet soil mass from 620 to 1240, leaving every other box alone. The panel moves from &lt;strong&gt;Field capacity (gravimetric)&lt;/strong&gt; 24 %, &lt;strong&gt;Field capacity (volumetric)&lt;/strong&gt; 40 %, &lt;strong&gt;Bulk density&lt;/strong&gt; 1.67 g/cm³ and &lt;strong&gt;Water stored in the root zone&lt;/strong&gt; 240 mm to &lt;strong&gt;Field capacity (gravimetric)&lt;/strong&gt; 148 %, &lt;strong&gt;Field capacity (volumetric)&lt;/strong&gt; 247 %, &lt;strong&gt;Bulk density&lt;/strong&gt; 1.67 g/cm³ and &lt;strong&gt;Water stored in the root zone&lt;/strong&gt; 1480 mm.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Field capacity (gravimetric), Field capacity (volumetric) and Bulk density are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Wet soil mass is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Wet soil mass, Oven-dry soil mass and Core volume measured, Field capacity (gravimetric) and Field capacity (volumetric) wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/catculator">Catculator</a>, <a href="/biology/cattle-per-acre">Cattle per acre Calculator</a> and <a href="/biology/cell-counting-calculator">Cell Counting Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Field Capacity calculator work out?', 'a' => <<<'TXT'
            Field capacity (gravimetric), Field capacity (volumetric), Bulk density and Water stored in the root zone, from Wet soil mass and Oven-dry soil mass. The relationship is Field capacity (gravimetric) = (Wet soil mass − Oven-dry soil mass) ÷ Oven-dry soil mass × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Wet soil mass (g), Oven-dry soil mass (g), Core volume (cm³). With wet, dry and volume in place, Field capacity (gravimetric) can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Field capacity (gravimetric), Field capacity (volumetric), Bulk density and Water stored in the root zone blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Field capacity (gravimetric) = 24 %, Field capacity (volumetric) = 40 %, Bulk density = 1.67 g/cm³ and Water stored in the root zone = 240 mm. Those are the defaults written into the form — move Wet soil mass and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Field capacity (gravimetric) is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Wet soil mass blank and the page solves for it, reporting Field capacity (gravimetric) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Field capacity (gravimetric) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/catculator', 'name' => 'Catculator'],
            ['path' => '/biology/cattle-per-acre', 'name' => 'Cattle per acre Calculator'],
            ['path' => '/biology/cell-counting-calculator', 'name' => 'Cell Counting Calculator'],
        ],
        'authors' => [],
    ],
];
