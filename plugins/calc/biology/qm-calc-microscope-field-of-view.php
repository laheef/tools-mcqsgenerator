<?php

/**
 * Microscope Field of View Calculator
 * /biology/microscope-field-of-view
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Microscope Field of View Calculator',
    'meta' => ['title' => 'Microscope Field of View Calculator — Biology', 'description' => 'It is a single relationship that reads Field of view out of Eyepiece field number, not a table of canned results keyed by them. An answer far from that is…', 'h1' => 'Microscope Field of View Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'field_number',
                            'label' => 'Eyepiece field number',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'help' => 'Usually printed on the eyepiece, 18–26',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'magnification',
                            'label' => 'Objective magnification',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '4, 10, 40 or 100',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'fov_mm',
                            'label' => 'Field of view',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fov_um',
                            'label' => 'Field of view',
                            'type' => 'number',
                            'suffix' => 'µm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'area_mm2',
                            'label' => 'Area of the field',
                            'type' => 'number',
                            'suffix' => 'mm²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cells_seen',
                            'label' => 'Cells counted in the field',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'density',
                            'label' => 'Cell density',
                            'type' => 'number',
                            'suffix' => 'cells/mm²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'density_ml',
                            'label' => 'Cells per mL',
                            'type' => 'number',
                            'help' => 'Assumes a monolayer on a haemocytometer scale',
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
            'title' => 'Field',
            'results' => [
                'fov_mm' => 'field_number/magnification',
                'fov_um' => 'field_number/magnification*1000',
                'area_mm2' => '3.14159265358979*(field_number/magnification/2)^2',
                'density' => 'cells_seen/(3.14159265358979*(field_number/magnification/2)^2)',
                'density_ml' => 'cells_seen/(3.14159265358979*(field_number/magnification/2)^2)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Eyepiece field number, Objective magnification and Cells counted in the field into Microscope Field of View and the answer comes back as Field of view and Field of view. It is a single relationship that reads Field of view out of Eyepiece field number, not a table of canned results keyed by them. Units for Field of view default to mm and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Microscope Field of View calculator works', 'html' => <<<'TXT'
            <p>The Microscope Field of View calculator applies one relationship to 3 numbers and reports Field of view, Field of view and Area of the field.</p><p>The relationship it solves reads Field of view = Eyepiece field number ÷ Objective magnification.</p><p>What comes back is Field of view, Field of view, Area of the field and Cell density — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Eyepiece field number</strong> — in mm. Usually printed on the eyepiece, 18–26</li><li><strong>Objective magnification</strong> — in ×. 4, 10, 40 or 100</li><li><strong>Cells counted in the field</strong> — a plain number, no unit</li></ul><p>The answers come back as Field of view in mm, Field of view in µm, Area of the field in mm², Cell density in cells/mm², Cells per mL. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Eyepiece field number = 20 mm, Objective magnification = 40 × and Cells counted in the field = 50 gives &lt;strong&gt;Field of view&lt;/strong&gt; = 0.5 mm, &lt;strong&gt;Field of view&lt;/strong&gt; = 500 µm, &lt;strong&gt;Area of the field&lt;/strong&gt; = 0.1963 mm², &lt;strong&gt;Cell density&lt;/strong&gt; = 255 cells/mm² and &lt;strong&gt;Cells per mL&lt;/strong&gt; = 25465.</p><ul><li><strong>Field of view</strong> = 0.5 mm</li><li><strong>Field of view</strong> = 500 µm</li><li><strong>Area of the field</strong> = 0.1963 mm²</li><li><strong>Cell density</strong> = 255 cells/mm²</li><li><strong>Cells per mL</strong> = 25465</li></ul><p>That is <strong>Field of view</strong> = <code>Eyepiece field number ÷ Objective magnification</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Field of view&lt;/strong&gt; = 0.5, &lt;strong&gt;Field of view&lt;/strong&gt; = 500, &lt;strong&gt;Area of the field&lt;/strong&gt; = 0.1963, &lt;strong&gt;Cell density&lt;/strong&gt; = 255 and &lt;strong&gt;Cells per mL&lt;/strong&gt; = 25465. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Field of view is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Field of view</strong> = <code>Eyepiece field number ÷ Objective magnification</code></li><li><strong>Area of the field</strong> = <code>3.14159265358979 × (Eyepiece field number ÷ Objective magnification ÷ 2) ^ 2</code></li><li><strong>Cell density</strong> = <code>Cells counted in the field ÷ (3.14159265358979 × (Eyepiece field number ÷ Objective magnification ÷ 2) ^ 2)</code></li><li><strong>Cells per mL</strong> = <code>Cells counted in the field ÷ (3.14159265358979 × (Eyepiece field number ÷ Objective magnification ÷ 2) ^ 2) × 100</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Field of view</strong> = <code>Eyepiece field number ÷ Objective magnification</code> — the form to use when Eyepiece field number and Objective magnification are the values you have.</li><li><strong>Field of view</strong> = <code>Eyepiece field number ÷ Objective magnification × 1000</code> — the form to use when Eyepiece field number and Objective magnification are the values you have.</li><li><strong>Area of the field</strong> = <code>3.14159265358979 × (Eyepiece field number ÷ Objective magnification ÷ 2) ^ 2</code> — the form to use when Eyepiece field number and Objective magnification are the values you have.</li><li><strong>Cell density</strong> = <code>Cells counted in the field ÷ (3.14159265358979 × (Eyepiece field number ÷ Objective magnification ÷ 2) ^ 2)</code> — the form to use when Cells counted in the field, Eyepiece field number and Objective magnification are the values you have.</li><li><strong>Cells per mL</strong> = <code>Cells counted in the field ÷ (3.14159265358979 × (Eyepiece field number ÷ Objective magnification ÷ 2) ^ 2) × 100</code> — the form to use when Cells counted in the field, Eyepiece field number and Objective magnification are the values you have.</li></ul><p>Any one of Field of view, Field of view and Area of the field can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Eyepiece field number from 20 to 40, leaving every other box alone. The panel moves from &lt;strong&gt;Field of view&lt;/strong&gt; 0.5 mm, &lt;strong&gt;Field of view&lt;/strong&gt; 500 µm, &lt;strong&gt;Area of the field&lt;/strong&gt; 0.1963 mm², &lt;strong&gt;Cell density&lt;/strong&gt; 255 cells/mm² and &lt;strong&gt;Cells per mL&lt;/strong&gt; 25465 to &lt;strong&gt;Field of view&lt;/strong&gt; 1 mm, &lt;strong&gt;Field of view&lt;/strong&gt; 1000 µm, &lt;strong&gt;Area of the field&lt;/strong&gt; 0.7854 mm², &lt;strong&gt;Cell density&lt;/strong&gt; 63.66 cells/mm² and &lt;strong&gt;Cells per mL&lt;/strong&gt; 6366.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Field of view, Field of view and Area of the field are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Eyepiece field number left as a guess.</strong> Anything typed into Eyepiece field number is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Objective magnification left as a guess.</strong> Anything typed into Objective magnification is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Cells counted in the field left as a guess.</strong> Anything typed into Cells counted in the field is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Eyepiece field number to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Microscope Field of View form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Eyepiece field number</strong> is measured in mm. Usually printed on the eyepiece, 18–26. The page reads it when it works out Field of view, Field of view and Area of the field. Fill it from a measurement rather than a memory — Eyepiece field number is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Objective magnification</strong> is measured in ×. 4, 10, 40 or 100. The page reads it when it works out Field of view, Field of view and Area of the field. Fill it from a measurement rather than a memory — Objective magnification is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Cells counted in the field</strong> takes a plain number with no unit attached. The page reads it when it works out Cell density and Cells per mL. Fill it from a measurement rather than a memory — Cells counted in the field is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Field of view</strong> is a plain number and the page's own defaults put it at 0.5. It is computed from Eyepiece field number and Objective magnification, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Field of view</strong> is a plain number and the page's own defaults put it at 500. It is computed from Eyepiece field number and Objective magnification, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Area of the field</strong> is a plain number and the page's own defaults put it at 0.1963. It is computed from Eyepiece field number and Objective magnification, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Cell density</strong> is a plain number and the page's own defaults put it at 255. It is computed from Cells counted in the field, Eyepiece field number and Objective magnification, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Cells per mL</strong> is a plain number and the page's own defaults put it at 25465. It is computed from Cells counted in the field, Eyepiece field number and Objective magnification, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Field of view</th><th>Field of view</th><th>Area of the field</th><th>Cell density</th><th>Cells per mL</th></tr></thead><tbody><tr><td><strong>Eyepiece field number</strong> +10%</td><td>+10%</td><td>+10%</td><td>+21%</td><td>-17.36%</td><td>-17.36%</td></tr><tr><td><strong>Objective magnification</strong> +10%</td><td>-9.09%</td><td>-9.09%</td><td>-17.36%</td><td>+21%</td><td>+21%</td></tr><tr><td><strong>Cells counted in the field</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Objective magnification: ten per cent there moves an answer by about 21 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Field of view is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Eyepiece field number, Objective magnification and Cells counted in the field are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Eyepiece field number, Objective magnification and Cells counted in the field is what you already know and Field of view and Field of view is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/pig-weight">Pig Weight Calculator</a>, <a href="/biology/pine-straw">Pine straw</a> and <a href="/biology/plant-population">Plant population Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Microscope Field of View calculator work out?', 'a' => <<<'TXT'
            Field of view, Field of view, Area of the field and Cell density, from Eyepiece field number and Objective magnification. The relationship is Field of view = Eyepiece field number ÷ Objective magnification.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Eyepiece field number (mm), Objective magnification (×), Cells counted in the field. Enter field_number, magnification and cells_seen; Field of view is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Field of view, Field of view, Area of the field and Cell density blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Field of view = 0.5 mm, Field of view = 500 µm, Area of the field = 0.1963 mm², Cell density = 255 cells/mm² and Cells per mL = 25465. That comes from the page's own defaults, entered in Eyepiece field number; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Field of view is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Eyepiece field number blank and the page solves for it, reporting Field of view instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Field of view at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/pig-weight', 'name' => 'Pig Weight Calculator'],
            ['path' => '/biology/pine-straw', 'name' => 'Pine straw'],
            ['path' => '/biology/plant-population', 'name' => 'Plant population Calculator'],
        ],
        'authors' => [],
    ],
];
