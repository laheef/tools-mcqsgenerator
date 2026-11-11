<?php

/**
 * Half Square Triangle Calculator
 * /everyday-life/half-square-triangle
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Half Square Triangle Calculator',
    'meta' => ['title' => 'Half Square Triangles — Cut Seven Eighths Larger', 'description' => 'A 4-inch half-square triangle comes from a 4 7/8 inch square and not from a 4-inch one, because the diagonal seam eats seven eighths of an inch of it.', 'h1' => 'Half Square Triangle Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'finished',
                    'label' => 'Finished size',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '4',
                    'help' => 'The size of the triangle once it is sewn into the quilt, seam included.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'count',
                    'label' => 'Triangles wanted',
                    'type' => 'number',
                    'suffix' => 'triangles',
                    'default' => '8',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cut',
                    'label' => 'Square to cut',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'cut_cm',
                    'label' => 'Square to cut',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm',
                ],
                [
                    'name' => 'squares',
                    'label' => 'Starting squares',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'squares',
                ],
                [
                    'name' => 'fabric',
                    'label' => 'Fabric area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'sq in',
                ],
            ],
        ],
    ],
    'formula' => ['cut' => 'finished + 0.875', 'cut_cm' => '(finished + 0.875) * 2.54', 'squares' => 'ceil(count / 2)', 'fabric' => 'ceil(count / 2) * (finished + 0.875) * (finished + 0.875)'],
    'article' => [
        'intro' => <<<'TXT'
        The size to cut a square that will finish as a half-square triangle, the same in centimetres, how many starting squares the block count needs, and the fabric area.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>The two-at-a-time method sews two squares right sides together, draws a diagonal, and cuts. Each square gives two triangles, and the seam allowance on the diagonal eats 7/8 of an inch — not a half.</p><p>That is why a 4-inch finished triangle comes from a 4.875-inch square. Cut 4.5 and every triangle is a quarter inch small; cut 4.5 and eight triangles are already a mistake before the first seam.</p><p>The answer is <strong>square to cut and square to cut and starting squares and fabric area</strong>, worked out from finished size and triangles wanted. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>cut</strong></td><td><code>Finished size + 0.875</code></td></tr><tr><td><strong>cut_cm</strong></td><td><code>(Finished size + 0.875) × 2.54</code></td></tr><tr><td><strong>squares</strong></td><td><code>ceil(Triangles wanted ÷ 2)</code></td></tr><tr><td><strong>fabric</strong></td><td><code>ceil(Triangles wanted ÷ 2) × (Finished size + 0.875) × (Finished size + 0.875)</code></td></tr></tbody></table><p>The finished size plus 7/8 of an inch gives the cut square, because the diagonal seam takes two 1/4-inch allowances on a diagonal. Triangles come two to a square, so the square count is the triangles halved and rounded up.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports square to cut and square to cut and starting squares and fabric area.</p><ul><li><strong>Finished size</strong> — in. The size of the triangle once it is sewn into the quilt, seam included.</li><li><strong>Triangles wanted</strong> — triangles.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Square to cut</strong> — in.</li><li><strong>Square to cut</strong> — cm.</li><li><strong>Starting squares</strong> — squares.</li><li><strong>Fabric area</strong> — sq in.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put finished size = 4 in, triangles wanted = 8 triangles into the form and the panel reads:</p><ul><li><strong>Square to cut</strong> = <code>Finished size + 0.875</code> = <strong>4.875 in</strong></li><li><strong>Square to cut</strong> = <code>(Finished size + 0.875) × 2.54</code> = <strong>12.383 cm</strong></li><li><strong>Starting squares</strong> = <code>ceil(Triangles wanted ÷ 2)</code> = <strong>4 squares</strong></li><li><strong>Fabric area</strong> = <code>ceil(Triangles wanted ÷ 2) × (Finished size + 0.875) × (Finished size + 0.875)</code> = <strong>95.062 sq in</strong></li></ul><p>For a 2-inch finished triangle the square is 2.875 and the fabric for eight is 33 square inches — half the size, a quarter of the fabric.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>4 + 0.875</code>, which comes to <strong>4.875 in</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>A 4-inch finished triangle is cut from a 4.875-inch square, 12.38 cm. Eight triangles need four squares and 95 square inches of fabric.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Square to cut</th><th>Square to cut</th><th>Starting squares</th><th>Fabric area</th></tr></thead><tbody><tr><td><strong>Finished size</strong> +10 %</td><td>+8.21 %</td><td>+8.21 %</td><td>+0 %</td><td>+17.08 %</td></tr><tr><td><strong>Triangles wanted</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+25 %</td><td>+25 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Triangles wanted</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Finished size</strong> opens at 4 in — The size of the triangle once it is sewn into the quilt, seam included.</li><li><strong>Triangles wanted</strong> opens at 8 triangles</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Finished size</th><th>Square to cut</th><th>Square to cut</th><th>Starting squares</th><th>Fabric area</th></tr></thead><tbody><tr><td>2 in</td><td>2.875</td><td>7.303</td><td>4</td><td>33.062</td></tr><tr><td>4 in</td><td>4.875</td><td>12.383</td><td>4</td><td>95.062</td></tr><tr><td>8 in</td><td>8.875</td><td>22.543</td><td>4</td><td>315.062</td></tr><tr><td>20 in</td><td>20.875</td><td>53.023</td><td>4</td><td>1 743.062</td></tr><tr><td>40 in</td><td>40.875</td><td>103.823</td><td>4</td><td>6 683.062</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set finished size = 2, triangles wanted = 8: <strong>Square to cut</strong> = 2.875 in, <strong>Square to cut</strong> = 7.303 cm, <strong>Starting squares</strong> = 4 squares, <strong>Fabric area</strong> = 33.062 sq in. A 2-inch triangle is cut from a 2.875 square, so eight triangles need 33 square inches — four squares of 8.27 each.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Cutting at the finished size.</strong> A 4-inch square gives a 3.125-inch triangle once sewn, and a quilt that is an inch short across eight rows.</li><li><strong>Forgetting the other method.</strong> Four-at-a-time and eight-at-a-time methods have their own constants — 1.414 and larger. The 7/8 rule is for two at a time only.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Cut size, not seam quality.</strong> A wobbly 1/4-inch seam will lose more than the 7/8 allowance protects. Press before measuring.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need finished size and triangles wanted. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Square to cut and square to cut and starting squares and fabric area should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Cutting for a pinwheel or star block.</li></li><li><li>Working out how much fabric a triangle border takes.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/hexagon-quilt">Hexagon quilt</a> <a href="/everyday-life/quilt">Quilt size</a> <a href="/everyday-life/fabric">Fabric conversion</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Finished size</strong> ×10</td><td>4.875</td><td>40.875</td><td>×8.385</td></tr><tr><td><strong>Triangles wanted</strong> ×10</td><td>4.875</td><td>4.875</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Half Square Triangle calculator work out?', 'a' => <<<'TXT'
            It returns square to cut and square to cut and starting squares and fabric area from finished size and triangles wanted. The relationship is Finished size + 0.875.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Finished size (in), Triangles wanted (triangles). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: finished size in in; triangles wanted in triangles. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why seven eighths and not half an inch?', 'a' => <<<'TXT'
            Because the seam runs on the diagonal, and a quarter-inch allowance on a diagonal takes more fabric than on a straight edge. The geometry gives 0.875, and every quilt book agrees with it.
            TXT],
            ['q' => 'How many triangles from one square?', 'a' => 'Two with the two-at-a-time method. Four and eight are possible with other techniques and different allowances.'],
            ['q' => 'Do I add anything for pressing?', 'a' => 'No, but you do lose a thread or two to fraying. Cut accurately and handle the pieces gently rather than adding fabric.'],
        ],
        'related' => [
            ['path' => '/everyday-life/hexagon-quilt', 'name' => 'Hexagon quilt'],
            ['path' => '/everyday-life/quilt', 'name' => 'Quilt size'],
            ['path' => '/everyday-life/fabric', 'name' => 'Fabric conversion'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
