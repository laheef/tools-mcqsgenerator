<?php

/**
 * Roll Length Calculator
 * /everyday-life/roll-length
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Roll Length Calculator',
    'meta' => ['title' => 'Roll Length — How Much Is Wound on the Roll', 'description' => 'Outer diameter, core diameter and thickness give the length wound on a roll: the spiral arithmetic behind tape, paper, fabric and cling film on a roll.', 'h1' => 'Roll Length Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'outer_mm',
                    'label' => 'Outer diameter',
                    'type' => 'number',
                    'suffix' => 'mm',
                    'default' => '200',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'core_mm',
                    'label' => 'Core diameter',
                    'type' => 'number',
                    'suffix' => 'mm',
                    'default' => '40',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'thickness',
                    'label' => 'Material thickness',
                    'type' => 'number',
                    'suffix' => 'mm',
                    'default' => '0.3',
                    'help' => 'A sheet of paper is about 0.1 mm, card 0.3, and tape on a roll is measured on the backing rather than the adhesive.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'turns',
                    'label' => 'Turns on the roll',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'turns',
                ],
                [
                    'name' => 'length_m',
                    'label' => 'Length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm',
                ],
                [
                    'name' => 'length_ft',
                    'label' => 'Length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'length_yd',
                    'label' => 'Length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd',
                ],
            ],
        ],
    ],
    'formula' => ['turns' => '(outer_mm / 2 - core_mm / 2) / thickness', 'length_m' => 'pi * ((outer_mm / 2) * (outer_mm / 2) - (core_mm / 2) * (core_mm / 2)) / thickness / 1000', 'length_ft' => 'pi * ((outer_mm / 2) * (outer_mm / 2) - (core_mm / 2) * (core_mm / 2)) / thickness / 304.8', 'length_yd' => 'pi * ((outer_mm / 2) * (outer_mm / 2) - (core_mm / 2) * (core_mm / 2)) / thickness / 914.4'],
    'article' => [
        'intro' => 'The length of material wound on a roll from its outer diameter, core diameter and thickness, with the number of turns and the same length in feet and yards.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A roll is a spiral, and the length is the area of the annulus divided by the thickness. The outer radius squared minus the core radius squared, times π, over the thickness — which is exact if the material has no air in it.</p><p>A 200-millimetre roll on a 40-millimetre core of 0.3-millimetre paper has a radius of 80 millimetres of winding, 267 turns, and 100.5 metres of paper. That is the figure the box does not give and the one you need to know whether you have enough.</p><p>The answer is <strong>turns on the roll and length and length and length</strong>, worked out from outer diameter and core diameter and material thickness. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>turns</strong></td><td><code>(Outer diameter ÷ 2 - Core diameter ÷ 2) ÷ Material thickness</code></td></tr><tr><td><strong>length_m</strong></td><td><code>pi × ((Outer diameter ÷ 2) × (Outer diameter ÷ 2) - (Core diameter ÷ 2) × (Core diameter ÷ 2)) ÷ Material thickness ÷ 1000</code></td></tr><tr><td><strong>length_ft</strong></td><td><code>pi × ((Outer diameter ÷ 2) × (Outer diameter ÷ 2) - (Core diameter ÷ 2) × (Core diameter ÷ 2)) ÷ Material thickness ÷ 304.8</code></td></tr><tr><td><strong>length_yd</strong></td><td><code>pi × ((Outer diameter ÷ 2) × (Outer diameter ÷ 2) - (Core diameter ÷ 2) × (Core diameter ÷ 2)) ÷ Material thickness ÷ 914.4</code></td></tr></tbody></table><p>Half the outer diameter minus half the core diameter, divided by the thickness, gives the number of turns. The length is π times the difference of the squared radii over the thickness, converted from millimetres to metres, feet or yards.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports turns on the roll and length and length and length.</p><ul><li><strong>Outer diameter</strong> — mm.</li><li><strong>Core diameter</strong> — mm.</li><li><strong>Material thickness</strong> — mm. A sheet of paper is about 0.1 mm, card 0.3, and tape on a roll is measured on the backing rather than the adhesive.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Turns on the roll</strong> — turns.</li><li><strong>Length</strong> — m.</li><li><strong>Length</strong> — ft.</li><li><strong>Length</strong> — yd.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put outer diameter = 200 mm, core diameter = 40 mm, material thickness = 0.3 mm into the form and the panel reads:</p><ul><li><strong>Turns on the roll</strong> = <code>(Outer diameter ÷ 2 - Core diameter ÷ 2) ÷ Material thickness</code> = <strong>266.667 turns</strong></li><li><strong>Length</strong> = <code>pi × ((Outer diameter ÷ 2) × (Outer diameter ÷ 2) - (Core diameter ÷ 2) × (Core diameter ÷ 2)) ÷ Material thickness ÷ 1000</code> = <strong>100.531 m</strong></li><li><strong>Length</strong> = <code>pi × ((Outer diameter ÷ 2) × (Outer diameter ÷ 2) - (Core diameter ÷ 2) × (Core diameter ÷ 2)) ÷ Material thickness ÷ 304.8</code> = <strong>329.826 ft</strong></li><li><strong>Length</strong> = <code>pi × ((Outer diameter ÷ 2) × (Outer diameter ÷ 2) - (Core diameter ÷ 2) × (Core diameter ÷ 2)) ÷ Material thickness ÷ 914.4</code> = <strong>109.942 yd</strong></li></ul><p>Halve the thickness and the roll holds twice the length, because the same annulus is filled with twice as many turns. The diameter tells you nothing without the thickness.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>(200 ÷ 2 - 40 ÷ 2) ÷ 0.3</code>, which comes to <strong>266.667 turns</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>A 200 mm roll on a 40 mm core of 0.3 mm material has 266.7 turns and 100.53 metres — 329.8 feet or 109.9 yards.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Turns on the roll</th><th>Length</th><th>Length</th><th>Length</th></tr></thead><tbody><tr><td><strong>Outer diameter</strong> +10 %</td><td>+12.5 %</td><td>+21.88 %</td><td>+21.88 %</td><td>+21.88 %</td></tr><tr><td><strong>Core diameter</strong> +10 %</td><td>−2.5 %</td><td>−0.88 %</td><td>−0.87 %</td><td>−0.87 %</td></tr><tr><td><strong>Material thickness</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Outer diameter</strong>. <strong>Core diameter</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Outer diameter</strong> opens at 200 mm</li><li><strong>Core diameter</strong> opens at 40 mm</li><li><strong>Material thickness</strong> opens at 0.3 mm — A sheet of paper is about 0.1 mm, card 0.3, and tape on a roll is measured on the backing rather than the adhesive.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Outer diameter</th><th>Turns on the roll</th><th>Length</th><th>Length</th><th>Length</th></tr></thead><tbody><tr><td>100 mm</td><td>100</td><td>21.991</td><td>72.149</td><td>24.05</td></tr><tr><td>200 mm</td><td>266.667</td><td>100.531</td><td>329.826</td><td>109.942</td></tr><tr><td>400 mm</td><td>600</td><td>414.69</td><td>1 360.532</td><td>453.511</td></tr><tr><td>1 000 mm</td><td>1 600</td><td>2 613.805</td><td>8 575.476</td><td>2 858.492</td></tr><tr><td>2 000 mm</td><td>3 266.667</td><td>10 467.787</td><td>34 343.132</td><td>11 447.711</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set outer diameter = 200, core diameter = 40, material thickness = 0.2: <strong>Turns on the roll</strong> = 400 turns, <strong>Length</strong> = 150.796 m, <strong>Length</strong> = 494.739 ft, <strong>Length</strong> = 164.913 yd. At 0.2 mm the same roll has 400 turns and 150.8 metres — half the thickness, a third more length than 0.3 to 0.2 suggests, because the arithmetic is a division.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Measuring the core from outside.</strong> The core's outside diameter is where the winding starts, which is what the formula wants; its inside diameter is the tube you can see through.</li><li><strong>Assuming the length varies with the diameter.</strong> Doubling the diameter quadruples the area, so a roll twice as thick across has four times the material minus the core. Length follows area, not diameter.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No air, no stretch.</strong> Fabric, foam and anything that compresses winds with air in it, and the real length is longer than the geometry says. Tape and paper come out close.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need outer diameter and core diameter and material thickness. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Turns on the roll and length and length and length should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Estimating how much tape or paper is left on a partly used roll.</li></li><li><li>Working out the length on a label roll before pricing a print job.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/paper-thickness">Paper thickness</a> <a href="/everyday-life/toilet-paper-tariff">Toilet paper price</a> <a href="/everyday-life/price-per-linear-foot">Price per linear foot</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Outer diameter</strong> ×10</td><td>266.667</td><td>3 266.667</td><td>×12.25</td></tr><tr><td><strong>Core diameter</strong> ×10</td><td>266.667</td><td>-333.333</td><td>×-1.25</td></tr><tr><td><strong>Material thickness</strong> ×10</td><td>266.667</td><td>26.667</td><td>ten times smaller</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Roll Length calculator work out?', 'a' => <<<'TXT'
            It returns turns on the roll and length and length and length from outer diameter and core diameter and material thickness. The relationship is (Outer diameter ÷ 2 - Core diameter ÷ 2) ÷ Material thickness.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Outer diameter (mm), Core diameter (mm), Material thickness (mm). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: outer diameter in mm; core diameter in mm; material thickness in mm. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why divide the area by the thickness?', 'a' => <<<'TXT'
            Because the material is a long rectangle of width times length rolled into a spiral. Seen end-on, that rectangle is the area of the annulus, and length is area over thickness.
            TXT],
            ['q' => 'Does the number of turns multiply the length?', 'a' => 'The average turn is the circumference at the mid-radius, so length is that times the turns. It gives the same answer as the area method and less elegantly.'],
            ['q' => 'Why is the answer wrong for cling film?', 'a' => 'Because the film stretches and traps air between layers. The geometry gives the volume of the roll, and the real length on it is thirty to fifty per cent more.'],
        ],
        'related' => [
            ['path' => '/everyday-life/paper-thickness', 'name' => 'Paper thickness'],
            ['path' => '/everyday-life/toilet-paper-tariff', 'name' => 'Toilet paper price'],
            ['path' => '/everyday-life/price-per-linear-foot', 'name' => 'Price per linear foot'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
