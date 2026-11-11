<?php

/**
 * Energy Use Intensity Calculator
 * /everyday-life/eui
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Energy Use Intensity Calculator',
    'meta' => ['title' => 'Energy Use Intensity — kWh a Square Metre a Year', 'description' => 'A building\'s energy use intensity: yearly consumption divided by floor area, set against a benchmark for its type, with the difference as a percentage.', 'h1' => 'Energy Use Intensity Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'kwh',
                    'label' => 'Energy used a year',
                    'type' => 'number',
                    'suffix' => 'kWh',
                    'default' => '15000',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area',
                    'label' => 'Floor area',
                    'type' => 'number',
                    'suffix' => 'm²',
                    'default' => '120',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'benchmark',
                    'label' => 'Typical for this kind of building',
                    'type' => 'select',
                    'options' => [
                        'Detached house, 110' => 110,
                        'Flat, 70' => 70,
                        'Terraced house, 95' => 95,
                        'Office, 130' => 130,
                        'School, 105' => 105,
                    ],
                    'control' => 'SELECT',
                    'default' => 'Detached house, 110',
                ],
                [
                    'name' => 'eui',
                    'label' => 'Energy use intensity',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kWh/m²',
                ],
                [
                    'name' => 'difference',
                    'label' => 'Against the benchmark',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'kwh_gap',
                    'label' => 'Yearly energy above or below',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kWh',
                ],
            ],
        ],
    ],
    'formula' => ['eui' => 'kwh / area', 'difference' => '(kwh / area - benchmark) / benchmark * 100', 'kwh_gap' => 'kwh - benchmark * area'],
    'article' => [
        'intro' => 'Energy use intensity, which is the number energy certificates are built on: kilowatt-hours a year for every square metre of floor.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Energy use intensity is the only fair way to compare two homes. A large house always uses more than a small one, so the meter reading says nothing about whether it is efficient; the same reading divided by floor area says everything.</p><p>The benchmark line is the number to look at. A house at 125 against a typical 110 is fourteen per cent above the norm, which is a draught, a boiler or a habit, and each of them is findable.</p><p>The answer is <strong>energy use intensity and against the benchmark and yearly energy above or below</strong>, worked out from energy used a year and floor area and typical for this kind of building. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>eui</strong></td><td><code>Energy used a year ÷ Floor area</code></td></tr><tr><td><strong>difference</strong></td><td><code>(Energy used a year ÷ Floor area - Typical for this kind of building) ÷ Typical for this kind of building × 100</code></td></tr><tr><td><strong>kwh_gap</strong></td><td><code>Energy used a year - Typical for this kind of building × Floor area</code></td></tr></tbody></table><p>Annual kilowatt-hours divided by floor area gives the intensity. The difference is the same figure against the benchmark as a percentage, and the energy line is the gap multiplied back by the area.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports energy use intensity and against the benchmark and yearly energy above or below.</p><ul><li><strong>Energy used a year</strong> — kWh.</li><li><strong>Floor area</strong> — m².</li><li><strong>Typical for this kind of building</strong>. A choice: Detached house, 110, Flat, 70, Terraced house, 95, Office, 130, School, 105.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Energy use intensity</strong> — kWh/m².</li><li><strong>Against the benchmark</strong> — %.</li><li><strong>Yearly energy above or below</strong> — kWh.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put energy used a year = 15 000 kWh, floor area = 120 m², typical for this kind of building = 110 into the form and the panel reads:</p><ul><li><strong>Energy use intensity</strong> = <code>Energy used a year ÷ Floor area</code> = <strong>125 kWh/m²</strong></li><li><strong>Against the benchmark</strong> = <code>(Energy used a year ÷ Floor area - Typical for this kind of building) ÷ Typical for this kind of building × 100</code> = <strong>13.636 %</strong></li><li><strong>Yearly energy above or below</strong> = <code>Energy used a year - Typical for this kind of building × Floor area</code> = <strong>1 800 kWh</strong></li></ul><p>The energy-gap line is the one that turns a percentage into a bill: 1 800 kWh is what the difference costs at your tariff.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>15 000 ÷ 120</code>, which comes to <strong>125 kWh/m²</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>15 000 kWh a year in 120 square metres is 125 kWh per square metre. Against a 110 benchmark that is 13.6 per cent above, which is 1 800 kWh a year, or about 270 dollars.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Energy use intensity</th><th>Against the benchmark</th><th>Yearly energy above or below</th></tr></thead><tbody><tr><td><strong>Energy used a year</strong> +10 %</td><td>+10 %</td><td>+83.33 %</td><td>+83.33 %</td></tr><tr><td><strong>Floor area</strong> +10 %</td><td>−9.09 %</td><td>−75.76 %</td><td>−73.33 %</td></tr><tr><td><strong>Typical for this kind of building</strong> +10 %</td><td>+0 %</td><td>−75.76 %</td><td>−73.33 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Energy used a year</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Energy used a year</strong> opens at 15 000 kWh</li><li><strong>Floor area</strong> opens at 120 m²</li><li><strong>Typical for this kind of building</strong> opens at 110</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Energy used a year</th><th>Energy use intensity</th><th>Against the benchmark</th><th>Yearly energy above or below</th></tr></thead><tbody><tr><td>7 500 kWh</td><td>62.5</td><td>-43.182</td><td>-5 700</td></tr><tr><td>15 000 kWh</td><td>125</td><td>13.636</td><td>1 800</td></tr><tr><td>30 000 kWh</td><td>250</td><td>127.273</td><td>16 800</td></tr><tr><td>75 000 kWh</td><td>625</td><td>468.182</td><td>61 800</td></tr><tr><td>150 000 kWh</td><td>1 250</td><td>1 036.364</td><td>136 800</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set energy used a year = 8 400, floor area = 120, typical for this kind of building = 70: <strong>Energy use intensity</strong> = 70 kWh/m², <strong>Against the benchmark</strong> = 0 %, <strong>Yearly energy above or below</strong> = 0 kWh. A flat's consumption in a house's floor area reads 70 against a flat benchmark of 70: the type has to match the building.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Comparing houses of different sizes.</strong> Two meters is all this figure is for; raw consumption only compares similar homes.</li><li><strong>Forgetting what is counted.</strong> The figure depends on whether the number is electricity only or all fuels, and the two are not interchangeable.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One fuel or all.</strong> The box takes whatever total you type, so put every fuel in the same unit before dividing.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need energy used a year and floor area and typical for this kind of building. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Energy use intensity and against the benchmark and yearly energy above or below should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Comparing a house with the norm for its type.</li></li><li><li>Tracking a building's consumption after a retrofit.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/appliance-wattage">Appliance wattage</a> <a href="/everyday-life/electricity-cost">Electricity cost</a> <a href="/everyday-life/led-savings">LED savings</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Energy used a year</strong> ×10</td><td>125</td><td>1 250</td><td>ten times larger</td></tr><tr><td><strong>Floor area</strong> ×10</td><td>125</td><td>12.5</td><td>ten times smaller</td></tr><tr><td><strong>Typical for this kind of building</strong> ×10</td><td>125</td><td>125</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Energy Use Intensity calculator work out?', 'a' => <<<'TXT'
            It returns energy use intensity and against the benchmark and yearly energy above or below from energy used a year and floor area and typical for this kind of building. The relationship is Energy used a year ÷ Floor area.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Energy used a year (kWh), Floor area (m²), Typical for this kind of building. Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: energy used a year in kWh; floor area in m². The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What counts as floor area?', 'a' => 'Heated floor area, measured inside the walls, is the usual convention. Garages and outbuildings are excluded.'],
            ['q' => 'Why is a flat\'s benchmark lower?', 'a' => 'Because a flat has neighbours on two sides and a roof above somebody else\'s ceiling, so it loses less heat.'],
            ['q' => 'Does this replace an energy certificate?', 'a' => 'No. A certificate models the building; this measures what it actually used, and the two often disagree.'],
        ],
        'related' => [
            ['path' => '/everyday-life/appliance-wattage', 'name' => 'Appliance wattage'],
            ['path' => '/everyday-life/electricity-cost', 'name' => 'Electricity cost'],
            ['path' => '/everyday-life/led-savings', 'name' => 'LED savings'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
