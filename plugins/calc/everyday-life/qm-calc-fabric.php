<?php

/**
 * Fabric Conversion Calculator
 * /everyday-life/fabric
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fabric Conversion Calculator',
    'meta' => ['title' => 'Fabric Conversion — Yards, Metres and Square Feet', 'description' => 'A length of fabric in yards, metres, inches and square feet at a given width: four units of the same bolt, because patterns and shops do not agree on one.', 'h1' => 'Fabric Conversion Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'yards',
                    'label' => 'Length',
                    'type' => 'number',
                    'suffix' => 'yd',
                    'default' => '3',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Usable width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '44',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'metres',
                    'label' => 'Length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm',
                ],
                [
                    'name' => 'inches',
                    'label' => 'Length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'sqft',
                    'label' => 'Area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'sq ft',
                ],
                [
                    'name' => 'sqm',
                    'label' => 'Area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm²',
                ],
            ],
        ],
    ],
    'formula' => ['metres' => 'yards * 0.9144', 'inches' => 'yards * 36', 'sqft' => 'yards * 36 * width / 144', 'sqm' => 'yards * 0.9144 * width * 0.0254'],
    'article' => [
        'intro' => 'A fabric length converted between yards and metres, with the inches, the square feet and the square metres that the same piece covers at the bolt\'s width.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Fabric is sold by the yard in the United States and by the metre almost everywhere else, and the two are close enough that people treat them as the same. A yard is 91.44 centimetres, so three yards is 2.74 metres and a three-metre order is 3.28 yards.</p><p>That eight per cent matters on a project that needs every centimetre, which is most of them. The area figures go further: three yards of 44-inch fabric is 33 square feet, and a pattern that specifies square metres is asking a different question.</p><p>The answer is <strong>length and length and area and area</strong>, worked out from length and usable width. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>metres</strong></td><td><code>Length × 0.9144</code></td></tr><tr><td><strong>inches</strong></td><td><code>Length × 36</code></td></tr><tr><td><strong>sqft</strong></td><td><code>Length × 36 × Usable width ÷ 144</code></td></tr><tr><td><strong>sqm</strong></td><td><code>Length × 0.9144 × Usable width × 0.0254</code></td></tr></tbody></table><p>Yards times 0.9144 gives metres and times 36 gives inches. Area multiplies the inches by the width and divides by 144 for square feet, or converts both dimensions to metres for square metres.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports length and length and area and area.</p><ul><li><strong>Length</strong> — yd.</li><li><strong>Usable width</strong> — in.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Length</strong> — m.</li><li><strong>Length</strong> — in.</li><li><strong>Area</strong> — sq ft.</li><li><strong>Area</strong> — m².</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put length = 3 yd, usable width = 44 in into the form and the panel reads:</p><ul><li><strong>Length</strong> = <code>Length × 0.9144</code> = <strong>2.743 m</strong></li><li><strong>Length</strong> = <code>Length × 36</code> = <strong>108 in</strong></li><li><strong>Area</strong> = <code>Length × 36 × Usable width ÷ 144</code> = <strong>33 sq ft</strong></li><li><strong>Area</strong> = <code>Length × 0.9144 × Usable width × 0.0254</code> = <strong>3.066 m²</strong></li></ul><p>A 60-inch wide fabric covers 45 square feet in the same three yards — a third more area for the same length, which is why upholstery fabric is sold wide.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>3 × 0.9144</code>, which comes to <strong>2.743 m</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>Three yards is 2.74 metres, 108 inches, and at 44 inches wide it is 33 square feet or 3.07 square metres.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Length</th><th>Length</th><th>Area</th><th>Area</th></tr></thead><tbody><tr><td><strong>Length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Usable width</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Length</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Length</strong> opens at 3 yd</li><li><strong>Usable width</strong> opens at 44 in</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Length</th><th>Length</th><th>Length</th><th>Area</th><th>Area</th></tr></thead><tbody><tr><td>1.5 yd</td><td>1.372</td><td>54</td><td>16.5</td><td>1.533</td></tr><tr><td>3 yd</td><td>2.743</td><td>108</td><td>33</td><td>3.066</td></tr><tr><td>6 yd</td><td>5.486</td><td>216</td><td>66</td><td>6.132</td></tr><tr><td>15 yd</td><td>13.716</td><td>540</td><td>165</td><td>15.329</td></tr><tr><td>30 yd</td><td>27.432</td><td>1 080</td><td>330</td><td>30.658</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set length = 3, usable width = 60: <strong>Length</strong> = 2.743 m, <strong>Length</strong> = 108 in, <strong>Area</strong> = 45 sq ft, <strong>Area</strong> = 4.181 m². At 60 inches wide the same three yards is 45 square feet — the width is the second half of the area and the part people forget.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Treating a metre as a yard.</strong> It is nine per cent longer, so a pattern in yards ordered in metres has eight per cent more fabric, not the same amount.</li><li><strong>Using the bolt width as usable width.</strong> Selvedges are 1 to 2 inches of each side that cannot be used, and a 44-inch bolt is 42 usable.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Flat fabric.</strong> The area is the rectangle. A pattern with curves and nap layouts wastes 10 to 25 per cent of it, and the page cannot see that.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need length and usable width. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Length and length and area and area should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Converting a US pattern's yardage for a metric shop.</li></li><li><li>Checking whether a remnant is enough for a project.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/circle-skirt">Circle skirt</a> <a href="/everyday-life/quilt">Quilt size</a> <a href="/everyday-life/paper-weight">Paper weight</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Length</strong> ×10</td><td>2.743</td><td>27.432</td><td>ten times larger</td></tr><tr><td><strong>Usable width</strong> ×10</td><td>2.743</td><td>2.743</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fabric Conversion calculator work out?', 'a' => 'It returns length and length and area and area from length and usable width. The relationship is Length × 0.9144.'],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Length (yd), Usable width (in). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: length in yd; usable width in in. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Is a metre bigger than a yard?', 'a' => 'Yes, by about nine per cent: 1 metre is 1.0936 yards. A metre is 39.37 inches and a yard is 36.'],
            ['q' => 'Why is fabric 44 inches wide?', 'a' => 'Because the looms that made it were, and the standard survived. Quilting cotton is usually 42 to 44, apparel fabric 58 to 60, and upholstery 54 to 60.'],
            ['q' => 'How do I convert square yards to metres?', 'a' => 'One square yard is 0.836 square metres. For lengths it is 0.9144, and mixing the two conversions is the usual error.'],
        ],
        'related' => [
            ['path' => '/everyday-life/circle-skirt', 'name' => 'Circle skirt'],
            ['path' => '/everyday-life/quilt', 'name' => 'Quilt size'],
            ['path' => '/everyday-life/paper-weight', 'name' => 'Paper weight'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
