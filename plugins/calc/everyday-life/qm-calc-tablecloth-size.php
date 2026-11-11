<?php

/**
 * Tablecloth Size Calculator
 * /everyday-life/tablecloth-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Tablecloth Size Calculator',
    'meta' => ['title' => 'Tablecloth Size — the Drop Decides Everything', 'description' => 'Table size plus the drop you want gives the cloth to buy, round or rectangular, with the fabric area in square yards for a made-to-measure tablecloth.', 'h1' => 'Tablecloth Size Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'shape',
                    'label' => 'Table shape',
                    'type' => 'select',
                    'options' => ['Round table' => 1, 'Rectangular table' => 0],
                    'control' => 'SELECT',
                    'default' => 'Round table',
                ],
                [
                    'name' => 'diameter',
                    'label' => 'Round table diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '60',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'length',
                    'label' => 'Table length',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '72',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Table width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '36',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'drop',
                    'label' => 'Drop at the edge',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '12',
                    'help' => 'Ten to twelve inches is a casual drop, fifteen is formal, and thirty puts the cloth on the floor.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cloth_length',
                    'label' => 'Cloth length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'cloth_width',
                    'label' => 'Cloth width',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'area',
                    'label' => 'Fabric area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'sq yd',
                ],
                [
                    'name' => 'drop_check',
                    'label' => 'Drop used',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
            ],
        ],
    ],
    'formula' => ['cloth_length' => 'if_else(shape > 0.5, diameter + 2 * drop, length + 2 * drop)', 'cloth_width' => 'if_else(shape > 0.5, diameter + 2 * drop, width + 2 * drop)', 'area' => 'if_else(shape > 0.5, pi * ((diameter + 2 * drop) / 2) * ((diameter + 2 * drop) / 2) / 1296, (length + 2 * drop) * (width + 2 * drop) / 1296)', 'drop_check' => 'drop'],
    'article' => [
        'intro' => 'The size of tablecloth to buy for a given table and drop, for round and rectangular tables, and the area of fabric the cloth takes, in square yards.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>The table is sixty inches across and the shop sells cloths in 70, 90 and 108. Which one hangs properly depends on the drop, and the drop is the only decision in the calculation: ten inches for a kitchen table, fifteen for dinner, thirty to the floor.</p><p>The cloth is the table plus twice the drop, because the cloth hangs on both sides. Sixty plus two twelves is 84 inches, which is why the 90 hangs a little long and the 70 does not hang at all.</p><p>The answer is <strong>cloth length and cloth width and fabric area and drop used</strong>, worked out from table shape and round table diameter and table length and table width and drop at the edge. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>cloth_length</strong></td><td><code>if_else(Table shape > 0.5, Round table diameter + 2 × Drop at the edge, Table length + 2 × Drop at the edge)</code></td></tr><tr><td><strong>cloth_width</strong></td><td><code>if_else(Table shape > 0.5, Round table diameter + 2 × Drop at the edge, Table width + 2 × Drop at the edge)</code></td></tr><tr><td><strong>area</strong></td><td><code>if_else(Table shape > 0.5, pi × ((Round table diameter + 2 × Drop at the edge) ÷ 2) × ((Round table diameter + 2 × Drop at the edge) ÷ 2) ÷ 1296, (Table length + 2 × Drop at the edge) × (Table width + 2 × Drop at the edge) ÷ 1296)</code></td></tr><tr><td><strong>drop_check</strong></td><td><code>Drop at the edge</code></td></tr></tbody></table><p>Table dimension plus drop added twice. The area divides square inches by 1 296, which is 36 by 36, to give square yards of fabric — the unit dress fabric is sold in.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill. It reports cloth length and cloth width and fabric area and drop used.</p><ul><li><strong>Table shape</strong>. A choice: Round table, Rectangular table.</li><li><strong>Round table diameter</strong> — in.</li><li><strong>Table length</strong> — in.</li><li><strong>Table width</strong> — in.</li><li><strong>Drop at the edge</strong> — in. Ten to twelve inches is a casual drop, fifteen is formal, and thirty puts the cloth on the floor.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Cloth length</strong> — in.</li><li><strong>Cloth width</strong> — in.</li><li><strong>Fabric area</strong> — sq yd.</li><li><strong>Drop used</strong> — in.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put table shape = 1, round table diameter = 60 in, table length = 72 in, table width = 36 in, drop at the edge = 12 in into the form and the panel reads:</p><ul><li><strong>Cloth length</strong> = <code>if_else(Table shape > 0.5, Round table diameter + 2 × Drop at the edge, Table length + 2 × Drop at the edge)</code> = <strong>84 in</strong></li><li><strong>Cloth width</strong> = <code>if_else(Table shape > 0.5, Round table diameter + 2 × Drop at the edge, Table width + 2 × Drop at the edge)</code> = <strong>84 in</strong></li><li><strong>Fabric area</strong> = <code>if_else(Table shape > 0.5, pi × ((Round table diameter + 2 × Drop at the edge) ÷ 2) × ((Round table diameter + 2 × Drop at the edge) ÷ 2) ÷ 1296, (Table length + 2 × Drop at the edge) × (Table width + 2 × Drop at the edge) ÷ 1296)</code> = <strong>4.276 sq yd</strong></li><li><strong>Drop used</strong> = <code>Drop at the edge</code> = <strong>12 in</strong></li></ul><p>A rectangular 72 by 36 table at the same 12-inch drop needs 96 by 60, 4.44 square yards. The round and the rectangle are close, and the rectangle is the one with corners to get right.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>if_else(1 > 0.5, 60 + 2 × 12, 72 + 2 × 12)</code>, which comes to <strong>84 in</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A 60-inch round table with a 12-inch drop needs an 84-inch round cloth, which is 4.28 square yards of fabric. The same table at a 30-inch drop to the floor needs 120 inches.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Cloth length</th><th>Cloth width</th><th>Fabric area</th><th>Drop used</th></tr></thead><tbody><tr><td><strong>Table shape</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Round table diameter</strong> +10 %</td><td>+7.14 %</td><td>+7.14 %</td><td>+14.8 %</td><td>+0 %</td></tr><tr><td><strong>Table length</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Table width</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Drop at the edge</strong> +10 %</td><td>+2.86 %</td><td>+2.86 %</td><td>+5.8 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Round table diameter</strong>. <strong>Table width</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Table shape</strong> opens at 1</li><li><strong>Round table diameter</strong> opens at 60 in</li><li><strong>Table length</strong> opens at 72 in</li><li><strong>Table width</strong> opens at 36 in</li><li><strong>Drop at the edge</strong> opens at 12 in — Ten to twelve inches is a casual drop, fifteen is formal, and thirty puts the cloth on the floor.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set table shape = 1, round table diameter = 60, table length = 72, table width = 36, drop at the edge = 30: <strong>Cloth length</strong> = 120 in, <strong>Cloth width</strong> = 120 in, <strong>Fabric area</strong> = 8.727 sq yd, <strong>Drop used</strong> = 30 in. Floor length for a 60-inch round table is a 120-inch cloth, 8.73 square yards, which is why floor-length rounds are usually hired rather than bought.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Buying the table size as the cloth size.</strong> A 60-inch round cloth on a 60-inch table covers the top and nothing else. Every cloth size quoted is the finished cloth, not the table.</li><li><strong>Forgetting the table thickness.</strong> A thick top and an apron make the drop a couple of inches shorter than the geometry says.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No seam allowance.</strong> The area is the finished cloth. A wide round table needs a pieced cloth, and cut sizes have to allow for seams.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need table shape and round table diameter and table length and table width and drop at the edge. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Cloth length and cloth width and fabric area and drop used should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Buying a cloth without measuring the one you already have.</li></li><li><li>Estimating fabric for a cloth you will sew.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/garbage-bag-size">Garbage bag size</a> <a href="/everyday-life/rug-size">Rug size</a> <a href="/everyday-life/curtain-size">Curtain size</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Table shape</strong> ×10</td><td>84</td><td>84</td><td>unchanged</td></tr><tr><td><strong>Round table diameter</strong> ×10</td><td>84</td><td>624</td><td>×7.429</td></tr><tr><td><strong>Table length</strong> ×10</td><td>84</td><td>84</td><td>unchanged</td></tr><tr><td><strong>Table width</strong> ×10</td><td>84</td><td>84</td><td>unchanged</td></tr><tr><td><strong>Drop at the edge</strong> ×10</td><td>84</td><td>300</td><td>×3.571</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Tablecloth Size calculator work out?', 'a' => <<<'TXT'
            It returns cloth length and cloth width and fabric area and drop used from table shape and round table diameter and table length and table width and drop at the edge. The relationship is if_else(Table shape > 0.5, Round table diameter + 2 × Drop at the edge, Table length + 2 × Drop at the edge).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Table shape, Round table diameter (in), Table length (in), Table width (in), Drop at the edge (in). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: round table diameter in in; table length in in; table width in in; drop at the edge in in. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What drop should a dining table have?', 'a' => <<<'TXT'
            Ten to twelve inches for everyday use, fifteen for a formal setting, and about thirty if you want the cloth on the floor. The drop is measured from the tabletop down.
            TXT],
            ['q' => 'How do I size a cloth for an oval table?', 'a' => 'Treat it as the rectangle that encloses it and add the drop twice; an oval cloth is then cut from that rectangle. The area figure is the fabric you need.'],
            ['q' => 'Why do shop sizes skip from 70 to 90 inches?', 'a' => <<<'TXT'
            Because 70 covers a 48-inch table with a short drop and 90 covers the 60-inch one with a standard drop. The gap is where the awkward sizes live and where made to measure starts.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/garbage-bag-size', 'name' => 'Garbage bag size'],
            ['path' => '/everyday-life/rug-size', 'name' => 'Rug size'],
            ['path' => '/everyday-life/curtain-size', 'name' => 'Curtain size'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
