<?php

/**
 * Gas to Oil Ratio Calculator
 * /everyday-life/gas-oil-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Gas to Oil Ratio Calculator',
    'meta' => ['title' => 'Gas to Oil Ratio — Two-Stroke Mix in Millilitres', 'description' => 'Litres of petrol and a mix ratio give the oil to add, in millilitres and fluid ounces, and the total volume in the can, for a saw, strimmer or outboard.', 'h1' => 'Gas to Oil Ratio Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'fuel_l',
                    'label' => 'Petrol',
                    'type' => 'number',
                    'suffix' => 'L',
                    'default' => '5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'ratio',
                    'label' => 'Mix ratio',
                    'type' => 'select',
                    'options' => ['50:1 — modern saws and strimmers' => 50, '40:1 — older two-strokes' => 40, '32:1 — small outboards and blowers' => 32, '16:1 — very old machines' => 16],
                    'control' => 'SELECT',
                    'default' => '50:1 — modern saws and strimmers',
                ],
                [
                    'name' => 'oil_ml',
                    'label' => 'Oil to add',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ml',
                ],
                [
                    'name' => 'oil_oz',
                    'label' => 'Oil to add',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'fl oz',
                ],
                [
                    'name' => 'mix_l',
                    'label' => 'Total in the can',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'L',
                ],
                [
                    'name' => 'oil_pct',
                    'label' => 'Oil share',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
            ],
        ],
    ],
    'formula' => ['oil_ml' => 'fuel_l * 1000 / ratio', 'oil_oz' => 'fuel_l * 1000 / ratio / 29.5735', 'mix_l' => 'fuel_l + fuel_l / ratio', 'oil_pct' => '100 / (ratio + 1)'],
    'article' => [
        'intro' => 'The oil a two-stroke mix needs for a given amount of petrol at 50:1, 40:1, 32:1 or 16:1, in millilitres and fluid ounces, with the total volume after mixing.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Two-stroke engines have no sump, so the oil goes in the petrol and the ratio is the whole lubrication system. Fifty to one means fifty parts petrol to one part oil, and five litres of petrol needs a hundred millilitres.</p><p>The trap is that the ratio is not a percentage. One part in fifty is two per cent of the total, one in sixteen is nearly six, and pouring "a bit extra in for safety" makes the engine run lean at the top end and foul the plug at the bottom.</p><p>The answer is <strong>oil to add and oil to add and total in the can and oil share</strong>, worked out from petrol and mix ratio. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>oil_ml</strong></td><td><code>Petrol × 1000 ÷ Mix ratio</code></td></tr><tr><td><strong>oil_oz</strong></td><td><code>Petrol × 1000 ÷ Mix ratio ÷ 29.5735</code></td></tr><tr><td><strong>mix_l</strong></td><td><code>Petrol + Petrol ÷ Mix ratio</code></td></tr><tr><td><strong>oil_pct</strong></td><td><code>100 ÷ (Mix ratio + 1)</code></td></tr></tbody></table><p>Litres times a thousand gives millilitres of petrol, divided by the ratio for the oil. The total volume is the petrol plus the oil, which is where the difference between parts and percent shows up.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports oil to add and oil to add and total in the can and oil share.</p><ul><li><strong>Petrol</strong> — L.</li><li><strong>Mix ratio</strong>. A choice: 50:1 — modern saws and strimmers, 40:1 — older two-strokes, 32:1 — small outboards and blowers, 16:1 — very old machines.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Oil to add</strong> — ml.</li><li><strong>Oil to add</strong> — fl oz.</li><li><strong>Total in the can</strong> — L.</li><li><strong>Oil share</strong> — %.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put petrol = 5 L, mix ratio = 50 into the form and the panel reads:</p><ul><li><strong>Oil to add</strong> = <code>Petrol × 1000 ÷ Mix ratio</code> = <strong>100 ml</strong></li><li><strong>Oil to add</strong> = <code>Petrol × 1000 ÷ Mix ratio ÷ 29.5735</code> = <strong>3.381 fl oz</strong></li><li><strong>Total in the can</strong> = <code>Petrol + Petrol ÷ Mix ratio</code> = <strong>5.1 L</strong></li><li><strong>Oil share</strong> = <code>100 ÷ (Mix ratio + 1)</code> = <strong>1.961 %</strong></li></ul><p>The same five litres at 16:1 takes 312.5 millilitres and the can holds 5.31 litres — three times the oil for the same petrol.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>5 × 1000 ÷ 50</code>, which comes to <strong>100 ml</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>Five litres at 50:1 takes 100 millilitres of oil, 3.38 fluid ounces, and the can then holds 5.1 litres. The oil is 1.96 per cent of the total.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Oil to add</th><th>Oil to add</th><th>Total in the can</th><th>Oil share</th></tr></thead><tbody><tr><td><strong>Petrol</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Mix ratio</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−0.18 %</td><td>−8.93 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Petrol</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Petrol</strong> opens at 5 L</li><li><strong>Mix ratio</strong> opens at 50</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Petrol</th><th>Oil to add</th><th>Oil to add</th><th>Total in the can</th><th>Oil share</th></tr></thead><tbody><tr><td>2.5 L</td><td>50</td><td>1.691</td><td>2.55</td><td>1.961</td></tr><tr><td>5 L</td><td>100</td><td>3.381</td><td>5.1</td><td>1.961</td></tr><tr><td>10 L</td><td>200</td><td>6.763</td><td>10.2</td><td>1.961</td></tr><tr><td>25 L</td><td>500</td><td>16.907</td><td>25.5</td><td>1.961</td></tr><tr><td>50 L</td><td>1 000</td><td>33.814</td><td>51</td><td>1.961</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set petrol = 5, mix ratio = 16: <strong>Oil to add</strong> = 312.5 ml, <strong>Oil to add</strong> = 10.567 fl oz, <strong>Total in the can</strong> = 5.312 L, <strong>Oil share</strong> = 5.882 %. At 16:1 or 6.25 per cent, five litres takes 312.5 millilitres of oil, which is a third of a small bottle.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Mixing by eye.</strong> A splash in a can is anywhere from 30:1 to 100:1, and both ends are bad. Measure the oil with the bottle's own gauge or a measuring jug.</li><li><strong>Using four-stroke oil.</strong> It does not stay mixed and does not lubricate a crankcase-less engine. Two-stroke oil, and preferably the semi-synthetic that suits the machine.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Ratio only.</strong> Fuel going stale in the can matters more than a few millilitres of oil; mixed fuel is best used within a month or two.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need petrol and mix ratio. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Oil to add and oil to add and total in the can and oil share should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Mixing a can for a chainsaw or strimmer.</li></li><li><li>Checking a ratio after buying a new machine with different instructions.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/fuel-distance">Fuel for a budget</a> <a href="/everyday-life/mpg">MPG calculator</a> <a href="/conversion/gallon">Gallons and litres</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Petrol</strong> ×10</td><td>100</td><td>1 000</td><td>ten times larger</td></tr><tr><td><strong>Mix ratio</strong> ×10</td><td>100</td><td>10</td><td>ten times smaller</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Gas to Oil Ratio calculator work out?', 'a' => 'It returns oil to add and oil to add and total in the can and oil share from petrol and mix ratio. The relationship is Petrol × 1000 ÷ Mix ratio.'],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Petrol (L), Mix ratio. Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: petrol in L. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Is 50:1 the same as 2 per cent?', 'a' => <<<'TXT'
            Roughly: one part in fifty plus the oil is 1.96 per cent of the total. Oil bottles sometimes label 2 per cent as 50:1, and the difference is within a rounding error on a five-litre can.
            TXT],
            ['q' => 'What happens if I use too much oil?', 'a' => 'A smoky exhaust, a fouled plug and carbon on the piston. The engine also runs a little leaner because oil displaces petrol, and lean is the dangerous direction.'],
            ['q' => 'Can I mix different two-stroke oils?', 'a' => <<<'TXT'
            Within a tank it does no harm if they are the same specification. Mixing mineral and synthetic of unknown type is how an engine ends up with jelly in the carburettor.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/fuel-distance', 'name' => 'Fuel for a budget'],
            ['path' => '/everyday-life/mpg', 'name' => 'MPG calculator'],
            ['path' => '/conversion/gallon', 'name' => 'Gallons and litres'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
