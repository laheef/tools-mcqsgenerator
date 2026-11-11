<?php

/**
 * Paper Thickness Calculator
 * /everyday-life/paper-thickness
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Paper Thickness Calculator',
    'meta' => ['title' => 'Paper Thickness — Caliper from a Measured Stack', 'description' => 'A ream and a ruler give the caliper of one sheet: thickness in millimetres and thou, and how many sheets make an inch of stack. See the formula and an example.', 'h1' => 'Paper Thickness Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'sheets',
                    'label' => 'Sheets in the stack',
                    'type' => 'number',
                    'suffix' => 'sheets',
                    'default' => '500',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'stack_mm',
                    'label' => 'Height of the stack',
                    'type' => 'number',
                    'suffix' => 'mm',
                    'default' => '50',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'per_mm',
                    'label' => 'One sheet',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mm',
                ],
                [
                    'name' => 'per_in',
                    'label' => 'One sheet',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'thou',
                    'label' => 'One sheet',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'thou',
                ],
                [
                    'name' => 'sheets_inch',
                    'label' => 'Sheets an inch',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'sheets',
                ],
            ],
        ],
    ],
    'formula' => ['per_mm' => 'stack_mm / sheets', 'per_in' => 'stack_mm / sheets / 25.4', 'thou' => 'stack_mm / sheets / 25.4 * 1000', 'sheets_inch' => 'sheets / (stack_mm / 25.4)'],
    'article' => [
        'intro' => <<<'TXT'
        The thickness of one sheet from the height of a measured stack, in millimetres and thousandths of an inch, and the number of sheets in an inch of the same paper.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Paper is sold by weight and printed by feel, and the thickness is the number that decides whether a card goes through a printer. Five hundred sheets measuring fifty millimetres is 0.1 millimetres a sheet, or four thousandths of an inch.</p><p>Caliper is measured on a stack precisely because one sheet is too thin to measure with a ruler, and the stack averages out the variation between sheets as well.</p><p>The answer is <strong>one sheet and one sheet and one sheet and sheets an inch</strong>, worked out from sheets in the stack and height of the stack. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>per_mm</strong></td><td><code>Height of the stack ÷ Sheets in the stack</code></td></tr><tr><td><strong>per_in</strong></td><td><code>Height of the stack ÷ Sheets in the stack ÷ 25.4</code></td></tr><tr><td><strong>thou</strong></td><td><code>Height of the stack ÷ Sheets in the stack ÷ 25.4 × 1000</code></td></tr><tr><td><strong>sheets_inch</strong></td><td><code>Sheets in the stack ÷ (Height of the stack ÷ 25.4)</code></td></tr></tbody></table><p>Stack height over sheet count gives one sheet. Dividing by 25.4 gives inches, and multiplying that by a thousand gives thou, the thousandths printers use. Sheets per inch is the sheet count over the stack in inches.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports one sheet and one sheet and one sheet and sheets an inch.</p><ul><li><strong>Sheets in the stack</strong> — sheets.</li><li><strong>Height of the stack</strong> — mm.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>One sheet</strong> — mm.</li><li><strong>One sheet</strong> — in.</li><li><strong>One sheet</strong> — thou.</li><li><strong>Sheets an inch</strong> — sheets.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put sheets in the stack = 500 sheets, height of the stack = 50 mm into the form and the panel reads:</p><ul><li><strong>One sheet</strong> = <code>Height of the stack ÷ Sheets in the stack</code> = <strong>0.1 mm</strong></li><li><strong>One sheet</strong> = <code>Height of the stack ÷ Sheets in the stack ÷ 25.4</code> = <strong>0.004 in</strong></li><li><strong>One sheet</strong> = <code>Height of the stack ÷ Sheets in the stack ÷ 25.4 × 1000</code> = <strong>3.937 thou</strong></li><li><strong>Sheets an inch</strong> = <code>Sheets in the stack ÷ (Height of the stack ÷ 25.4)</code> = <strong>254 sheets</strong></li></ul><p>A ream of 38 mm is 0.076 mm — 3 thou — which is ordinary copier paper. Anything above 5 thou starts to need a printer with a straight paper path.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>50 ÷ 500</code>, which comes to <strong>0.1 mm</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>500 sheets at 50 mm is 0.1 mm a sheet, 0.00394 inches, 3.94 thou, and 254 sheets to the inch.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>One sheet</th><th>One sheet</th><th>One sheet</th><th>Sheets an inch</th></tr></thead><tbody><tr><td><strong>Sheets in the stack</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+10 %</td></tr><tr><td><strong>Height of the stack</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Height of the stack</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Sheets in the stack</strong> opens at 500 sheets</li><li><strong>Height of the stack</strong> opens at 50 mm</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Sheets in the stack</th><th>One sheet</th><th>One sheet</th><th>One sheet</th><th>Sheets an inch</th></tr></thead><tbody><tr><td>250 sheets</td><td>0.2</td><td>0.008</td><td>7.874</td><td>127</td></tr><tr><td>500 sheets</td><td>0.1</td><td>0.004</td><td>3.937</td><td>254</td></tr><tr><td>1 000 sheets</td><td>0.05</td><td>0.002</td><td>1.969</td><td>508</td></tr><tr><td>2 500 sheets</td><td>0.02</td><td>0.0007874</td><td>0.787</td><td>1 270</td></tr><tr><td>5 000 sheets</td><td>0.01</td><td>0.0003937</td><td>0.394</td><td>2 540</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set sheets in the stack = 500, height of the stack = 38: <strong>One sheet</strong> = 0.076 mm, <strong>One sheet</strong> = 0.003 in, <strong>One sheet</strong> = 2.992 thou, <strong>Sheets an inch</strong> = 334.211 sheets. 38 mm is 0.076 mm a sheet, 2.99 thou, and 334 sheets an inch — thinner than ordinary copier paper and near the limit for a laser.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Measuring one sheet.</strong> A ruler cannot resolve 0.1 mm, and the paper's own variation is larger than the error you are trying to avoid. Measure a hundred or more.</li><li><strong>Forgetting the compression.</strong> A stack pressed by a weight measures thinner than a loose one. Measure with the paper as it sits, and accept the variation.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Average thickness.</strong> A coated sheet is thicker than its base paper, and two papers of the same weight can differ by two thou. The stack is the honest measurement.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need sheets in the stack and height of the stack. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> One sheet and one sheet and one sheet and sheets an inch should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Deciding whether a card stock will feed through a printer.</li></li><li><li>Working out how thick a bound document will be before ordering a cover.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/roll-length">Roll length</a> <a href="/everyday-life/toilet-paper-tariff">Toilet paper price</a> <a href="/everyday-life/price-per-square-inch">Price per square inch</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Sheets in the stack</strong> ×10</td><td>0.1</td><td>0.01</td><td>ten times smaller</td></tr><tr><td><strong>Height of the stack</strong> ×10</td><td>0.1</td><td>1</td><td>ten times larger</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Paper Thickness calculator work out?', 'a' => <<<'TXT'
            It returns one sheet and one sheet and one sheet and sheets an inch from sheets in the stack and height of the stack. The relationship is Height of the stack ÷ Sheets in the stack.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Sheets in the stack (sheets), Height of the stack (mm). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: sheets in the stack in sheets; height of the stack in mm. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What is a thou?', 'a' => 'A thousandth of an inch, 0.0254 mm. Paper is quoted in it because the printing industry\'s machines were built in inches and the habit survived.'],
            ['q' => 'How thick is normal printer paper?', 'a' => 'About 0.1 mm, or four thou, for 80 gsm. Card starts at 160 gsm and about 0.2 mm.'],
            ['q' => 'Does gsm tell me the thickness?', 'a' => 'Only roughly. Grams per square metre is weight, and a coated or bulky sheet is thicker for the same weight. The caliper has to be measured.'],
        ],
        'related' => [
            ['path' => '/everyday-life/roll-length', 'name' => 'Roll length'],
            ['path' => '/everyday-life/toilet-paper-tariff', 'name' => 'Toilet paper price'],
            ['path' => '/everyday-life/price-per-square-inch', 'name' => 'Price per square inch'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
