<?php

/**
 * Soil
 * /biology/soil
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Soil',
    'meta' => ['title' => 'Soil Calculator — Free, With Worked Examples', 'description' => 'Enter Length and Width into soil and the answer comes back as area and Depth. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Soil Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'How much soil do you need?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'number',
                            'help' => 'Length of a rectangular surface. You may enter area directly if you want.',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.000001'],
                        ],
                        [
                            'name' => 'width',
                            'label' => 'Width',
                            'type' => 'number',
                            'help' => 'Width of a rectangular surface. You may enter area directly if you want.',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.000001'],
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
                            'help' => 'The area of the surface you want to fill.',
                            'unit' => '28',
                            'unit_default' => 'm2',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'depth',
                            'label' => 'Depth',
                            'type' => 'number',
                            'help' => 'Desired depth of soil layer.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'volume_needed',
                            'label' => 'Volume needed',
                            'type' => 'number',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'density',
                            'label' => 'Density',
                            'type' => 'number',
                            'help' => 'Density of soil that you want to buy. This information should be written on the bag.',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight_needed',
                            'label' => 'Weight needed',
                            'type' => 'number',
                            'help' => 'Weight of soil that you need to buy to cover the desired surface.',
                            'unit' => '22',
                            'unit_default' => 't',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'How much will the soil cost you?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_per_mass',
                            'label' => 'Price per unit mass',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_per_volume',
                            'label' => 'Price per unit volume',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_cost',
                            'label' => 'Total cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'length * width = area',
            'results' => ['area' => 'length*width', 'width' => 'area/length', 'length' => 'area/width'],
        ],
        [
            'title' => 'area * depth = volume_needed',
            'results' => ['depth' => 'volume_needed/area', 'volume_needed' => 'area*depth', 'area' => 'volume_needed/depth'],
        ],
        [
            'title' => 'density = weight_needed / volume_needed',
            'results' => ['volume_needed' => 'weight_needed/density', 'weight_needed' => 'density*volume_needed', 'density' => 'weight_needed/volume_needed'],
        ],
        [
            'title' => 'weight_needed * price_per_mass = total_cost',
            'results' => ['price_per_mass' => 'total_cost/weight_needed', 'total_cost' => 'price_per_mass*weight_needed', 'weight_needed' => 'total_cost/price_per_mass'],
        ],
        [
            'title' => 'volume_needed * price_per_volume = total_cost',
            'results' => ['volume_needed' => 'total_cost/price_per_volume', 'price_per_volume' => 'total_cost/volume_needed', 'total_cost' => 'price_per_volume*volume_needed'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Length and Width into Soil and the answer comes back as Area and Depth. The arithmetic is the whole method: area is worked out from length by one formula, applied once. Area comes back in square meters unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Soil calculator works', 'html' => <<<'TXT'
            <p>Soil answers one question from 2 numbers, and the answer is Area, Depth and Volume needed.</p><p>In the form&#039;s own words, Area = Length × Width.</p><p>The result panel carries Area, Depth, Volume needed and Density, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Length</strong> — in meters. Length of a rectangular surface. You may enter area directly if you want.</li><li><strong>Width</strong> — in meters. Width of a rectangular surface. You may enter area directly if you want.</li></ul><p>The answers come back as Area in square meters, Depth in centimeters, Volume needed in cubic meters, Density in kilograms per cubic meter, Weight needed in metric tons, Price per unit mass in USD, Price per unit volume in USD, Total cost in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Length = 10 m, Width = 100 m, Depth = 1000 cm, Volume needed = 10 m3, Density = 100 kgm3, Weight needed = 1000 t, Price per unit mass = 10 USD, Price per unit volume = 100 USD and Total cost = 1000 USD — through the same formula and the panel reports <strong>Area</strong> = 1000 m2.</p><ul><li><strong>Area</strong> = 1000 m2</li></ul><p>That is <strong>Area</strong> = <code>Length × Width</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Area</strong> = 1000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Area lists 24 options and opens on square meters. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Area</strong> = <code>Length × Width</code></li><li><strong>Width</strong> = <code>Area ÷ Length</code></li><li><strong>Length</strong> = <code>Area ÷ Width</code></li><li><strong>Depth</strong> = <code>Volume needed ÷ Area</code></li><li><strong>Volume needed</strong> = <code>Area × Depth</code></li><li><strong>Weight needed</strong> = <code>Density × Volume needed</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Area</strong> = <code>Length × Width</code> — the form to use when Length and Width are the values you have.</li><li><strong>Width</strong> = <code>Area ÷ Length</code> — the form to use when Area and Length are the values you have.</li><li><strong>Length</strong> = <code>Area ÷ Width</code> — the form to use when Area and Width are the values you have.</li><li><strong>Depth</strong> = <code>Volume needed ÷ Area</code> — the form to use when Volume needed and Area are the values you have.</li><li><strong>Volume needed</strong> = <code>Area × Depth</code> — the form to use when Area and Depth are the values you have.</li><li><strong>Area</strong> = <code>Volume needed ÷ Depth</code> — the form to use when Volume needed and Depth are the values you have.</li><li><strong>Volume needed</strong> = <code>Weight needed ÷ Density</code> — the form to use when Weight needed and Density are the values you have.</li><li><strong>Weight needed</strong> = <code>Density × Volume needed</code> — the form to use when Density and Volume needed are the values you have.</li></ul><p>Any one of Area, Width and Length can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Length, from 10 to 20 — and the answers go from <strong>Area</strong> 1000 m2 to <strong>Area</strong> 2000 m2.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Length and Width carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Area, Depth and Volume needed are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Length left as a guess.</strong> Anything typed into Length is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Width left as a guess.</strong> Anything typed into Width is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Length and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Soil form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Length</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. Length of a rectangular surface. You may enter area directly if you want. Change it and Area and Width changes with it. Fill it from a measurement rather than a memory — Length is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Width</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. Width of a rectangular surface. You may enter area directly if you want. Change it and Area and Length changes with it. Fill it from a measurement rather than a memory — Width is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 8 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Area</strong> is a square meters figure and the page's own defaults put it at 1000 m2. The value follows from Length and Width. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Depth</strong> is a centimeters figure. The value follows from Volume needed and Area. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Volume needed</strong> is a cubic meters figure. The value follows from Area and Depth. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Density</strong> is a kilograms per cubic meter figure. The value follows from Weight needed and Volume needed. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Weight needed</strong> is a metric tons figure. The value follows from Density and Volume needed. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Price per unit mass</strong> is a plain number. The value follows from Total cost and Weight needed. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Price per unit volume</strong> is a plain number. The value follows from Total cost and Volume needed. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total cost</strong> is a plain number. The value follows from Price per unit mass and Weight needed. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Area</th></tr></thead><tbody><tr><td><strong>Length</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Width</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Depth</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Volume needed</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Density</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Weight needed</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Price per unit mass</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Price per unit volume</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Total cost</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Width: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Depth, Volume needed and Density barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Soil actually offers.</p><ul><li><strong>square meters</strong> — 24 units. It opens in <em>m2</em>, and the chip also carries ac, m², ft², cm², in² and a. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>meters</strong> — 31 units. It opens in <em>m</em>, and the chip also carries in, m, ft, Å, nm and pm. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>cubic meters</strong> — 40 units. It opens in <em>m3</em>, and the chip also carries m³, cu ft, US fl oz, L, dm³ and cu in. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>kilograms per cubic meter</strong> — 28 units. It opens in <em>kgm3</em>, and the chip also carries µg/mL, g/L, mg/L, kg/m³, lb/cu ft and g/mL. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>metric tons</strong> — 27 units. It opens in <em>t</em>, and the chip also carries lb, mg, g, oz, t and ng. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Area is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover square meters, meters and cubic meters. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Length and Width is what you already know and Area and Depth is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/dog-raisin-toxicity">Dog raisin toxicity Calculator</a>, <a href="/biology/dog-size">Dog size Calculator</a> and <a href="/biology/dog-water-intake">Dog water intake Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Soil calculator work out?', 'a' => 'Area, Depth, Volume needed and Density, from Length and Width. The relationship is Area = Length × Width.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Length (meters), Width (meters). Enter length and width; Area is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Area, Width, Length and Depth blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Area = 1000 m2. Those are the defaults written into the form — move Length and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Area is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Length blank and the page solves for it, reporting Area instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Area keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dog-raisin-toxicity', 'name' => 'Dog raisin toxicity Calculator'],
            ['path' => '/biology/dog-size', 'name' => 'Dog size Calculator'],
            ['path' => '/biology/dog-water-intake', 'name' => 'Dog water intake Calculator'],
        ],
        'authors' => [],
    ],
];
