<?php

/**
 * Acres per hour
 * /biology/acres-per-hour
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Acres per hour',
    'meta' => ['title' => 'Acres per hour Calculator — Formula & Results', 'description' => 'Acres per hour works out area per hour and time to complete and reports both. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Acres per hour Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tool_width',
                            'label' => 'Tool\'s width',
                            'type' => 'number',
                            'help' => 'Width of your mower, plow, seeder, etc.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'speed',
                            'label' => 'Speed',
                            'type' => 'number',
                            'unit' => '32',
                            'unit_default' => 'kmph',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area_per_hour',
                            'label' => 'Area per hour',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'hectare',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Mowing time',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Plot area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'hectare',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time',
                            'label' => 'Time to complete',
                            'type' => 'number',
                            'help' => 'The time to complete for chosen plot area. It is a rough estimation as the plot may have different shapes.',
                            'unit' => '19',
                            'unit_default' => 'hrsmin',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Overlapping area',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'overlap',
                            'label' => 'Overlap',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'time = area / (area_per_hour/3600)',
            'results' => ['area_per_hour' => '3600*area/time', 'area' => '(1/3600)*area_per_hour*time', 'time' => '3600*area/area_per_hour'],
        ],
        [
            'title' => 'area_per_hour = speed * tool_width * (1 - overlap) * 3600',
            'results' => ['speed' => '-1/3600*area_per_hour/(tool_width*(overlap - 1))', 'overlap' => '-1/3600*area_per_hour/(speed*tool_width) + 1', 'area_per_hour' => '3600*speed*tool_width*(1 - overlap)', 'tool_width' => '-1/3600*area_per_hour/(speed*(overlap - 1))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Acres per hour works out Tool's width and Speed from Area per hour and Plot area. Nothing is looked up on this page: tool's width is computed from area per hour and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Tool's width is opened in centimeters; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Acres per hour calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Acres per hour: it takes 2 numbers and reports Tool&#039;s width, Speed and Time to complete.</p><p>In the form&#039;s own words, Time to complete = 3600 × Plot area ÷ Area per hour.</p><p>The result panel carries Tool&#039;s width, Speed, Time to complete and Overlap, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Area per hour</strong> — in hectares</li><li><strong>Plot area</strong> — in hectares</li></ul><p>The answers come back as Tool&#039;s width in centimeters, Speed in kilometers per hour, Time to complete in hours / minutes, Overlap in percent. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Tool&amp;#039;s width = 10 cm, Speed = 100 kmph, Plot area = 1000 hectare, Time to complete = 10 hrsmin and Overlap = 10 perc — through the same formula and the panel reports <strong>Area per hour</strong> = 360000 hectare.</p><ul><li><strong>Area per hour</strong> = 360000 hectare</li></ul><p>The line behind those figures is <strong>Time to complete</strong> = <code>3600 × Plot area ÷ Area per hour</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Area per hour</strong> = 360000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Tool&#039;s width lists 31 options and opens on centimeters. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Time to complete</strong> = <code>3600 × Plot area ÷ Area per hour</code></li><li><strong>Area per hour</strong> = <code>3600 × Plot area ÷ Time to complete</code></li><li><strong>Plot area</strong> = <code>(1 ÷ 3600) × Area per hour × Time to complete</code></li><li><strong>Speed</strong> = <code>− 1 ÷ 3600 × Area per hour ÷ (Tool&#039;s width × (Overlap − 1))</code></li><li><strong>Overlap</strong> = <code>− 1 ÷ 3600 × Area per hour ÷ (Speed × Tool&#039;s width) + 1</code></li><li><strong>Tool&#039;s width</strong> = <code>− 1 ÷ 3600 × Area per hour ÷ (Speed × (Overlap − 1))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Time to complete</strong> = <code>3600 × Plot area ÷ Area per hour</code> — the form to use when Plot area and Area per hour are the values you have.</li><li><strong>Area per hour</strong> = <code>3600 × Plot area ÷ Time to complete</code> — the form to use when Plot area and Time to complete are the values you have.</li><li><strong>Plot area</strong> = <code>(1 ÷ 3600) × Area per hour × Time to complete</code> — the form to use when Area per hour and Time to complete are the values you have.</li><li><strong>Area per hour</strong> = <code>3600 × Speed × Tool&#039;s width × (1 − Overlap)</code> — the form to use when Speed, Tool&#039;s width and Overlap are the values you have.</li><li><strong>Speed</strong> = <code>− 1 ÷ 3600 × Area per hour ÷ (Tool&#039;s width × (Overlap − 1))</code> — the form to use when Area per hour, Tool&#039;s width and Overlap are the values you have.</li><li><strong>Overlap</strong> = <code>− 1 ÷ 3600 × Area per hour ÷ (Speed × Tool&#039;s width) + 1</code> — the form to use when Area per hour, Speed and Tool&#039;s width are the values you have.</li><li><strong>Tool&#039;s width</strong> = <code>− 1 ÷ 3600 × Area per hour ÷ (Speed × (Overlap − 1))</code> — the form to use when Area per hour, Speed and Overlap are the values you have.</li></ul><p>Any one of Time to complete, Area per hour and Plot area can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Tool&#039;s width, from 10 to 20 — and the answers go from <strong>Area per hour</strong> 360000 hectare to <strong>Area per hour</strong> 360000 hectare.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Area per hour and Plot area carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Tool&#039;s width, Speed and Time to complete are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Area per hour left as a guess.</strong> Anything typed into Area per hour is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Plot area left as a guess.</strong> Anything typed into Plot area is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Area per hour and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Area per hour</strong> is a hectares quantity: the page opens it in hectare and converts anything else you pick before the formula runs. The page reads it when it works out Plot area, Time to complete and Speed. Have it to hand before you start: Area per hour is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Plot area</strong> is a hectares quantity: the page opens it in hectare and converts anything else you pick before the formula runs. The page reads it when it works out Area per hour and Time to complete. Have it to hand before you start: Plot area is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Tool&#039;s width</strong> is a centimeters figure. It is worked out from Area per hour, Speed and Overlap. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Speed</strong> is a kilometers per hour figure. It is worked out from Area per hour, Tool's width and Overlap. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Time to complete</strong> is a hours / minutes figure. It is worked out from Plot area and Area per hour. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Overlap</strong> is a percent figure. It is worked out from Area per hour, Speed and Tool's width. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Area per hour</th></tr></thead><tbody><tr><td><strong>Tool&#039;s width</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Speed</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Plot area</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Time to complete</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Overlap</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Plot area: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Tool&#039;s width, Speed and Overlap barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Tool&#039;s width = 5 cm, Speed = 50 kmph, Plot area = 500 hectare, Time to complete = 5 hrsmin and Overlap = 5 perc, the answer is <strong>Area per hour</strong> = 360000 hectare.</li><li>With Tool&#039;s width = 30 cm, Speed = 100 kmph, Plot area = 1000 hectare, Time to complete = 10 hrsmin and Overlap = 10 perc, the answer is <strong>Area per hour</strong> = 360000 hectare.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>centimeters</strong> — 31 units. It opens in <em>cm</em>, and the chip also carries in, m, ft, Å, nm and pm. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>kilometers per hour</strong> — 24 units. It opens in <em>kmph</em>, and the chip also carries mph, ft/h, cm/h, mm/min, in/min and m/s. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>hours / minutes</strong> — 18 units. It opens in <em>hrsmin</em>, and the chip also carries yrs, min, 15 sec, days, wks and mos. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — 6 units. It opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>hectares</strong> — 24 units. It opens in <em>hectare</em>, and the chip also carries ac, m², ft², cm², in² and a. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Tool&#039;s width is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are centimeters, kilometers per hour and hours / minutes and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Area per hour and Plot area are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Area per hour and Plot area is what you already know and Tool&#039;s width and Speed is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/animal-mortality-rate">Animal mortality rate</a>, <a href="/biology/annealing-temperature">Annealing temperature Calculator</a> and <a href="/biology/aquarium-water-volume">Aquarium Water Volume Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Acres per hour calculator work out?', 'a' => 'Tool\'s width, Speed, Time to complete and Overlap, from Plot area and Area per hour. The relationship is Time to complete = 3600 × Plot area ÷ Area per hour.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Area per hour (hectares), Plot area (hectares). Enter area per hour and plot area; Tool\'s width is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Time to complete, Area per hour, Plot area and Speed blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Area per hour = 360000 hectare. Those are the defaults written into the form — move Area per hour and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Tool's width is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Area per hour left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Tool\'s width keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/animal-mortality-rate', 'name' => 'Animal mortality rate'],
            ['path' => '/biology/annealing-temperature', 'name' => 'Annealing temperature Calculator'],
            ['path' => '/biology/aquarium-water-volume', 'name' => 'Aquarium Water Volume Calculator'],
        ],
        'authors' => [],
    ],
];
