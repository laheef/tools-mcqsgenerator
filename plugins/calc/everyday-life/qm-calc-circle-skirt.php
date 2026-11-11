<?php

/**
 * Circle Skirt Calculator
 * /everyday-life/circle-skirt
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Circle Skirt Calculator',
    'meta' => ['title' => 'Circle Skirt — Waist Radius, Length and Fabric', 'description' => 'Waist measurement divided by two pi gives the hole, plus the length gives the outer radius: the fabric a full circle skirt needs and the width to buy it in.', 'h1' => 'Circle Skirt Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'waist',
                    'label' => 'Waist measurement',
                    'type' => 'number',
                    'suffix' => 'cm',
                    'default' => '76',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'length',
                    'label' => 'Finished length',
                    'type' => 'number',
                    'suffix' => 'cm',
                    'default' => '60',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hem',
                    'label' => 'Hem allowance',
                    'type' => 'number',
                    'suffix' => 'cm',
                    'default' => '3',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'seam',
                    'label' => 'Waist seam allowance',
                    'type' => 'number',
                    'suffix' => 'cm',
                    'default' => '1.5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'inner',
                    'label' => 'Waist radius',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm',
                ],
                [
                    'name' => 'outer',
                    'label' => 'Outer radius',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm',
                ],
                [
                    'name' => 'area',
                    'label' => 'Fabric area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm²',
                ],
                [
                    'name' => 'width',
                    'label' => 'Minimum fabric width',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm',
                ],
            ],
        ],
    ],
    'formula' => ['inner' => 'waist / (2 * pi)', 'outer' => 'waist / (2 * pi) + length + hem + seam', 'area' => 'pi * ((waist / (2 * pi) + length + hem + seam) * (waist / (2 * pi) + length + hem + seam) - (waist / (2 * pi)) * (waist / (2 * pi))) / 10000', 'width' => '2 * (waist / (2 * pi) + length + hem + seam)'],
    'article' => [
        'intro' => 'The inner radius for the waist, the outer radius of the finished skirt, the fabric area it takes and the minimum width a single-piece circle needs.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A circle skirt is a donut: the waist is the hole and the skirt hangs from the outer edge. The hole's radius is the waist divided by 2π, which for a 76 cm waist is 12.1 cm.</p><p>Add the length and the allowances and the outer radius is 76.6 cm, so the circle is 153 cm across before you cut it. That number is the one that decides whether a 150 cm bolt works in one piece or two — and a skirt cut in two pieces has seams on the sides that a circle skirt was never meant to have.</p><p>The answer is <strong>waist radius and outer radius and fabric area and minimum fabric width</strong>, worked out from waist measurement and finished length and hem allowance and waist seam allowance. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>inner</strong></td><td><code>Waist measurement ÷ (2 × pi)</code></td></tr><tr><td><strong>outer</strong></td><td><code>Waist measurement ÷ (2 × pi) + Finished length + Hem allowance + Waist seam allowance</code></td></tr><tr><td><strong>area</strong></td><td><code>pi × ((Waist measurement ÷ (2 × pi) + Finished length + Hem allowance + Waist seam allowance) × (Waist measurement ÷ (2 × pi) + Finished length + Hem allowance + Waist seam allowance) - (Waist measurement ÷ (2 × pi)) × (Waist measurement ÷ (2 × pi))) ÷ 10000</code></td></tr><tr><td><strong>width</strong></td><td><code>2 × (Waist measurement ÷ (2 × pi) + Finished length + Hem allowance + Waist seam allowance)</code></td></tr></tbody></table><p>Waist over 2π gives the inner radius. Adding the finished length and the hem and seam allowances gives the outer radius, and the area is π times the difference of the squares, converted from square centimetres to square metres.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports waist radius and outer radius and fabric area and minimum fabric width.</p><ul><li><strong>Waist measurement</strong> — cm.</li><li><strong>Finished length</strong> — cm.</li><li><strong>Hem allowance</strong> — cm.</li><li><strong>Waist seam allowance</strong> — cm.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Waist radius</strong> — cm.</li><li><strong>Outer radius</strong> — cm.</li><li><strong>Fabric area</strong> — m².</li><li><strong>Minimum fabric width</strong> — cm.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put waist measurement = 76 cm, finished length = 60 cm, hem allowance = 3 cm, waist seam allowance = 1.5 cm into the form and the panel reads:</p><ul><li><strong>Waist radius</strong> = <code>Waist measurement ÷ (2 × pi)</code> = <strong>12.096 cm</strong></li><li><strong>Outer radius</strong> = <code>Waist measurement ÷ (2 × pi) + Finished length + Hem allowance + Waist seam allowance</code> = <strong>76.596 cm</strong></li><li><strong>Fabric area</strong> = <code>pi × ((Waist measurement ÷ (2 × pi) + Finished length + Hem allowance + Waist seam allowance) × (Waist measurement ÷ (2 × pi) + Finished length + Hem allowance + Waist seam allowance) - (Waist measurement ÷ (2 × pi)) × (Waist measurement ÷ (2 × pi))) ÷ 10000</code> = <strong>1.797 m²</strong></li><li><strong>Minimum fabric width</strong> = <code>2 × (Waist measurement ÷ (2 × pi) + Finished length + Hem allowance + Waist seam allowance)</code> = <strong>153.192 cm</strong></li></ul><p>A half-circle skirt halves the fabric and doubles the drop per metre. The same waist on a half circle has an inner radius of 24.2 cm, which is the number the pattern has in it.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>76 ÷ (2 × pi)</code>, which comes to <strong>12.096 cm</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A 76 cm waist with a 60 cm length, a 3 cm hem and a 1.5 cm seam has a 12.1 cm inner radius and a 76.6 cm outer radius: 1.80 square metres of fabric and a 153 cm minimum width.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Waist radius</th><th>Outer radius</th><th>Fabric area</th><th>Minimum fabric width</th></tr></thead><tbody><tr><td><strong>Waist measurement</strong> +10 %</td><td>+10 %</td><td>+1.58 %</td><td>+2.73 %</td><td>+1.58 %</td></tr><tr><td><strong>Finished length</strong> +10 %</td><td>+0 %</td><td>+7.83 %</td><td>+16.7 %</td><td>+7.83 %</td></tr><tr><td><strong>Hem allowance</strong> +10 %</td><td>+0 %</td><td>+0.39 %</td><td>+0.8 %</td><td>+0.39 %</td></tr><tr><td><strong>Waist seam allowance</strong> +10 %</td><td>+0 %</td><td>+0.2 %</td><td>+0.4 %</td><td>+0.2 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Finished length</strong>. <strong>Waist seam allowance</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Waist measurement</strong> opens at 76 cm</li><li><strong>Finished length</strong> opens at 60 cm</li><li><strong>Hem allowance</strong> opens at 3 cm</li><li><strong>Waist seam allowance</strong> opens at 1.5 cm</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Waist measurement</th><th>Waist radius</th><th>Outer radius</th><th>Fabric area</th><th>Minimum fabric width</th></tr></thead><tbody><tr><td>38 cm</td><td>6.048</td><td>70.548</td><td>1.552</td><td>141.096</td></tr><tr><td>76 cm</td><td>12.096</td><td>76.596</td><td>1.797</td><td>153.192</td></tr><tr><td>152 cm</td><td>24.192</td><td>88.692</td><td>2.287</td><td>177.383</td></tr><tr><td>380 cm</td><td>60.479</td><td>124.979</td><td>3.758</td><td>249.958</td></tr><tr><td>760 cm</td><td>120.958</td><td>185.458</td><td>6.209</td><td>370.916</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set waist measurement = 76, finished length = 80, hem allowance = 3, waist seam allowance = 1.5: <strong>Waist radius</strong> = 12.096 cm, <strong>Outer radius</strong> = 96.596 cm, <strong>Fabric area</strong> = 2.885 m², <strong>Minimum fabric width</strong> = 193.192 cm. An 80 cm length takes the outer radius to 96.6 cm, which is a 193 cm circle — more than any bolt is wide, so this one is cut in two.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using the hip instead of the waist.</strong> A circle skirt needs the waist to sit, and the hip has to pass through it. If the hips are more than 25 cm larger than the waist, use the hip measurement for the hole and gather the waist.</li><li><strong>Forgetting the seam.</strong> A skirt cut in two halves needs two seam allowances and two hems, and a circle skirt on a narrow bolt is usually cut in two halves.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Flat circle.</strong> Fabric hangs differently on the bias, so a circle skirt drops two to four centimetres after a day on a hanger. Cut it, hang it, then level the hem.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need waist measurement and finished length and hem allowance and waist seam allowance. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Waist radius and outer radius and fabric area and minimum fabric width should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Buying fabric for a circle skirt without a pattern.</li></li><li><li>Checking whether a bolt is wide enough for a single-piece skirt.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/pleated-skirt">Pleated skirt</a> <a href="/everyday-life/fabric">Fabric conversion</a> <a href="/everyday-life/tablecloth-size">Tablecloth size</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Waist measurement</strong> ×10</td><td>12.096</td><td>120.958</td><td>ten times larger</td></tr><tr><td><strong>Finished length</strong> ×10</td><td>12.096</td><td>12.096</td><td>unchanged</td></tr><tr><td><strong>Hem allowance</strong> ×10</td><td>12.096</td><td>12.096</td><td>unchanged</td></tr><tr><td><strong>Waist seam allowance</strong> ×10</td><td>12.096</td><td>12.096</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Circle Skirt calculator work out?', 'a' => <<<'TXT'
            It returns waist radius and outer radius and fabric area and minimum fabric width from waist measurement and finished length and hem allowance and waist seam allowance. The relationship is Waist measurement ÷ (2 × pi).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Waist measurement (cm), Finished length (cm), Hem allowance (cm), Waist seam allowance (cm). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: waist measurement in cm; finished length in cm; hem allowance in cm; waist seam allowance in cm. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why divide the waist by 2π?', 'a' => 'Because the circumference is 2π times the radius. The waist is the circumference of the hole, so the radius is the waist over 2π.'],
            ['q' => 'How much fabric does a circle skirt need?', 'a' => <<<'TXT'
            Twice the outer radius in each direction if cut in one piece, which for an adult is 1.5 to 2.5 square metres. Most adult skirts are cut in two halves to fit a bolt.
            TXT],
            ['q' => 'Does the skirt need a zip?', 'a' => 'A full circle in a non-stretch fabric usually does, because the waist hole will not pass the hips. A half circle often does not.'],
        ],
        'related' => [
            ['path' => '/everyday-life/pleated-skirt', 'name' => 'Pleated skirt'],
            ['path' => '/everyday-life/fabric', 'name' => 'Fabric conversion'],
            ['path' => '/everyday-life/tablecloth-size', 'name' => 'Tablecloth size'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
