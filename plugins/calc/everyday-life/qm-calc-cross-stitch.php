<?php

/**
 * Cross Stitch Fabric Calculator
 * /everyday-life/cross-stitch
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cross Stitch Fabric Calculator',
    'meta' => ['title' => 'Cross Stitch — Fabric Count, Size and Margin', 'description' => 'A 140 by 100 stitch design on 14-count aida is ten by seven inches: the finished size, the fabric to cut, and the same in centimetres. The formula is shown.', 'h1' => 'Cross Stitch Fabric Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'stitches_w',
                    'label' => 'Stitches wide',
                    'type' => 'number',
                    'suffix' => 'stitches',
                    'default' => '140',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'stitches_h',
                    'label' => 'Stitches high',
                    'type' => 'number',
                    'suffix' => 'stitches',
                    'default' => '100',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'count',
                    'label' => 'Fabric count',
                    'type' => 'number',
                    'suffix' => 'stitches/in',
                    'default' => '14',
                    'help' => 'Aida is sold as 14, 16 or 18 count, which is stitches to the inch. Evenweave counts differ: a 28-count evenweave works at 14 stitches an inch over two threads.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'margin',
                    'label' => 'Margin each side',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '3',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'finished_w',
                    'label' => 'Finished width',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'finished_h',
                    'label' => 'Finished height',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'fabric_w',
                    'label' => 'Fabric to cut',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'fabric_h',
                    'label' => 'Fabric to cut',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'fabric_cm',
                    'label' => 'Fabric to cut',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm',
                ],
            ],
        ],
    ],
    'formula' => [
        'finished_w' => 'stitches_w / count',
        'finished_h' => 'stitches_h / count',
        'fabric_w' => 'stitches_w / count + 2 * margin',
        'fabric_h' => 'stitches_h / count + 2 * margin',
        'fabric_cm' => '(stitches_w / count + 2 * margin) * 2.54',
    ],
    'article' => [
        'intro' => 'The finished size of a cross-stitch design on a given fabric count, and the piece of fabric to cut once a margin is allowed on every side.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Fabric count is stitches to the inch, so the design divides straight through. A 140 by 100 design on 14-count aida is ten inches by 7.14, and with three inches of margin on each side you cut a piece 16 by 13.1 inches.</p><p>The margin is not optional. It is what the hoop grips, what a framer laces over, and what saves the piece when the stitching drifts half an inch to one side. Three inches is the minimum and four is comfortable.</p><p>The answer is <strong>finished width and finished height and fabric to cut and fabric to cut and fabric to cut</strong>, worked out from stitches wide and stitches high and fabric count and margin each side. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>finished_w</strong></td><td><code>Stitches wide ÷ Fabric count</code></td></tr><tr><td><strong>finished_h</strong></td><td><code>Stitches high ÷ Fabric count</code></td></tr><tr><td><strong>fabric_w</strong></td><td><code>Stitches wide ÷ Fabric count + 2 × Margin each side</code></td></tr><tr><td><strong>fabric_h</strong></td><td><code>Stitches high ÷ Fabric count + 2 × Margin each side</code></td></tr><tr><td><strong>fabric_cm</strong></td><td><code>(Stitches wide ÷ Fabric count + 2 × Margin each side) × 2.54</code></td></tr></tbody></table><p>Stitches over count gives inches. The fabric to cut adds twice the margin, because a margin is on every side, and the centimetre figure multiplies the width by 2.54.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports finished width and finished height and fabric to cut and fabric to cut and fabric to cut.</p><ul><li><strong>Stitches wide</strong> — stitches.</li><li><strong>Stitches high</strong> — stitches.</li><li><strong>Fabric count</strong> — stitches/in. Aida is sold as 14, 16 or 18 count, which is stitches to the inch. Evenweave counts differ: a 28-count evenweave works at 14 stitches an inch over two threads.</li><li><strong>Margin each side</strong> — in.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Finished width</strong> — in.</li><li><strong>Finished height</strong> — in.</li><li><strong>Fabric to cut</strong> — in.</li><li><strong>Fabric to cut</strong> — in.</li><li><strong>Fabric to cut</strong> — cm.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put stitches wide = 140 stitches, stitches high = 100 stitches, fabric count = 14 stitches/in, margin each side = 3 in into the form and the panel reads:</p><ul><li><strong>Finished width</strong> = <code>Stitches wide ÷ Fabric count</code> = <strong>10 in</strong></li><li><strong>Finished height</strong> = <code>Stitches high ÷ Fabric count</code> = <strong>7.143 in</strong></li><li><strong>Fabric to cut</strong> = <code>Stitches wide ÷ Fabric count + 2 × Margin each side</code> = <strong>16 in</strong></li><li><strong>Fabric to cut</strong> = <code>Stitches high ÷ Fabric count + 2 × Margin each side</code> = <strong>13.143 in</strong></li><li><strong>Fabric to cut</strong> = <code>(Stitches wide ÷ Fabric count + 2 × Margin each side) × 2.54</code> = <strong>40.64 cm</strong></li></ul><p>On 18-count the same design finishes at 7.78 by 5.56 inches, which is smaller and denser. The higher the count, the smaller the picture and the more stitches to the inch.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>140 ÷ 14</code>, which comes to <strong>10 in</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>140 by 100 on 14-count is 10 by 7.14 inches finished. With a 3-inch margin the cut is 16 by 13.14 inches, or 40.6 cm across.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Finished width</th><th>Finished height</th><th>Fabric to cut</th><th>Fabric to cut</th><th>Fabric to cut</th></tr></thead><tbody><tr><td><strong>Stitches wide</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+6.25 %</td><td>+0 %</td><td>+6.25 %</td></tr><tr><td><strong>Stitches high</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+5.43 %</td><td>+0 %</td></tr><tr><td><strong>Fabric count</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−5.68 %</td><td>−4.94 %</td><td>−5.68 %</td></tr><tr><td><strong>Margin each side</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+3.75 %</td><td>+4.57 %</td><td>+3.75 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Stitches high</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Stitches wide</strong> opens at 140 stitches</li><li><strong>Stitches high</strong> opens at 100 stitches</li><li><strong>Fabric count</strong> opens at 14 stitches/in — Aida is sold as 14, 16 or 18 count, which is stitches to the inch. Evenweave counts differ: a 28-count evenweave works at 14 stitches an inch over two threads.</li><li><strong>Margin each side</strong> opens at 3 in</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Stitches wide</th><th>Finished width</th><th>Finished height</th><th>Fabric to cut</th><th>Fabric to cut</th><th>Fabric to cut</th></tr></thead><tbody><tr><td>70 stitches</td><td>5</td><td>7.143</td><td>11</td><td>13.143</td><td>27.94</td></tr><tr><td>140 stitches</td><td>10</td><td>7.143</td><td>16</td><td>13.143</td><td>40.64</td></tr><tr><td>280 stitches</td><td>20</td><td>7.143</td><td>26</td><td>13.143</td><td>66.04</td></tr><tr><td>700 stitches</td><td>50</td><td>7.143</td><td>56</td><td>13.143</td><td>142.24</td></tr><tr><td>1 400 stitches</td><td>100</td><td>7.143</td><td>106</td><td>13.143</td><td>269.24</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set stitches wide = 140, stitches high = 100, fabric count = 18, margin each side = 3: <strong>Finished width</strong> = 7.778 in, <strong>Finished height</strong> = 5.556 in, <strong>Fabric to cut</strong> = 13.778 in, <strong>Fabric to cut</strong> = 11.556 in, <strong>Fabric to cut</strong> = 34.996 cm. On 18-count the design finishes 7.78 by 5.56 inches and the cut piece is 13.78 by 11.56 — smaller, denser and quicker to stitch.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using the fabric count for evenweave the same way.</strong> 28-count evenweave worked over two threads is 14 stitches an inch, not 28, and a piece cut for 28 is half the size it should be.</li><li><strong>Cutting the margin off the finished size instead of adding it.</strong> The margin goes outside the design, both sides, so it adds twice the figure to each dimension.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Stitches that are not square.</strong> Aida is square; some linens are not, and the design comes out stretched. The page assumes square.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need stitches wide and stitches high and fabric count and margin each side. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Finished width and finished height and fabric to cut and fabric to cut and fabric to cut should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Buying fabric for a counted cross-stitch chart.</li></li><li><li>Checking whether a design will fit a standard frame.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/half-square-triangle">Half-square triangles</a> <a href="/everyday-life/fabric">Fabric conversion</a> <a href="/everyday-life/quilt">Quilt size</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Stitches wide</strong> ×10</td><td>10</td><td>100</td><td>ten times larger</td></tr><tr><td><strong>Stitches high</strong> ×10</td><td>10</td><td>10</td><td>unchanged</td></tr><tr><td><strong>Fabric count</strong> ×10</td><td>10</td><td>1</td><td>ten times smaller</td></tr><tr><td><strong>Margin each side</strong> ×10</td><td>10</td><td>10</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cross Stitch Fabric calculator work out?', 'a' => <<<'TXT'
            It returns finished width and finished height and fabric to cut and fabric to cut and fabric to cut from stitches wide and stitches high and fabric count and margin each side. The relationship is Stitches wide ÷ Fabric count.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Stitches wide (stitches), Stitches high (stitches), Fabric count (stitches/in), Margin each side (in). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: stitches wide in stitches; stitches high in stitches; fabric count in stitches/in; margin each side in in. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What does 14-count mean?', 'a' => <<<'TXT'
            Fourteen stitches to the inch in each direction. A 14-count aida square is about 1.8 millimetres, and a design's size in inches is its stitch count divided by fourteen.
            TXT],
            ['q' => 'How much margin should I leave?', 'a' => 'Three inches minimum on every side, four for a large piece or one that will be stretched over a frame.'],
            ['q' => 'Does the thread coverage change with count?', 'a' => 'Yes: higher counts need fewer strands to cover the same square. That is why 18-count uses two strands where 11-count uses three or four.'],
        ],
        'related' => [
            ['path' => '/everyday-life/half-square-triangle', 'name' => 'Half-square triangles'],
            ['path' => '/everyday-life/fabric', 'name' => 'Fabric conversion'],
            ['path' => '/everyday-life/quilt', 'name' => 'Quilt size'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
