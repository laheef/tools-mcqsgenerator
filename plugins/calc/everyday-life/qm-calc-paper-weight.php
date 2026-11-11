<?php

/**
 * Paper Weight Calculator
 * /everyday-life/paper-weight
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Paper Weight Calculator',
    'meta' => ['title' => 'Paper Weight — Reams, Sheets and Grams per Square', 'description' => 'Grams per square metre, a sheet size and 500 sheets give the weight of a ream in kilos and pounds, and how many sheets make a kilo. The formula is shown.', 'h1' => 'Paper Weight Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'width',
                    'label' => 'Sheet width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '8.5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'length',
                    'label' => 'Sheet length',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '11',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'sheets',
                    'label' => 'Sheets in a ream',
                    'type' => 'number',
                    'suffix' => 'sheets',
                    'default' => '500',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gsm',
                    'label' => 'Grammage',
                    'type' => 'number',
                    'suffix' => 'g/m²',
                    'default' => '80',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area',
                    'label' => 'Area of one sheet',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm²',
                ],
                [
                    'name' => 'ream_kg',
                    'label' => 'Weight of a ream',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kg',
                ],
                [
                    'name' => 'ream_lb',
                    'label' => 'Weight of a ream',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
                [
                    'name' => 'sheets_kg',
                    'label' => 'Sheets a kilo',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'sheets',
                ],
            ],
        ],
    ],
    'formula' => ['area' => 'width * length * 0.00064516', 'ream_kg' => 'width * length * 0.00064516 * sheets * gsm / 1000', 'ream_lb' => 'width * length * 0.00064516 * sheets * gsm / 1000 * 2.20462', 'sheets_kg' => '1000 / (width * length * 0.00064516 * gsm)'],
    'article' => [
        'intro' => 'The weight of a ream of paper from its grammage and sheet size, in kilograms and pounds, plus the area of one sheet and the sheets in a kilogram.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Paper is sold by weight and printed by size, and the two units meet at grams per square metre times the sheet area. An A4 sheet is 0.0624 square metres, so 80 gsm paper is 4.99 grams a sheet and a ream is 2.49 kilograms.</p><p>US Letter is 0.0603 square metres, which is why an American ream of 80 gsm weighs 2.41 kilograms and not 2.49. The difference is small until a pallet is being shipped.</p><p>The answer is <strong>area of one sheet and weight of a ream and weight of a ream and sheets a kilo</strong>, worked out from sheet width and sheet length and sheets in a ream and grammage. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>area</strong></td><td><code>Sheet width × Sheet length × 0.00064516</code></td></tr><tr><td><strong>ream_kg</strong></td><td><code>Sheet width × Sheet length × 0.00064516 × Sheets in a ream × Grammage ÷ 1000</code></td></tr><tr><td><strong>ream_lb</strong></td><td><code>Sheet width × Sheet length × 0.00064516 × Sheets in a ream × Grammage ÷ 1000 × 2.20462</code></td></tr><tr><td><strong>sheets_kg</strong></td><td><code>1000 ÷ (Sheet width × Sheet length × 0.00064516 × Grammage)</code></td></tr></tbody></table><p>Width times length in inches times 0.00064516 gives square metres. Times the grammage gives grams a sheet; times the sheet count and divided by a thousand gives kilograms a ream, and 2.20462 converts to pounds.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports area of one sheet and weight of a ream and weight of a ream and sheets a kilo.</p><ul><li><strong>Sheet width</strong> — in.</li><li><strong>Sheet length</strong> — in.</li><li><strong>Sheets in a ream</strong> — sheets.</li><li><strong>Grammage</strong> — g/m².</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Area of one sheet</strong> — m².</li><li><strong>Weight of a ream</strong> — kg.</li><li><strong>Weight of a ream</strong> — lb.</li><li><strong>Sheets a kilo</strong> — sheets.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put sheet width = 8.5 in, sheet length = 11 in, sheets in a ream = 500 sheets, grammage = 80 g/m² into the form and the panel reads:</p><ul><li><strong>Area of one sheet</strong> = <code>Sheet width × Sheet length × 0.00064516</code> = <strong>0.06 m²</strong></li><li><strong>Weight of a ream</strong> = <code>Sheet width × Sheet length × 0.00064516 × Sheets in a ream × Grammage ÷ 1000</code> = <strong>2.413 kg</strong></li><li><strong>Weight of a ream</strong> = <code>Sheet width × Sheet length × 0.00064516 × Sheets in a ream × Grammage ÷ 1000 × 2.20462</code> = <strong>5.32 lb</strong></li><li><strong>Sheets a kilo</strong> = <code>1000 ÷ (Sheet width × Sheet length × 0.00064516 × Grammage)</code> = <strong>207.22 sheets</strong></li></ul><p>At 120 gsm the same ream weighs 3.62 kilograms — half again — which is why heavier paper costs more to post and always has.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>8.5 × 11 × 0.00064516</code>, which comes to <strong>0.06 m²</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>US Letter at 80 gsm is 0.0603 square metres a sheet, 2.41 kilograms a ream and 5.32 pounds. A kilogram holds 207 sheets.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Area of one sheet</th><th>Weight of a ream</th><th>Weight of a ream</th><th>Sheets a kilo</th></tr></thead><tbody><tr><td><strong>Sheet width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Sheet length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Sheets in a ream</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Grammage</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Sheet width</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Sheet width</strong> opens at 8.5 in</li><li><strong>Sheet length</strong> opens at 11 in</li><li><strong>Sheets in a ream</strong> opens at 500 sheets</li><li><strong>Grammage</strong> opens at 80 g/m²</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Sheet width</th><th>Area of one sheet</th><th>Weight of a ream</th><th>Weight of a ream</th><th>Sheets a kilo</th></tr></thead><tbody><tr><td>4.25 in</td><td>0.03</td><td>1.206</td><td>2.66</td><td>414.439</td></tr><tr><td>8.5 in</td><td>0.06</td><td>2.413</td><td>5.32</td><td>207.22</td></tr><tr><td>17 in</td><td>0.121</td><td>4.826</td><td>10.639</td><td>103.61</td></tr><tr><td>42.5 in</td><td>0.302</td><td>12.064</td><td>26.598</td><td>41.444</td></tr><tr><td>85 in</td><td>0.603</td><td>24.129</td><td>53.195</td><td>20.722</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set sheet width = 8.5, sheet length = 11, sheets in a ream = 500, grammage = 120: <strong>Area of one sheet</strong> = 0.06 m², <strong>Weight of a ream</strong> = 3.619 kg, <strong>Weight of a ream</strong> = 7.979 lb, <strong>Sheets a kilo</strong> = 138.146 sheets. At 120 gsm the ream is 3.62 kilograms and 7.98 pounds, and a kilogram holds 138 sheets.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Confusing gsm with pound weight.</strong> A US "20 lb bond" is not 20 grams and not 20 pounds a ream; it is a basis weight from a different sheet size. Convert to gsm before comparing.</li><li><strong>Forgetting the card stock.</strong> Above 160 gsm a sheet starts to jam a printer that was designed for 80, and the weight figure is the early warning.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Nominal size.</strong> Cut sheets are slightly under size, and the grammage has a tolerance of about five per cent. A ream's real weight varies between batches.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need sheet width and sheet length and sheets in a ream and grammage. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Area of one sheet and weight of a ream and weight of a ream and sheets a kilo should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Working out postage on a mailing.</li></li><li><li>Comparing a ream in gsm with one in US pounds.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/paper-thickness">Paper thickness</a> <a href="/everyday-life/money-weight">Money weight</a> <a href="/everyday-life/roll-length">Roll length</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Sheet width</strong> ×10</td><td>0.06</td><td>0.603</td><td>ten times larger</td></tr><tr><td><strong>Sheet length</strong> ×10</td><td>0.06</td><td>0.603</td><td>ten times larger</td></tr><tr><td><strong>Sheets in a ream</strong> ×10</td><td>0.06</td><td>0.06</td><td>unchanged</td></tr><tr><td><strong>Grammage</strong> ×10</td><td>0.06</td><td>0.06</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Paper Weight calculator work out?', 'a' => <<<'TXT'
            It returns area of one sheet and weight of a ream and weight of a ream and sheets a kilo from sheet width and sheet length and sheets in a ream and grammage. The relationship is Sheet width × Sheet length × 0.00064516.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Sheet width (in), Sheet length (in), Sheets in a ream (sheets), Grammage (g/m²). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: sheet width in in; sheet length in in; sheets in a ream in sheets; grammage in g/m². The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How much does a ream of A4 weigh?', 'a' => 'About 2.5 kilograms at 80 gsm, because A4 is 0.0624 square metres. US Letter reams are slightly lighter at the same grammage.'],
            ['q' => 'What is 80 gsm in pounds?', 'a' => 'Roughly 20 lb bond for US Letter, though the basis weights are defined on different sheets and the conversion is not exact.'],
            ['q' => 'Why does card cost more?', 'a' => 'It weighs more, so it uses more pulp and costs more to ship. The price per ream follows the weight almost exactly.'],
        ],
        'related' => [
            ['path' => '/everyday-life/paper-thickness', 'name' => 'Paper thickness'],
            ['path' => '/everyday-life/money-weight', 'name' => 'Money weight'],
            ['path' => '/everyday-life/roll-length', 'name' => 'Roll length'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
