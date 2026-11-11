<?php

/**
 * Price per Acre Calculator
 * /everyday-life/price-per-acre
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Price per Acre Calculator',
    'meta' => ['title' => 'Price per Acre — Two Parcels Side by Side — Free Tool', 'description' => 'Two parcels, two prices: what an acre of each costs, the gap between them, and the same figures per square foot for the small plot. The formula is shown.', 'h1' => 'Price per Acre Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'cost_a',
                    'label' => 'Parcel A price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '210000',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'acres_a',
                    'label' => 'Parcel A size',
                    'type' => 'number',
                    'suffix' => 'acres',
                    'default' => '35',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cost_b',
                    'label' => 'Parcel B price',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '172000',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'acres_b',
                    'label' => 'Parcel B size',
                    'type' => 'number',
                    'suffix' => 'acres',
                    'default' => '28',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'unit_a',
                    'label' => 'Parcel A, per acre',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/acre',
                ],
                [
                    'name' => 'unit_b',
                    'label' => 'Parcel B, per acre',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/acre',
                ],
                [
                    'name' => 'diff',
                    'label' => 'B saves, per acre',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/acre',
                ],
                [
                    'name' => 'pct',
                    'label' => 'B saves',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'sqft_a',
                    'label' => 'Parcel A, per square foot',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/sq ft',
                ],
                [
                    'name' => 'sqft_b',
                    'label' => 'Parcel B, per square foot',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/sq ft',
                ],
            ],
        ],
    ],
    'formula' => [
        'unit_a' => 'cost_a / acres_a',
        'unit_b' => 'cost_b / acres_b',
        'diff' => 'cost_a / acres_a - cost_b / acres_b',
        'pct' => '(cost_a / acres_a - cost_b / acres_b) / (cost_a / acres_a) * 100',
        'sqft_a' => 'cost_a / acres_a / 43560',
        'sqft_b' => 'cost_b / acres_b / 43560',
    ],
    'article' => [
        'intro' => 'The price of an acre of each of two parcels, the difference per acre, and the price per square foot, which is the unit small plots and building lots use.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Land is advertised by the acre and priced by the parcel, and the two figures come from different people. Thirty-five acres at 210 000 is 6 000 an acre; twenty-eight acres at 172 000 is 6 143, so the smaller parcel is the dearer one by 143 an acre.</p><p>Per square foot the numbers turn small and stop being intuitive, which is why they matter: 13.8 cents a square foot is a sentence a builder can use, and 6 000 an acre is not.</p><p>The answer is <strong>parcel A, per acre and parcel B, per acre and b saves, per acre and b saves and parcel A, per square foot and parcel B, per square foot</strong>, worked out from parcel A price and parcel A size and parcel B price and parcel B size. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>unit_a</strong></td><td><code>Parcel A price ÷ Parcel A size</code></td></tr><tr><td><strong>unit_b</strong></td><td><code>Parcel B price ÷ Parcel B size</code></td></tr><tr><td><strong>diff</strong></td><td><code>Parcel A price ÷ Parcel A size - Parcel B price ÷ Parcel B size</code></td></tr><tr><td><strong>pct</strong></td><td><code>(Parcel A price ÷ Parcel A size - Parcel B price ÷ Parcel B size) ÷ (Parcel A price ÷ Parcel A size) × 100</code></td></tr><tr><td><strong>sqft_a</strong></td><td><code>Parcel A price ÷ Parcel A size ÷ 43560</code></td></tr><tr><td><strong>sqft_b</strong></td><td><code>Parcel B price ÷ Parcel B size ÷ 43560</code></td></tr></tbody></table><p>Price over acres for the acre price. The square-foot figure is that price divided by 43 560, the number of square feet in an acre — an acre is a chain by a furlong, 66 by 660 feet.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports parcel A, per acre and parcel B, per acre and b saves, per acre and b saves and parcel A, per square foot and parcel B, per square foot.</p><ul><li><strong>Parcel A price</strong> — $.</li><li><strong>Parcel A size</strong> — acres.</li><li><strong>Parcel B price</strong> — $.</li><li><strong>Parcel B size</strong> — acres.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Parcel A, per acre</strong> — $/acre.</li><li><strong>Parcel B, per acre</strong> — $/acre.</li><li><strong>B saves, per acre</strong> — $/acre.</li><li><strong>B saves</strong> — %.</li><li><strong>Parcel A, per square foot</strong> — $/sq ft.</li><li><strong>Parcel B, per square foot</strong> — $/sq ft.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put parcel A price = 210 000 $, parcel A size = 35 acres, parcel B price = 172 000 $, parcel B size = 28 acres into the form and the panel reads:</p><ul><li><strong>Parcel A, per acre</strong> = <code>Parcel A price ÷ Parcel A size</code> = <strong>6 000 $/acre</strong></li><li><strong>Parcel B, per acre</strong> = <code>Parcel B price ÷ Parcel B size</code> = <strong>6 142.857 $/acre</strong></li><li><strong>B saves, per acre</strong> = <code>Parcel A price ÷ Parcel A size - Parcel B price ÷ Parcel B size</code> = <strong>-142.857 $/acre</strong></li><li><strong>B saves</strong> = <code>(Parcel A price ÷ Parcel A size - Parcel B price ÷ Parcel B size) ÷ (Parcel A price ÷ Parcel A size) × 100</code> = <strong>-2.381 %</strong></li><li><strong>Parcel A, per square foot</strong> = <code>Parcel A price ÷ Parcel A size ÷ 43560</code> = <strong>0.138 $/sq ft</strong></li><li><strong>Parcel B, per square foot</strong> = <code>Parcel B price ÷ Parcel B size ÷ 43560</code> = <strong>0.141 $/sq ft</strong></li></ul><p>Negative percentages mean the second parcel costs more. On land the reason is usually access, drainage or a boundary that is not where the map says.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>210 000 ÷ 35</code>, which comes to <strong>6 000 $/acre</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>35 acres at 210 000 is 6 000 an acre and 13.8 cents a square foot; 28 acres at 172 000 is 6 142.86 an acre and 14.1 cents, so B is 2.4 per cent dearer per acre.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Parcel A, per acre</th><th>Parcel B, per acre</th><th>B saves, per acre</th><th>B saves</th><th>Parcel A, per square foot</th><th>Parcel B, per square foot</th></tr></thead><tbody><tr><td><strong>Parcel A price</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+420 %</td><td>+390.91 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Parcel A size</strong> +10 %</td><td>−9.09 %</td><td>+0 %</td><td>−381.82 %</td><td>−430 %</td><td>−9.09 %</td><td>+0 %</td></tr><tr><td><strong>Parcel B price</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>−430 %</td><td>−430 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Parcel B size</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>+390.91 %</td><td>+390.91 %</td><td>+0 %</td><td>−9.09 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Parcel B price</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Parcel A price</strong> opens at 210 000 $</li><li><strong>Parcel A size</strong> opens at 35 acres</li><li><strong>Parcel B price</strong> opens at 172 000 $</li><li><strong>Parcel B size</strong> opens at 28 acres</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Parcel A price</th><th>Parcel A, per acre</th><th>Parcel B, per acre</th><th>B saves, per acre</th><th>B saves</th><th>Parcel A, per square foot</th><th>Parcel B, per square foot</th></tr></thead><tbody><tr><td>105 000 $</td><td>3 000</td><td>6 142.857</td><td>-3 142.857</td><td>-104.762</td><td>0.069</td><td>0.141</td></tr><tr><td>210 000 $</td><td>6 000</td><td>6 142.857</td><td>-142.857</td><td>-2.381</td><td>0.138</td><td>0.141</td></tr><tr><td>420 000 $</td><td>12 000</td><td>6 142.857</td><td>5 857.143</td><td>48.81</td><td>0.275</td><td>0.141</td></tr><tr><td>1.05 × 10<sup>6</sup> $</td><td>30 000</td><td>6 142.857</td><td>23 857.143</td><td>79.524</td><td>0.689</td><td>0.141</td></tr><tr><td>2.1 × 10<sup>6</sup> $</td><td>60 000</td><td>6 142.857</td><td>53 857.143</td><td>89.762</td><td>1.377</td><td>0.141</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set parcel A price = 210 000, parcel A size = 35, parcel B price = 172 000, parcel B size = 24: <strong>Parcel A, per acre</strong> = 6 000 $/acre, <strong>Parcel B, per acre</strong> = 7 166.667 $/acre, <strong>B saves, per acre</strong> = -1 166.667 $/acre, <strong>B saves</strong> = -19.444 %, <strong>Parcel A, per square foot</strong> = 0.138 $/sq ft, <strong>Parcel B, per square foot</strong> = 0.165 $/sq ft. Twenty-four acres at 172 000 is 7 166.67 an acre, so the parcel that looked cheaper is nineteen per cent dearer on the acre.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Buying the acre count instead of the usable acre.</strong> A forty-acre parcel crossed by a stream can have thirty dry acres. Compare the price per usable acre if you know them.</li><li><strong>Mixing acres with hectares.</strong> A hectare is 2.471 acres, so a price per hectare looks 2.5 times a price per acre for the same land. Check which unit the agent quoted.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Price only.</strong> Survey, tax, fencing and access costs are separate, and on small parcels they can be a quarter of the total.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need parcel A price and parcel A size and parcel B price and parcel B size. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Parcel a, per acre and parcel b, per acre and b saves, per acre and b saves and parcel a, per square foot and parcel b, per square foot should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Comparing two listings before a viewing.</li></li><li><li>Checking an agent's arithmetic on a price per acre.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/price-per-square-inch">Price per square inch</a> <a href="/everyday-life/price-per-linear-foot">Price per linear foot</a> <a href="/everyday-life/rug-size">Rug size</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Parcel A price</strong> ×10</td><td>6 000</td><td>60 000</td><td>ten times larger</td></tr><tr><td><strong>Parcel A size</strong> ×10</td><td>6 000</td><td>600</td><td>ten times smaller</td></tr><tr><td><strong>Parcel B price</strong> ×10</td><td>6 000</td><td>6 000</td><td>unchanged</td></tr><tr><td><strong>Parcel B size</strong> ×10</td><td>6 000</td><td>6 000</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Price per Acre calculator work out?', 'a' => <<<'TXT'
            It returns parcel A, per acre and parcel B, per acre and b saves, per acre and b saves and parcel A, per square foot and parcel B, per square foot from parcel A price and parcel A size and parcel B price and parcel B size. The relationship is Parcel A price ÷ Parcel A size.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Parcel A price ($), Parcel A size (acres), Parcel B price ($), Parcel B size (acres). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: parcel A price in $; parcel A size in acres; parcel B price in $; parcel B size in acres. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How many square feet are in an acre?', 'a' => '43 560. The old definition is 66 by 660 feet, one chain by one furlong, and it survives because deeds still use it.'],
            ['q' => 'Why is the price per acre lower on bigger parcels?', 'a' => <<<'TXT'
            Because the buyer who can spend seven figures on land is rarer than the one who can spend six. Size discounts of twenty to forty per cent between a five-acre and a fifty-acre parcel are ordinary.
            TXT],
            ['q' => 'Does the shape of the parcel matter?', 'a' => <<<'TXT'
            To the price per acre it does not, and to the use it does. A long thin strip is worth less than a square with the same area because it costs more to fence and road.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/price-per-square-inch', 'name' => 'Price per square inch'],
            ['path' => '/everyday-life/price-per-linear-foot', 'name' => 'Price per linear foot'],
            ['path' => '/everyday-life/rug-size', 'name' => 'Rug size'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
