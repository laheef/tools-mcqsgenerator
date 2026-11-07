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
    'meta' => ['title' => 'Crop Water Requirement Calculator (ETc) — Biology', 'description' => 'Crop Water Requirement Calculator (ETc) reports crop water use, seasonal use (120 days), volume to apply per hectare and hours a 10 m³/h system must run.', 'h1' => 'Crop Water Requirement Calculator (ETc)', 'updated' => '2026-10-29'],
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
        Crop Water Requirement Calculator (ETc) works out Crop water use and Seasonal use (120 days) from Reference evapotranspiration (ETo), Crop coefficient (Kc) and Area. It is a single relationship that reads crop water use out of reference evapotranspiration (ETo), not a table of canned results keyed by them. Units for Crop water use default to mm/day and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Crop Water Requirement Calculator (ETc) calculator works', 'html' => <<<'TXT'
            <p>The Crop Water Requirement Calculator (ETc) calculator applies one relationship to 4 numbers and reports Crop water use, Seasonal use (120 days) and Volume to apply per hectare.</p><p>The relationship it solves reads Crop water use = Reference evapotranspiration (ETo) × Crop coefficient (Kc).</p><p>The result panel carries Crop water use, Seasonal use (120 days), Volume to apply per hectare and Hours a 10 m³/h system must run, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Reference evapotranspiration (ETo)</strong> — in mm/day. From a weather station or FAO-56</li><li><strong>Crop coefficient (Kc)</strong> — a plain number, no unit. 1.05 is a typical mid-season value</li><li><strong>Area</strong> — in ha</li><li><strong>Irrigation efficiency</strong> — in %. Drip 90%, sprinkler 75%, furrow 60%</li></ul><p>What you get back is Crop water use in mm/day, Seasonal use (120 days) in mm, Volume to apply per hectare in m³/ha/day, Hours a 10 m³/h system must run in h, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Reference evapotranspiration (ETo) = 5.4 mm/day, Crop coefficient (Kc) = 1.05, Area = 1 ha and Irrigation efficiency = 80 % gives <strong>Crop water use</strong> = 5.67 mm/day, <strong>Seasonal use (120 days)</strong> = 680 mm, <strong>Volume to apply per hectare</strong> = 70.88 m³/ha/day and <strong>Hours a 10 m³/h system must run</strong> = 7.09 h.</p><ul><li><strong>Crop water use</strong> = 5.67 mm/day</li><li><strong>Seasonal use (120 days)</strong> = 680 mm</li><li><strong>Volume to apply per hectare</strong> = 70.88 m³/ha/day</li><li><strong>Hours a 10 m³/h system must run</strong> = 7.09 h</li></ul><p>The line behind those figures is <strong>Crop water use</strong> = <code>Reference evapotranspiration (ETo) × Crop coefficient (Kc)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Crop water use</strong> = 5.67, <strong>Seasonal use (120 days)</strong> = 680, <strong>Volume to apply per hectare</strong> = 70.88 and <strong>Hours a 10 m³/h system must run</strong> = 7.09. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Crop water use is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Crop water use</strong> = <code>Reference evapotranspiration (ETo) × Crop coefficient (Kc)</code></li><li><strong>Seasonal use (120 days)</strong> = <code>Reference evapotranspiration (ETo) × Crop coefficient (Kc) × 120</code></li><li><strong>Volume to apply per hectare</strong> = <code>Reference evapotranspiration (ETo) × Crop coefficient (Kc) × 10 ÷ (Irrigation efficiency ÷ 100)</code></li><li><strong>Hours a 10 m³/h system must run</strong> = <code>Reference evapotranspiration (ETo) × Crop coefficient (Kc) × 10 ÷ (Irrigation efficiency ÷ 100) ÷ Area ÷ 10</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Crop water use</strong> = <code>Reference evapotranspiration (ETo) × Crop coefficient (Kc)</code> — the form to use when Reference evapotranspiration (ETo) and Crop coefficient (Kc) are the values you have.</li><li><strong>Seasonal use (120 days)</strong> = <code>Reference evapotranspiration (ETo) × Crop coefficient (Kc) × 120</code> — the form to use when Reference evapotranspiration (ETo) and Crop coefficient (Kc) are the values you have.</li><li><strong>Volume to apply per hectare</strong> = <code>Reference evapotranspiration (ETo) × Crop coefficient (Kc) × 10 ÷ (Irrigation efficiency ÷ 100)</code> — the form to use when Reference evapotranspiration (ETo), Crop coefficient (Kc) and Irrigation efficiency are the values you have.</li><li><strong>Hours a 10 m³/h system must run</strong> = <code>Reference evapotranspiration (ETo) × Crop coefficient (Kc) × 10 ÷ (Irrigation efficiency ÷ 100) ÷ Area ÷ 10</code> — the form to use when Reference evapotranspiration (ETo), Crop coefficient (Kc), Irrigation efficiency and Area are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Crop water use, Seasonal use (120 days) and Volume to apply per hectare can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Reference evapotranspiration (ETo) from 5.4 to 10.8, leaving every other box alone. The panel moves from <strong>Crop water use</strong> 5.67 mm/day, <strong>Seasonal use (120 days)</strong> 680 mm, <strong>Volume to apply per hectare</strong> 70.88 m³/ha/day and <strong>Hours a 10 m³/h system must run</strong> 7.09 h to <strong>Crop water use</strong> 11.34 mm/day, <strong>Seasonal use (120 days)</strong> 1361 mm, <strong>Volume to apply per hectare</strong> 142 m³/ha/day and <strong>Hours a 10 m³/h system must run</strong> 14.18 h.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Crop water use, Seasonal use (120 days) and Volume to apply per hectare are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Reference evapotranspiration (ETo) left as a guess.</strong> Anything typed into Reference evapotranspiration (ETo) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Crop coefficient (Kc) left as a guess.</strong> Anything typed into Crop coefficient (Kc) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Area left as a guess.</strong> Anything typed into Area is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Reference evapotranspiration (ETo) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Crop Water Requirement Calculator (ETc) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Reference evapotranspiration (ETo)</strong> is measured in mm/day. From a weather station or FAO-56. It feeds Crop water use, Seasonal use (120 days) and Volume to apply per hectare. Fill it from a measurement rather than a memory — Reference evapotranspiration (ETo) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Crop coefficient (Kc)</strong> takes a plain number with no unit attached. 1.05 is a typical mid-season value. It feeds Crop water use, Seasonal use (120 days) and Volume to apply per hectare. Fill it from a measurement rather than a memory — Crop coefficient (Kc) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Area</strong> is measured in ha. It feeds Hours a 10 m³/h system must run. Fill it from a measurement rather than a memory — Area is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Irrigation efficiency</strong> is measured in %. Drip 90%, sprinkler 75%, furrow 60%. It feeds Volume to apply per hectare and Hours a 10 m³/h system must run. Fill it from a measurement rather than a memory — Irrigation efficiency is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Crop water use</strong> is a plain number and the page's own defaults put it at 5.67. The value follows from Reference evapotranspiration (ETo) and Crop coefficient (Kc). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Seasonal use (120 days)</strong> is a plain number and the page's own defaults put it at 680. The value follows from Reference evapotranspiration (ETo) and Crop coefficient (Kc). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Volume to apply per hectare</strong> is a plain number and the page's own defaults put it at 70.88. The value follows from Reference evapotranspiration (ETo), Crop coefficient (Kc) and Irrigation efficiency. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Hours a 10 m³/h system must run</strong> is a plain number and the page's own defaults put it at 7.09. The value follows from Reference evapotranspiration (ETo), Crop coefficient (Kc), Irrigation efficiency and Area. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Crop water use</th><th>Seasonal use (120 days)</th><th>Volume to apply per hectare</th><th>Hours a 10 m³/h system must run</th></tr></thead><tbody><tr><td><strong>Reference evapotranspiration (ETo)</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Crop coefficient (Kc)</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Area</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>-9.09%</td></tr><tr><td><strong>Irrigation efficiency</strong> +10%</td><td>+0%</td><td>+0%</td><td>-9.09%</td><td>-9.09%</td></tr></tbody></table><p>The steepest column belongs to Reference evapotranspiration (ETo): ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Reference evapotranspiration (ETo) = 2.7 mm/day, Crop coefficient (Kc) = 0.525, Area = 0.5 ha and Irrigation efficiency = 40 % and the page reports <strong>Crop water use</strong> = 1.42 mm/day, <strong>Seasonal use (120 days)</strong> = 170 mm, <strong>Volume to apply per hectare</strong> = 35.44 m³/ha/day and <strong>Hours a 10 m³/h system must run</strong> = 7.09 h.</li><li>Feed in Reference evapotranspiration (ETo) = 16.2 mm/day, Crop coefficient (Kc) = 1.05, Area = 1 ha and Irrigation efficiency = 80 % and the page reports <strong>Crop water use</strong> = 17.01 mm/day, <strong>Seasonal use (120 days)</strong> = 2041 mm, <strong>Volume to apply per hectare</strong> = 213 m³/ha/day and <strong>Hours a 10 m³/h system must run</strong> = 21.26 h.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Crop water use is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Reference evapotranspiration (ETo), Crop coefficient (Kc) and Area are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
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
            Reference evapotranspiration (ETo) (mm/day), Crop coefficient (Kc), Area (ha), Irrigation efficiency (%). Enter reference evapotranspiration (ETo), crop coefficient (Kc) and area; Crop water use is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Crop water use, Seasonal use (120 days), Volume to apply per hectare and Hours a 10 m³/h system must run can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Crop water use = 5.67 mm/day, Seasonal use (120 days) = 680 mm, Volume to apply per hectare = 70.88 m³/ha/day and Hours a 10 m³/h system must run = 7.09 h. Those are the defaults written into the form — move Reference evapotranspiration (ETo) and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Crop water use is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
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
