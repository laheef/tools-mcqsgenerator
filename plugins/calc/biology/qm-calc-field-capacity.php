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
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Wet soil mass</strong> — in g</li><li><strong>Oven-dry soil mass</strong> — in g</li><li><strong>Core volume</strong> — in cm³</li></ul><p>The answers come back as Field capacity (gravimetric) in %, Field capacity (volumetric) in %, Bulk density in g/cm³, Water stored in the root zone in mm. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Wet soil mass = 620 g, Oven-dry soil mass = 500 g and Core volume = 300 cm³ — through the same formula and the panel reports &lt;strong&gt;Field capacity (gravimetric)&lt;/strong&gt; = 24 %, &lt;strong&gt;Field capacity (volumetric)&lt;/strong&gt; = 40 %, &lt;strong&gt;Bulk density&lt;/strong&gt; = 1.67 g/cm³ and &lt;strong&gt;Water stored in the root zone&lt;/strong&gt; = 240 mm.</p><ul><li><strong>Field capacity (gravimetric)</strong> = 24 %</li><li><strong>Field capacity (volumetric)</strong> = 40 %</li><li><strong>Bulk density</strong> = 1.67 g/cm³</li><li><strong>Water stored in the root zone</strong> = 240 mm</li></ul><p>The line behind those figures is <strong>Field capacity (gravimetric)</strong> = <code>(Wet soil mass − Oven-dry soil mass) ÷ Oven-dry soil mass × 100</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Field capacity (gravimetric)&lt;/strong&gt; = 24, &lt;strong&gt;Field capacity (volumetric)&lt;/strong&gt; = 40, &lt;strong&gt;Bulk density&lt;/strong&gt; = 1.67 and &lt;strong&gt;Water stored in the root zone&lt;/strong&gt; = 240. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Field capacity (gravimetric) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Field capacity (gravimetric)</strong> = <code>(Wet soil mass − Oven-dry soil mass) ÷ Oven-dry soil mass × 100</code></li><li><strong>Field capacity (volumetric)</strong> = <code>(Wet soil mass − Oven-dry soil mass) ÷ Core volume × 100</code></li><li><strong>Bulk density</strong> = <code>Oven-dry soil mass ÷ Core volume</code></li><li><strong>Water stored in the root zone</strong> = <code>(Wet soil mass − Oven-dry soil mass) ÷ Core volume × 100 × 600 ÷ 100</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Field capacity (gravimetric)</strong> = <code>(Wet soil mass − Oven-dry soil mass) ÷ Oven-dry soil mass × 100</code> — the form to use when Wet soil mass and Oven-dry soil mass are the values you have.</li><li><strong>Field capacity (volumetric)</strong> = <code>(Wet soil mass − Oven-dry soil mass) ÷ Core volume × 100</code> — the form to use when Wet soil mass, Oven-dry soil mass and Core volume are the values you have.</li><li><strong>Bulk density</strong> = <code>Oven-dry soil mass ÷ Core volume</code> — the form to use when Oven-dry soil mass and Core volume are the values you have.</li><li><strong>Water stored in the root zone</strong> = <code>(Wet soil mass − Oven-dry soil mass) ÷ Core volume × 100 × 600 ÷ 100</code> — the form to use when Wet soil mass, Oven-dry soil mass and Core volume are the values you have.</li></ul><p>Any one of Field capacity (gravimetric), Field capacity (volumetric) and Bulk density can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Wet soil mass from 620 to 1240, leaving every other box alone. The panel moves from &lt;strong&gt;Field capacity (gravimetric)&lt;/strong&gt; 24 %, &lt;strong&gt;Field capacity (volumetric)&lt;/strong&gt; 40 %, &lt;strong&gt;Bulk density&lt;/strong&gt; 1.67 g/cm³ and &lt;strong&gt;Water stored in the root zone&lt;/strong&gt; 240 mm to &lt;strong&gt;Field capacity (gravimetric)&lt;/strong&gt; 148 %, &lt;strong&gt;Field capacity (volumetric)&lt;/strong&gt; 247 %, &lt;strong&gt;Bulk density&lt;/strong&gt; 1.67 g/cm³ and &lt;strong&gt;Water stored in the root zone&lt;/strong&gt; 1480 mm.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Field capacity (gravimetric), Field capacity (volumetric) and Bulk density are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Wet soil mass left as a guess.</strong> Anything typed into Wet soil mass is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Oven-dry soil mass left as a guess.</strong> Anything typed into Oven-dry soil mass is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Core volume left as a guess.</strong> Anything typed into Core volume is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Wet soil mass is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Field Capacity form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Wet soil mass</strong> is measured in g. Change it and Field capacity (gravimetric), Field capacity (volumetric) and Water stored in the root zone changes with it. Fill it from a measurement rather than a memory — Wet soil mass is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Oven-dry soil mass</strong> is measured in g. Change it and Field capacity (gravimetric), Field capacity (volumetric) and Bulk density changes with it. Fill it from a measurement rather than a memory — Oven-dry soil mass is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Core volume</strong> is measured in cm³. Change it and Field capacity (volumetric), Bulk density and Water stored in the root zone changes with it. Fill it from a measurement rather than a memory — Core volume is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Field capacity (gravimetric)</strong> is a plain number and the page's own defaults put it at 24. It is computed from Wet soil mass and Oven-dry soil mass, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Field capacity (volumetric)</strong> is a plain number and the page's own defaults put it at 40. It is computed from Wet soil mass, Oven-dry soil mass and Core volume, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Bulk density</strong> is a plain number and the page's own defaults put it at 1.67. It is computed from Oven-dry soil mass and Core volume, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Water stored in the root zone</strong> is a plain number and the page's own defaults put it at 240. It is computed from Wet soil mass, Oven-dry soil mass and Core volume, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Field capacity (gravimetric)</th><th>Field capacity (volumetric)</th><th>Bulk density</th><th>Water stored in the root zone</th></tr></thead><tbody><tr><td><strong>Wet soil mass</strong> +10%</td><td>+51.67%</td><td>+51.67%</td><td>+0%</td><td>+51.67%</td></tr><tr><td><strong>Oven-dry soil mass</strong> +10%</td><td>-46.97%</td><td>-41.67%</td><td>+10%</td><td>-41.67%</td></tr><tr><td><strong>Core volume</strong> +10%</td><td>+0%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td></tr></tbody></table><p>The steepest column belongs to Wet soil mass: ten per cent there moves an answer by about 51.7 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Wet soil mass = 310 g, Oven-dry soil mass = 250 g and Core volume = 150 cm³ and the page reports <strong>Field capacity (gravimetric)</strong> = 24 %, <strong>Field capacity (volumetric)</strong> = 40 %, <strong>Bulk density</strong> = 1.67 g/cm³ and <strong>Water stored in the root zone</strong> = 240 mm.</li><li>Feed in Wet soil mass = 1860 g, Oven-dry soil mass = 500 g and Core volume = 300 cm³ and the page reports <strong>Field capacity (gravimetric)</strong> = 272 %, <strong>Field capacity (volumetric)</strong> = 453 %, <strong>Bulk density</strong> = 1.67 g/cm³ and <strong>Water stored in the root zone</strong> = 2720 mm.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Field capacity (gravimetric) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Wet soil mass, Oven-dry soil mass and Core volume are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
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
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Field capacity (gravimetric) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
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
