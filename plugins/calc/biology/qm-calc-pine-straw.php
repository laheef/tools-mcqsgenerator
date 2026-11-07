<?php

/**
 * Pine straw
 * /biology/pine-straw
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pine straw',
    'meta' => ['title' => 'Pine straw Calculator: Formula, Steps & Examples', 'description' => 'Pine straw works out area and number of bales needed from length, width and number of bales. Results come back in ft2, with any other unit a click away.', 'h1' => 'Pine straw Calculator', 'updated' => '2026-06-02'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'ft',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'width',
                            'label' => 'Width',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'ft',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'ft2',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalStraw',
                            'label' => 'Number of bales needed',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'We are working on the assumption that each bale covers roughly 35-40 square feet when used for a 2"-3" depth.&nbsp;'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Bales per square feet',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'balesPerSquareFeet',
                            'label' => 'Number of bales',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'area = length * width',
            'results' => ['area' => 'length*width', 'length' => 'area/width', 'width' => 'area/length'],
        ],
        [
            'title' => 'totalStraw = area/balesPerSquareFeet',
            'results' => ['area' => 'balesPerSquareFeet*totalStraw', 'balesPerSquareFeet' => 'area/totalStraw', 'totalStraw' => 'area/balesPerSquareFeet'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Length and Width into Pine straw and the answer comes back as Area and Number of bales needed. The arithmetic is the whole method: area is worked out from length by one formula, applied once. Area comes back in square feet unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Pine straw calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Pine straw: it takes 2 numbers and reports Area, Number of bales needed and Number of bales.</p><p>In the form&#039;s own words, Area = Length × Width.</p><p>The result panel carries Area, Number of bales needed and Number of bales, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Length</strong> — in feet</li><li><strong>Width</strong> — in feet</li></ul><p>What you get back is Area in square feet, Number of bales needed, Number of bales, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Length = 10 ft, Width = 100 ft, Number of bales needed = 1000 and Number of bales = 40 gives <strong>Area</strong> = 1000 ft2.</p><ul><li><strong>Area</strong> = 1000 ft2</li></ul><p>That is <strong>Area</strong> = <code>Length × Width</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Area</strong> = 1000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Area lists 24 options and opens on square feet. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Area</strong> = <code>Length × Width</code></li><li><strong>Length</strong> = <code>Area ÷ Width</code></li><li><strong>Width</strong> = <code>Area ÷ Length</code></li><li><strong>Number of bales</strong> = <code>Area ÷ Number of bales needed</code></li><li><strong>Number of bales needed</strong> = <code>Area ÷ Number of bales</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Area</strong> = <code>Length × Width</code> — the form to use when Length and Width are the values you have.</li><li><strong>Length</strong> = <code>Area ÷ Width</code> — the form to use when Area and Width are the values you have.</li><li><strong>Width</strong> = <code>Area ÷ Length</code> — the form to use when Area and Length are the values you have.</li><li><strong>Area</strong> = <code>Number of bales × Number of bales needed</code> — the form to use when Number of bales and Number of bales needed are the values you have.</li><li><strong>Number of bales</strong> = <code>Area ÷ Number of bales needed</code> — the form to use when Area and Number of bales needed are the values you have.</li><li><strong>Number of bales needed</strong> = <code>Area ÷ Number of bales</code> — the form to use when Area and Number of bales are the values you have.</li></ul><p>Any one of Area, Length and Width can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Length, from 10 to 20 — and the answers go from <strong>Area</strong> 1000 ft2 to <strong>Area</strong> 2000 ft2.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Length and Width carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Area, Number of bales needed and Number of bales are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Length left as a guess.</strong> Anything typed into Length is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Width left as a guess.</strong> Anything typed into Width is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Length and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Pine straw form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Length</strong> is a feet quantity: the page opens it in ft and converts anything else you pick before the formula runs. The page reads it when it works out Area and Width. Fill it from a measurement rather than a memory — Length is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Width</strong> is a feet quantity: the page opens it in ft and converts anything else you pick before the formula runs. The page reads it when it works out Area and Length. Fill it from a measurement rather than a memory — Width is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Area</strong> is a square feet figure and the page's own defaults put it at 1000 ft2. It is worked out from Length and Width. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Number of bales needed</strong> is a plain number. It is worked out from Area and Number of bales. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Number of bales</strong> is a plain number. It is worked out from Area and Number of bales needed. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Area</th></tr></thead><tbody><tr><td><strong>Length</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Width</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Number of bales needed</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Number of bales</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Width: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Number of bales needed and Number of bales barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Length = 5 ft, Width = 50 ft, Number of bales needed = 500 and Number of bales = 20 and the page reports <strong>Area</strong> = 250 ft2.</li><li>Feed in Length = 30 ft, Width = 100 ft, Number of bales needed = 1000 and Number of bales = 40 and the page reports <strong>Area</strong> = 3000 ft2.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Pine straw actually offers.</p><ul><li><strong>square feet</strong> — 24 units. It opens in <em>ft2</em>, and the chip also carries ac, m², ft², cm², in² and a. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>feet</strong> — 31 units. It opens in <em>ft</em>, and the chip also carries in, m, ft, Å, nm and pm. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Area is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are square feet and feet and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Length and Width are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Length and Width measured, Area and Number of bales needed wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/pcr-master-mix-calculator">PCR Master Mix Calculator</a>, <a href="/biology/pcr-primer-stats">PCR Primer Stats Calculator</a> and <a href="/biology/pedigree-probability">Pedigree Probability Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pine straw calculator work out?', 'a' => 'Area, Number of bales needed and Number of bales, from Length and Width. The relationship is Area = Length × Width.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Length (feet), Width (feet). With length and width in place, Area can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Area, Length, Width and Number of bales blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Area = 1000 ft2. That comes from the page\'s own defaults, entered in Length; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Area is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Length blank and the page solves for it, reporting Area instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Area keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/pcr-master-mix-calculator', 'name' => 'PCR Master Mix Calculator'],
            ['path' => '/biology/pcr-primer-stats', 'name' => 'PCR Primer Stats Calculator'],
            ['path' => '/biology/pedigree-probability', 'name' => 'Pedigree Probability Calculator'],
        ],
        'authors' => [],
    ],
];
