<?php

/**
 * Quilt Size Calculator
 * /everyday-life/quilt
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Quilt Size Calculator',
    'meta' => ['title' => 'Quilt Size — Top, Batting and Backing — Free Tool', 'description' => 'A quilt top plus an allowance on every side gives the batting and the backing, in inches, square feet and square yards, so the shop order is right first time.', 'h1' => 'Quilt Size Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'top_w',
                    'label' => 'Quilt top width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '60',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'top_l',
                    'label' => 'Quilt top length',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '80',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'extra',
                    'label' => 'Batting extra each side',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '2',
                    'help' => 'Two inches is the minimum for a home machine; longarm quilters usually ask for four.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'backing_extra',
                    'label' => 'Backing extra each side',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '4',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'batting_w',
                    'label' => 'Batting width',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'batting_l',
                    'label' => 'Batting length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'backing_w',
                    'label' => 'Backing width',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'backing_l',
                    'label' => 'Backing length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'backing_yd',
                    'label' => 'Backing fabric',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'sq yd',
                ],
            ],
        ],
    ],
    'formula' => [
        'batting_w' => 'top_w + 2 * extra',
        'batting_l' => 'top_l + 2 * extra',
        'backing_w' => 'top_w + 2 * backing_extra',
        'backing_l' => 'top_l + 2 * backing_extra',
        'backing_yd' => '(top_w + 2 * backing_extra) * (top_l + 2 * backing_extra) / 1296',
    ],
    'article' => [
        'intro' => 'The batting and backing sizes for a finished quilt top, with the allowance a longarmer and a home machine both need, in inches and in square yards to buy.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Three layers, three sizes. The top is the size it is; the batting goes two inches beyond it on every side; the backing goes four, because it has to be gripped at the edges and there has to be enough left for the binding.</p><p>A 60 by 80 top therefore takes a 64 by 84 piece of batting and a 68 by 88 backing — 4.6 square yards, which is why backing is bought in three-yard lengths of a wide fabric or pieced from two widths of a standard one.</p><p>The answer is <strong>batting width and batting length and backing width and backing length and backing fabric</strong>, worked out from quilt top width and quilt top length and batting extra each side and backing extra each side. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>batting_w</strong></td><td><code>Quilt top width + 2 × Batting extra each side</code></td></tr><tr><td><strong>batting_l</strong></td><td><code>Quilt top length + 2 × Batting extra each side</code></td></tr><tr><td><strong>backing_w</strong></td><td><code>Quilt top width + 2 × Backing extra each side</code></td></tr><tr><td><strong>backing_l</strong></td><td><code>Quilt top length + 2 × Backing extra each side</code></td></tr><tr><td><strong>backing_yd</strong></td><td><code>(Quilt top width + 2 × Backing extra each side) × (Quilt top length + 2 × Backing extra each side) ÷ 1296</code></td></tr></tbody></table><p>Each allowance is added twice, once per edge. The backing area divides square inches by 1 296, the number in a square yard, which is what fabric is sold in.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports batting width and batting length and backing width and backing length and backing fabric.</p><ul><li><strong>Quilt top width</strong> — in.</li><li><strong>Quilt top length</strong> — in.</li><li><strong>Batting extra each side</strong> — in. Two inches is the minimum for a home machine; longarm quilters usually ask for four.</li><li><strong>Backing extra each side</strong> — in.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Batting width</strong> — in.</li><li><strong>Batting length</strong> — in.</li><li><strong>Backing width</strong> — in.</li><li><strong>Backing length</strong> — in.</li><li><strong>Backing fabric</strong> — sq yd.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put quilt top width = 60 in, quilt top length = 80 in, batting extra each side = 2 in, backing extra each side = 4 in into the form and the panel reads:</p><ul><li><strong>Batting width</strong> = <code>Quilt top width + 2 × Batting extra each side</code> = <strong>64 in</strong></li><li><strong>Batting length</strong> = <code>Quilt top length + 2 × Batting extra each side</code> = <strong>84 in</strong></li><li><strong>Backing width</strong> = <code>Quilt top width + 2 × Backing extra each side</code> = <strong>68 in</strong></li><li><strong>Backing length</strong> = <code>Quilt top length + 2 × Backing extra each side</code> = <strong>88 in</strong></li><li><strong>Backing fabric</strong> = <code>(Quilt top width + 2 × Backing extra each side) × (Quilt top length + 2 × Backing extra each side) ÷ 1296</code> = <strong>4.617 sq yd</strong></li></ul><p>A longarm needs four inches of batting on every side, which turns the same top into 68 by 88 and a backing of 4.99 square yards — a third of a yard more.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>60 + 2 × 2</code>, which comes to <strong>64 in</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>A 60 by 80 top takes 64 by 84 batting and a 68 by 88 backing: 5 984 square inches, or 4.62 square yards.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Batting width</th><th>Batting length</th><th>Backing width</th><th>Backing length</th><th>Backing fabric</th></tr></thead><tbody><tr><td><strong>Quilt top width</strong> +10 %</td><td>+9.38 %</td><td>+0 %</td><td>+8.82 %</td><td>+0 %</td><td>+8.82 %</td></tr><tr><td><strong>Quilt top length</strong> +10 %</td><td>+0 %</td><td>+9.52 %</td><td>+0 %</td><td>+9.09 %</td><td>+9.09 %</td></tr><tr><td><strong>Batting extra each side</strong> +10 %</td><td>+0.63 %</td><td>+0.48 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Backing extra each side</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+1.18 %</td><td>+0.91 %</td><td>+2.1 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Quilt top length</strong>. <strong>Batting extra each side</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Quilt top width</strong> opens at 60 in</li><li><strong>Quilt top length</strong> opens at 80 in</li><li><strong>Batting extra each side</strong> opens at 2 in — Two inches is the minimum for a home machine; longarm quilters usually ask for four.</li><li><strong>Backing extra each side</strong> opens at 4 in</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Quilt top width</th><th>Batting width</th><th>Batting length</th><th>Backing width</th><th>Backing length</th><th>Backing fabric</th></tr></thead><tbody><tr><td>30 in</td><td>34</td><td>84</td><td>38</td><td>88</td><td>2.58</td></tr><tr><td>60 in</td><td>64</td><td>84</td><td>68</td><td>88</td><td>4.617</td></tr><tr><td>120 in</td><td>124</td><td>84</td><td>128</td><td>88</td><td>8.691</td></tr><tr><td>300 in</td><td>304</td><td>84</td><td>308</td><td>88</td><td>20.914</td></tr><tr><td>600 in</td><td>604</td><td>84</td><td>608</td><td>88</td><td>41.284</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set quilt top width = 60, quilt top length = 80, batting extra each side = 4, backing extra each side = 4: <strong>Batting width</strong> = 68 in, <strong>Batting length</strong> = 88 in, <strong>Backing width</strong> = 68 in, <strong>Backing length</strong> = 88 in, <strong>Backing fabric</strong> = 4.617 sq yd. Four inches of batting each side gives 68 by 88 and the same backing: 4.99 square yards, a third more than the home-machine allowance.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Cutting batting to the top's size.</strong> A quilted top pulls in by an inch or two across, and batting cut flush leaves the edges short after quilting.</li><li><strong>Forgetting the backing has to be wider than one bolt.</strong> A 68-inch backing from a 42-inch fabric is two panels and a seam, and the seam has to be planned before it is sewn.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Rectangular quilts.</strong> A quilt with a pieced border or an irregular edge needs the largest width and length measured across it, not the average.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need quilt top width and quilt top length and batting extra each side and backing extra each side. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Batting width and batting length and backing width and backing length and backing fabric should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Ordering batting and backing before a longarm booking.</li></li><li><li>Checking whether a wide backing is cheaper than piecing one.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/quilt-binding">Quilt binding</a> <a href="/everyday-life/hexagon-quilt">Hexagon quilt</a> <a href="/everyday-life/fabric">Fabric conversion</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Quilt top width</strong> ×10</td><td>64</td><td>604</td><td>×9.438</td></tr><tr><td><strong>Quilt top length</strong> ×10</td><td>64</td><td>64</td><td>unchanged</td></tr><tr><td><strong>Batting extra each side</strong> ×10</td><td>64</td><td>100</td><td>×1.562</td></tr><tr><td><strong>Backing extra each side</strong> ×10</td><td>64</td><td>64</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Quilt Size calculator work out?', 'a' => <<<'TXT'
            It returns batting width and batting length and backing width and backing length and backing fabric from quilt top width and quilt top length and batting extra each side and backing extra each side. The relationship is Quilt top width + 2 × Batting extra each side.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Quilt top width (in), Quilt top length (in), Batting extra each side (in), Backing extra each side (in). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: quilt top width in in; quilt top length in in; batting extra each side in in; backing extra each side in in. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How much bigger should batting be than the top?', 'a' => 'Two inches each side for a home machine and four for a longarm. The extra is what the frame grips and what the quilting pulls in.'],
            ['q' => 'How much backing do I need?', 'a' => 'Four inches each side, plus enough to come round for the binding if you are binding from the back. The page gives the flat figure.'],
            ['q' => 'Why measure backing in square yards?', 'a' => <<<'TXT'
            Because fabric is sold by length at a fixed width. A 4.6 square yard backing in 108-inch wide fabric is 1.6 running yards; in 42-inch fabric it is three lengths of 2.6 yards.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/quilt-binding', 'name' => 'Quilt binding'],
            ['path' => '/everyday-life/hexagon-quilt', 'name' => 'Hexagon quilt'],
            ['path' => '/everyday-life/fabric', 'name' => 'Fabric conversion'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
