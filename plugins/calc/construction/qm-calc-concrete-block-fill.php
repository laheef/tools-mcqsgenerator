<?php

/**
 * Concrete block fill
 * /construction/concrete-block-fill
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Concrete block fill',
    'meta' => ['title' => 'Concrete Block Fill Calculator: Grout Volume', 'description' => 'Work out the grout a block wall needs from the number of blocks and the core each one holds, and how many 80 lb bags of grout mix that comes to in total.', 'h1' => 'Concrete block fill', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'blocks',
                    'label' => 'Number of blocks',
                    'type' => 'number',
                    'default' => '200',
                    'help' => 'From the block count for the wall',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'core_volume',
                    'label' => 'Core volume per block',
                    'type' => 'number',
                    'suffix' => 'in³',
                    'default' => '400',
                    'help' => 'About 400 in³ for a standard 8 in block',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Wastage',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Grout spills and overfill',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'grout_ft3',
                    'label' => 'Grout volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'grout_yd3',
                    'label' => 'Grout volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd³',
                ],
                [
                    'name' => 'bags_80lb',
                    'label' => 'Bags of grout mix (80 lb)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Concrete block fill',
            'results' => [
                'grout_ft3' => 'blocks*core_volume/1728',
                'grout_yd3' => 'blocks*core_volume/46656*(1+waste/100)',
                'bags_80lb' => 'ceil(blocks*core_volume/1728*(1+waste/100)/0.45)',
                'blocks' => 'grout_ft3*1728/core_volume',
                'core_volume' => 'grout_ft3*1728/blocks',
                'waste' => '(grout_yd3/(blocks*core_volume/46656)-1)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Grout fills the cores of hollow block. With a core volume of <strong>c</strong> cubic inches per block, a wall of <strong>n</strong> blocks holds <strong>n·c ÷ 46656</strong> cubic yards before any waste.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A reinforced block wall is grouted solid, and the grout is ordered by the yard like concrete. Counting it from the cores is far more reliable than guessing a depth of fill across the wall's face.</p><p>The page reports <strong>grout volume (ft³) and grout volume (yd³) and bags of grout mix (80 lb)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Grout volume (ft³)</strong></td><td><code>Number of blocks × Core volume per block ÷ 1728</code></td></tr><tr><td><strong>Grout volume (yd³)</strong></td><td><code>Number of blocks × Core volume per block ÷ 46656 × (1+Wastage ÷ 100)</code></td></tr><tr><td><strong>Bags of grout mix (80 lb)</strong></td><td><code>ceil(Number of blocks × Core volume per block ÷ 1728 × (1+Wastage ÷ 100) ÷ 0.45)</code></td></tr><tr><td><strong>Number of blocks</strong></td><td><code>Grout volume (ft³) × 1728 ÷ Core volume per block</code></td></tr><tr><td><strong>Core volume per block</strong></td><td><code>Grout volume (ft³) × 1728 ÷ Number of blocks</code></td></tr><tr><td><strong>Wastage</strong></td><td><code>(Grout volume (yd³) ÷ (Number of blocks × Core volume per block ÷ 46656)-1) × 100</code></td></tr></tbody></table><p><p>There are 1 728 cubic inches in a cubic foot and 46 656 in a cubic yard. An 80 lb bag of grout mix yields about 0.45 ft³, less than concrete because the mix is leaner and flows into the cores.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports grout volume (ft³) and grout volume (yd³) and bags of grout mix (80 lb).</p><ul><li><strong>Number of blocks</strong>. From the block count for the wall</li><li><strong>Core volume per block</strong> — in in³. About 400 in³ for a standard 8 in block</li><li><strong>Wastage</strong> — in %. Grout spills and overfill</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Grout volume</strong> — in ft³</li><li><strong>Grout volume</strong> — in yd³</li><li><strong>Bags of grout mix (80 lb)</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Number of blocks = 200, Core volume per block = 400 in³, Wastage = 10 % — and the results panel reads:</p><ul><li><strong>Grout volume</strong> = <code>Number of blocks × Core volume per block ÷ 1728</code> = <strong>46.296 ft³</strong></li><li><strong>Grout volume</strong> = <code>Number of blocks × Core volume per block ÷ 46656 × (1+Wastage ÷ 100)</code> = <strong>1.886 yd³</strong></li><li><strong>Bags of grout mix (80 lb)</strong> = <code>ceil(Number of blocks × Core volume per block ÷ 1728 × (1+Wastage ÷ 100) ÷ 0.45)</code> = <strong>114</strong></li></ul><p>With the numbers written into the formula, the first result is <code>200 × 400 ÷ 1728 = 46.296</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Two hundred 8 in blocks with 400 in³ cores hold 80 000 in³, which is 46.3 ft³ or 1.71 yd³. With ten per cent waste that is 1.89 yd³, or 114 bags if you are mixing it yourself.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Compare the yardage with the wall's own volume: solid grout in an 8 in wall comes to about two thirds of the wall's gross volume, because the webs stay unfilled. A figure far above that means the core volume is too high.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Grout volume</th><th>Grout volume</th><th>Bags of grout mix (80 lb)</th></tr></thead><tbody><tr><td><strong>Number of blocks</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+9.65 %</td></tr><tr><td><strong>Core volume per block</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+9.65 %</td></tr><tr><td><strong>Wastage</strong> +10 %</td><td>+0 %</td><td>+0.91 %</td><td>+0.88 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Number of blocks</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Wastage</strong>, at 0.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Number of blocks = 450, Core volume per block = 500, Wastage = 15, the page reports <strong>Grout volume</strong> = 130.208 ft³, <strong>Grout volume</strong> = 5.546 yd³, <strong>Bags of grout mix (80 lb)</strong> = 333. A 12 in block wall: 130 ft³, 4.8 yd³ before waste, 5.5 with fifteen per cent.</li><li>With Number of blocks = 60, Core volume per block = 400, Wastage = 10, the page reports <strong>Grout volume</strong> = 13.889 ft³, <strong>Grout volume</strong> = 0.566 yd³, <strong>Bags of grout mix (80 lb)</strong> = 34. A short pier run: 13.9 ft³ and 0.51 yd³ — a bag job, not a truck.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Every block assumed grouted.</strong> Only cells with rebar, and the ones a specification names, are filled; counting all of them can double the order.</li><li><strong>Core volume guessed from the face size.</strong> The core is smaller and varies with block thickness and web design.</li><li><strong>Grout treated as concrete.</strong> Grout has a lower yield per bag and a different slump; the bag count is not interchangeable.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Grout volume (ft³), Grout volume (yd³), Bags of grout mix (80 lb).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Core volumes in cubic inches, results in cubic feet and cubic yards. The block count is a whole number; the grout volume carries the waste percentage and the bag count rounds up.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need number of blocks and core volume per block and wastage. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Grout volume (ft³) and grout volume (yd³) and bags of grout mix (80 lb) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Number of blocks</strong> ×10</td><td>46.296</td><td>462.963</td><td>ten times larger</td></tr><tr><td><strong>Core volume per block</strong> ×10</td><td>46.296</td><td>462.963</td><td>ten times larger</td></tr><tr><td><strong>Wastage</strong> ×10</td><td>46.296</td><td>46.296</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Straight walls.</strong> Bond beams and lintels take additional grout the block count does not include.</li><li><strong>A single block size.</strong> Mixed block sizes need the count split by type.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering grout for a reinforced wall.</li></li><li><li>Estimating bags for a small pier.</li></li><li><li>Checking a masonry quote's grout line.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/concrete-block">Concrete block</a> <a href="/construction/grout">Grout</a> <a href="/construction/rebar">Rebar</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Concrete block fill calculator work out?', 'a' => <<<'TXT'
            It returns grout volume (ft³) and grout volume (yd³) and bags of grout mix (80 lb) from number of blocks and core volume per block and wastage. The relationship is Number of blocks × Core volume per block ÷ 1728.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Number of blocks, Core volume per block (in³), Wastage (%). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: core volume per block in in³; wastage in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much grout does a block wall take?', 'a' => 'Roughly two thirds of the wall\'s gross volume when every core is filled, or a little over half a cubic yard per hundred 8 in blocks.'],
            ['q' => 'Does every core need grouting?', 'a' => 'No — only cores with reinforcement and those a specification calls out. Filling all of them is common for basement walls but not for every wall.'],
        ],
        'related' => [
            ['path' => '/construction/concrete-block', 'name' => 'Concrete block'],
            ['path' => '/construction/grout', 'name' => 'Grout'],
            ['path' => '/construction/rebar', 'name' => 'Rebar'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
