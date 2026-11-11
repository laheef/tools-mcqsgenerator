<?php

/**
 * Quilt Binding Calculator
 * /everyday-life/quilt-binding
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Quilt Binding Calculator',
    'meta' => ['title' => 'Quilt Binding — Strips, Fabric Width and Yards', 'description' => 'The perimeter plus ten inches, divided by the usable fabric width: how many binding strips a quilt takes and how much fabric to cut them from at 42 inches.', 'h1' => 'Quilt Binding Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'quilt_w',
                    'label' => 'Quilt width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '60',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'quilt_l',
                    'label' => 'Quilt length',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '80',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'strip',
                    'label' => 'Strip width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '2.5',
                    'help' => 'Two and a quarter for double-fold binding, two and a half for a generous one with a wide stitch line.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'fabric_width',
                    'label' => 'Usable fabric width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '42',
                    'help' => 'A 44-inch bolt is 42 inches usable once the selvedges are cut off.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'perimeter',
                    'label' => 'Quilt perimeter',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'binding',
                    'label' => 'Binding needed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'strips',
                    'label' => 'Strips',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'strips',
                ],
                [
                    'name' => 'fabric_in',
                    'label' => 'Fabric to cut',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'fabric_yd',
                    'label' => 'Fabric to buy',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd',
                ],
            ],
        ],
    ],
    'formula' => [
        'perimeter' => '2 * (quilt_w + quilt_l)',
        'binding' => '2 * (quilt_w + quilt_l) + 10',
        'strips' => 'ceil((2 * (quilt_w + quilt_l) + 10) / fabric_width)',
        'fabric_in' => 'ceil((2 * (quilt_w + quilt_l) + 10) / fabric_width) * strip',
        'fabric_yd' => 'ceil((2 * (quilt_w + quilt_l) + 10) / fabric_width) * strip / 36',
    ],
    'article' => [
        'intro' => 'The binding length a quilt needs, the number of strips that length makes from a width of fabric, and the fabric to buy in inches and yards.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Binding goes round the edge, so the length is the perimeter plus ten inches for the join and the corners. A 60 by 80 quilt has a 280-inch perimeter and needs 290 inches of binding.</p><p>The strips are cut across the fabric and joined end to end, so the number of strips is the binding length over the usable width: seven strips of 2.5 inches, which is 17.5 inches of fabric or half a yard.</p><p>The answer is <strong>quilt perimeter and binding needed and strips and fabric to cut and fabric to buy</strong>, worked out from quilt width and quilt length and strip width and usable fabric width. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>perimeter</strong></td><td><code>2 × (Quilt width + Quilt length)</code></td></tr><tr><td><strong>binding</strong></td><td><code>2 × (Quilt width + Quilt length) + 10</code></td></tr><tr><td><strong>strips</strong></td><td><code>ceil((2 × (Quilt width + Quilt length) + 10) ÷ Usable fabric width)</code></td></tr><tr><td><strong>fabric_in</strong></td><td><code>ceil((2 × (Quilt width + Quilt length) + 10) ÷ Usable fabric width) × Strip width</code></td></tr><tr><td><strong>fabric_yd</strong></td><td><code>ceil((2 × (Quilt width + Quilt length) + 10) ÷ Usable fabric width) × Strip width ÷ 36</code></td></tr></tbody></table><p>Twice length plus twice width gives the perimeter; ten inches covers the join and the mitered corners. That length over the usable width, rounded up, gives whole strips, and the strips times their width gives the fabric to cut.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports quilt perimeter and binding needed and strips and fabric to cut and fabric to buy.</p><ul><li><strong>Quilt width</strong> — in.</li><li><strong>Quilt length</strong> — in.</li><li><strong>Strip width</strong> — in. Two and a quarter for double-fold binding, two and a half for a generous one with a wide stitch line.</li><li><strong>Usable fabric width</strong> — in. A 44-inch bolt is 42 inches usable once the selvedges are cut off.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Quilt perimeter</strong> — in.</li><li><strong>Binding needed</strong> — in.</li><li><strong>Strips</strong> — strips.</li><li><strong>Fabric to cut</strong> — in.</li><li><strong>Fabric to buy</strong> — yd.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put quilt width = 60 in, quilt length = 80 in, strip width = 2.5 in, usable fabric width = 42 in into the form and the panel reads:</p><ul><li><strong>Quilt perimeter</strong> = <code>2 × (Quilt width + Quilt length)</code> = <strong>280 in</strong></li><li><strong>Binding needed</strong> = <code>2 × (Quilt width + Quilt length) + 10</code> = <strong>290 in</strong></li><li><strong>Strips</strong> = <code>ceil((2 × (Quilt width + Quilt length) + 10) ÷ Usable fabric width)</code> = <strong>7 strips</strong></li><li><strong>Fabric to cut</strong> = <code>ceil((2 × (Quilt width + Quilt length) + 10) ÷ Usable fabric width) × Strip width</code> = <strong>17.5 in</strong></li><li><strong>Fabric to buy</strong> = <code>ceil((2 × (Quilt width + Quilt length) + 10) ÷ Usable fabric width) × Strip width ÷ 36</code> = <strong>0.486 yd</strong></li></ul><p>A queen at 90 by 108 has a 396-inch perimeter and needs ten strips, which is 2.5 inches of fabric per strip — under three quarters of a yard.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>2 × (60 + 80)</code>, which comes to <strong>280 in</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>A 60 by 80 quilt has a 280-inch perimeter and takes 290 inches of binding: seven strips of 42 inches, 17.5 inches of fabric, half a yard.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Quilt perimeter</th><th>Binding needed</th><th>Strips</th><th>Fabric to cut</th><th>Fabric to buy</th></tr></thead><tbody><tr><td><strong>Quilt width</strong> +10 %</td><td>+4.29 %</td><td>+4.14 %</td><td>+14.29 %</td><td>+14.29 %</td><td>+14.29 %</td></tr><tr><td><strong>Quilt length</strong> +10 %</td><td>+5.71 %</td><td>+5.52 %</td><td>+14.29 %</td><td>+14.29 %</td><td>+14.29 %</td></tr><tr><td><strong>Strip width</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Usable fabric width</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Quilt width</strong>. <strong>Usable fabric width</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Quilt width</strong> opens at 60 in</li><li><strong>Quilt length</strong> opens at 80 in</li><li><strong>Strip width</strong> opens at 2.5 in — Two and a quarter for double-fold binding, two and a half for a generous one with a wide stitch line.</li><li><strong>Usable fabric width</strong> opens at 42 in — A 44-inch bolt is 42 inches usable once the selvedges are cut off.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Quilt width</th><th>Quilt perimeter</th><th>Binding needed</th><th>Strips</th><th>Fabric to cut</th><th>Fabric to buy</th></tr></thead><tbody><tr><td>30 in</td><td>220</td><td>230</td><td>6</td><td>15</td><td>0.417</td></tr><tr><td>60 in</td><td>280</td><td>290</td><td>7</td><td>17.5</td><td>0.486</td></tr><tr><td>120 in</td><td>400</td><td>410</td><td>10</td><td>25</td><td>0.694</td></tr><tr><td>300 in</td><td>760</td><td>770</td><td>19</td><td>47.5</td><td>1.319</td></tr><tr><td>600 in</td><td>1 360</td><td>1 370</td><td>33</td><td>82.5</td><td>2.292</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set quilt width = 90, quilt length = 108, strip width = 2.5, usable fabric width = 42: <strong>Quilt perimeter</strong> = 396 in, <strong>Binding needed</strong> = 406 in, <strong>Strips</strong> = 10 strips, <strong>Fabric to cut</strong> = 25 in, <strong>Fabric to buy</strong> = 0.694 yd. A 90 by 108 quilt needs 406 inches of binding — ten strips, 25 inches of fabric, 0.69 yards.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using the bolt width instead of the usable width.</strong> Selvedges are woven tighter and do not fold. Cutting 44 strips from a 44-inch bolt gives you one strip that will not behave.</li><li><strong>Forgetting the diagonal join.</strong> Strips joined on the diagonal need a little more length than a straight butt seam, and the ten-inch allowance covers it.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Straight binding.</strong> Bias binding stretches round curves and needs a longer strip for the same perimeter — fifteen per cent more for a round quilt.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need quilt width and quilt length and strip width and usable fabric width. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Quilt perimeter and binding needed and strips and fabric to cut and fabric to buy should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Buying binding fabric with the rest of the backing.</li></li><li><li>Checking whether the leftovers in the stash are enough.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/quilt">Quilt size</a> <a href="/everyday-life/half-square-triangle">Half-square triangles</a> <a href="/everyday-life/fabric">Fabric conversion</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Quilt width</strong> ×10</td><td>280</td><td>1 360</td><td>×4.857</td></tr><tr><td><strong>Quilt length</strong> ×10</td><td>280</td><td>1 720</td><td>×6.143</td></tr><tr><td><strong>Strip width</strong> ×10</td><td>280</td><td>280</td><td>unchanged</td></tr><tr><td><strong>Usable fabric width</strong> ×10</td><td>280</td><td>280</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Quilt Binding calculator work out?', 'a' => <<<'TXT'
            It returns quilt perimeter and binding needed and strips and fabric to cut and fabric to buy from quilt width and quilt length and strip width and usable fabric width. The relationship is 2 × (Quilt width + Quilt length).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Quilt width (in), Quilt length (in), Strip width (in), Usable fabric width (in). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: quilt width in in; quilt length in in; strip width in in; usable fabric width in in. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why add ten inches?', 'a' => 'For the join where the binding meets itself, and for the corners, which take up fabric when mitered. Ten inches is the usual allowance.'],
            ['q' => 'How wide should binding be?', 'a' => 'Two and a quarter inches folded double gives a quarter-inch finished binding. Two and a half is easier to work with and finishes slightly wider.'],
            ['q' => 'Can I use the backing as binding?', 'a' => <<<'TXT'
            Yes — bring it round to the front and stitch it down. That method needs two to three inches of backing beyond the batting on every side, and no separate strips.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/quilt', 'name' => 'Quilt size'],
            ['path' => '/everyday-life/half-square-triangle', 'name' => 'Half-square triangles'],
            ['path' => '/everyday-life/fabric', 'name' => 'Fabric conversion'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
