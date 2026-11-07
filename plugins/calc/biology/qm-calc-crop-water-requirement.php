<?php

/**
 * Crop Water Requirement Calculator (ETc)
 * /biology/crop-water-requirement
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Crop Water Requirement Calculator (ETc)',
    'meta' => ['title' => 'Crop Water Requirement Calculator (ETc) — Biology', 'description' => 'Crop Water Requirement Calculator (ETc) works out Crop water use and Seasonal use (120 days) from Reference evapotranspiration (ETo), Crop coefficient (Kc)…', 'h1' => 'Crop Water Requirement Calculator (ETc)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'eto',
                            'label' => 'Reference evapotranspiration (ETo)',
                            'type' => 'number',
                            'suffix' => 'mm/day',
                            'help' => 'From a weather station or FAO-56',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5.4',
                        ],
                        [
                            'name' => 'kc',
                            'label' => 'Crop coefficient (Kc)',
                            'type' => 'number',
                            'help' => '1.05 is a typical mid-season value',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.05',
                        ],
                        [
                            'name' => 'area',
                            'label' => 'Area',
                            'type' => 'number',
                            'suffix' => 'ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'efficiency',
                            'label' => 'Irrigation efficiency',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Drip 90%, sprinkler 75%, furrow 60%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '80',
                        ],
                        [
                            'name' => 'etc',
                            'label' => 'Crop water use',
                            'type' => 'number',
                            'suffix' => 'mm/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'season',
                            'label' => 'Seasonal use (120 days)',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Volume to apply per hectare',
                            'type' => 'number',
                            'suffix' => 'm³/ha/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hours',
                            'label' => 'Hours a 10 m³/h system must run',
                            'type' => 'number',
                            'suffix' => 'h',
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
            'title' => 'Water use',
            'results' => ['etc' => 'eto*kc', 'season' => 'eto*kc*120', 'volume' => 'eto*kc*10/(efficiency/100)', 'hours' => 'eto*kc*10/(efficiency/100)/area/10'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Crop Water Requirement Calculator (ETc) works out Crop water use and Seasonal use (120 days) from Reference evapotranspiration (ETo), Crop coefficient (Kc) and Area. It is a single relationship that reads Crop water use out of Reference evapotranspiration (ETo), not a table of canned results keyed by them. Units for Crop water use default to mm/day and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Crop Water Requirement Calculator (ETc) calculator works', 'html' => <<<'TXT'
            <p>The Crop Water Requirement Calculator (ETc) calculator applies one relationship to 4 numbers and reports Crop water use, Seasonal use (120 days) and Volume to apply per hectare.</p><p>The relationship it solves reads Crop water use = Reference evapotranspiration (ETo) × Crop coefficient (Kc).</p><p>The result panel carries Crop water use, Seasonal use (120 days), Volume to apply per hectare and Hours a 10 m³/h system must run, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Reference evapotranspiration (ETo)</strong> — in mm/day. From a weather station or FAO-56</li><li><strong>Crop coefficient (Kc)</strong> — a plain number, no unit. 1.05 is a typical mid-season value</li><li><strong>Area</strong> — in ha</li><li><strong>Irrigation efficiency</strong> — in %. Drip 90%, sprinkler 75%, furrow 60%</li></ul><p>What you get back is Crop water use in mm/day, Seasonal use (120 days) in mm, Volume to apply per hectare in m³/ha/day, Hours a 10 m³/h system must run in h, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Reference evapotranspiration (ETo) = 5.4 mm/day, Crop coefficient (Kc) = 1.05, Area = 1 ha and Irrigation efficiency = 80 % gives &lt;strong&gt;Crop water use&lt;/strong&gt; = 5.67 mm/day, &lt;strong&gt;Seasonal use (120 days)&lt;/strong&gt; = 680 mm, &lt;strong&gt;Volume to apply per hectare&lt;/strong&gt; = 70.88 m³/ha/day and &lt;strong&gt;Hours a 10 m³/h system must run&lt;/strong&gt; = 7.09 h.</p><ul><li><strong>Crop water use</strong> = 5.67 mm/day</li><li><strong>Seasonal use (120 days)</strong> = 680 mm</li><li><strong>Volume to apply per hectare</strong> = 70.88 m³/ha/day</li><li><strong>Hours a 10 m³/h system must run</strong> = 7.09 h</li></ul><p>The line behind those figures is <strong>Crop water use</strong> = <code>Reference evapotranspiration (ETo) × Crop coefficient (Kc)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Crop water use&lt;/strong&gt; = 5.67, &lt;strong&gt;Seasonal use (120 days)&lt;/strong&gt; = 680, &lt;strong&gt;Volume to apply per hectare&lt;/strong&gt; = 70.88 and &lt;strong&gt;Hours a 10 m³/h system must run&lt;/strong&gt; = 7.09. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Crop water use is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Crop water use</strong> = <code>Reference evapotranspiration (ETo) × Crop coefficient (Kc)</code></li><li><strong>Seasonal use (120 days)</strong> = <code>Reference evapotranspiration (ETo) × Crop coefficient (Kc) × 120</code></li><li><strong>Volume to apply per hectare</strong> = <code>Reference evapotranspiration (ETo) × Crop coefficient (Kc) × 10 ÷ (Irrigation efficiency ÷ 100)</code></li><li><strong>Hours a 10 m³/h system must run</strong> = <code>Reference evapotranspiration (ETo) × Crop coefficient (Kc) × 10 ÷ (Irrigation efficiency ÷ 100) ÷ Area ÷ 10</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Crop water use, Seasonal use (120 days) and Volume to apply per hectare can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Reference evapotranspiration (ETo) from 5.4 to 10.8, leaving every other box alone. The panel moves from &lt;strong&gt;Crop water use&lt;/strong&gt; 5.67 mm/day, &lt;strong&gt;Seasonal use (120 days)&lt;/strong&gt; 680 mm, &lt;strong&gt;Volume to apply per hectare&lt;/strong&gt; 70.88 m³/ha/day and &lt;strong&gt;Hours a 10 m³/h system must run&lt;/strong&gt; 7.09 h to &lt;strong&gt;Crop water use&lt;/strong&gt; 11.34 mm/day, &lt;strong&gt;Seasonal use (120 days)&lt;/strong&gt; 1361 mm, &lt;strong&gt;Volume to apply per hectare&lt;/strong&gt; 142 m³/ha/day and &lt;strong&gt;Hours a 10 m³/h system must run&lt;/strong&gt; 14.18 h.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Crop water use, Seasonal use (120 days) and Volume to apply per hectare are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Reference evapotranspiration (ETo) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Reference evapotranspiration (ETo), Crop coefficient (Kc) and Area measured, Crop water use and Seasonal use (120 days) wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/restriction-digest-setup">Restriction Digest Reaction Setup Calculator — Formula &amp; Resul</a>, <a href="/biology/restriction-reaction-setup">Restriction Digest Recipe — Enzyme Limit</a> and <a href="/biology/restriction-enzyme-finder">Restriction Enzyme Finder Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Crop Water Requirement Calculator (ETc) calculator work out?', 'a' => <<<'TXT'
            Crop water use, Seasonal use (120 days), Volume to apply per hectare and Hours a 10 m³/h system must run, from Reference evapotranspiration (ETo) and Crop coefficient (Kc). The relationship is Crop water use = Reference evapotranspiration (ETo) × Crop coefficient (Kc).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Reference evapotranspiration (ETo) (mm/day), Crop coefficient (Kc), Area (ha), Irrigation efficiency (%). Enter eto, kc and area; Crop water use is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Crop water use, Seasonal use (120 days), Volume to apply per hectare and Hours a 10 m³/h system must run can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Crop water use = 5.67 mm/day, Seasonal use (120 days) = 680 mm, Volume to apply per hectare = 70.88 m³/ha/day and Hours a 10 m³/h system must run = 7.09 h. Those are the defaults written into the form — move Reference evapotranspiration (ETo) and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Crop water use is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Reference evapotranspiration (ETo) blank and the page solves for it, reporting Crop water use instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Crop water use keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/restriction-digest-setup', 'name' => 'Restriction Digest Reaction Setup Calculator — Formula & Resul'],
            ['path' => '/biology/restriction-reaction-setup', 'name' => 'Restriction Digest Recipe — Enzyme Limit'],
            ['path' => '/biology/restriction-enzyme-finder', 'name' => 'Restriction Enzyme Finder Calculator'],
        ],
        'authors' => [],
    ],
];
