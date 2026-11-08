<?php

/**
 * Rebar
 * /construction/rebar
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rebar',
    'meta' => ['title' => 'Rebar Calculator: Bar Count, Length and Weight', 'description' => 'Work out the rebar a slab needs: how many bars run each way, the total length to cut and the weight to order, from the slab size and the bar spacing. All shown.', 'h1' => 'Rebar', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Slab length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '20',
                    'help' => 'Along the bars\' run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Slab width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '10',
                    'help' => 'Across the run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'spacing',
                    'label' => 'Bar spacing',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '12',
                    'help' => '12 in for slab mesh, 18 for light slabs',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'bar_size',
                    'label' => 'Bar size',
                    'type' => 'number',
                    'suffix' => '#',
                    'default' => '4',
                    'help' => 'Number 4 is ½ in, 0.668 lb per foot',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'bars_length',
                    'label' => 'Bars running lengthwise',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'bars_width',
                    'label' => 'Bars running crosswise',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'total_length',
                    'label' => 'Total bar length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'weight',
                    'label' => 'Rebar weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Rebar',
            'results' => ['bars_length' => 'ceil(width*12/spacing-0.000000001)+1', 'bars_width' => 'ceil(length*12/spacing-0.000000001)+1', 'total_length' => '(ceil(width*12/spacing-0.000000001)+1)*length+(ceil(length*12/spacing-0.000000001)+1)*width', 'weight' => '((ceil(width*12/spacing-0.000000001)+1)*length+(ceil(length*12/spacing-0.000000001)+1)*width)*0.668*pow(bar_size/4,2)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Rebar goes in as a grid: bars running each way at a given spacing. With spacing <strong>s</strong> inches, a slab <strong>L × W</strong> feet takes <strong>W·12/s + 1</strong> bars one way and <strong>L·12/s + 1</strong> the other.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Rebar is specified by bar size and spacing, and ordered by weight. Getting from one to the other is a grid count and a multiply, and it is what turns a slab detail into a delivery note.</p><p>The page reports <strong>bars running lengthwise and bars running crosswise and total bar length and rebar weight</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Bars running lengthwise</strong></td><td><code>ceil(Slab width × 12 ÷ Bar spacing-0.000000001)+1</code></td></tr><tr><td><strong>Bars running crosswise</strong></td><td><code>ceil(Slab length × 12 ÷ Bar spacing-0.000000001)+1</code></td></tr><tr><td><strong>Total bar length</strong></td><td><code>(ceil(Slab width × 12 ÷ Bar spacing-0.000000001)+1) × Slab length+(ceil(Slab length × 12 ÷ Bar spacing-0.000000001)+1) × Slab width</code></td></tr><tr><td><strong>Rebar weight</strong></td><td><code>((ceil(Slab width × 12 ÷ Bar spacing-0.000000001)+1) × Slab length+(ceil(Slab length × 12 ÷ Bar spacing-0.000000001)+1) × Slab width) × 0.668 × (Bar size ÷ 4)^2</code></td></tr></tbody></table><p><p>Bars in each direction are the dimension in inches divided by the spacing, plus one because both edges get a bar. The weight uses 0.668 lb per foot for a #4 bar, scaled by the square of the size ratio — a #6 is 2¼ times the weight of a #4 per foot.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports bars running lengthwise and bars running crosswise and total bar length and rebar weight.</p><ul><li><strong>Slab length</strong> — in ft. Along the bars&#x27; run</li><li><strong>Slab width</strong> — in ft. Across the run</li><li><strong>Bar spacing</strong> — in in. 12 in for slab mesh, 18 for light slabs</li><li><strong>Bar size</strong> — in #. Number 4 is ½ in, 0.668 lb per foot</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Bars running lengthwise</strong></li><li><strong>Bars running crosswise</strong></li><li><strong>Total bar length</strong> — in ft</li><li><strong>Rebar weight</strong> — in lb</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Slab length = 20 ft, Slab width = 10 ft, Bar spacing = 12 in, Bar size = 4 # — and the results panel reads:</p><ul><li><strong>Bars running lengthwise</strong> = <code>ceil(Slab width × 12 ÷ Bar spacing-0.000000001)+1</code> = <strong>11</strong></li><li><strong>Bars running crosswise</strong> = <code>ceil(Slab length × 12 ÷ Bar spacing-0.000000001)+1</code> = <strong>21</strong></li><li><strong>Total bar length</strong> = <code>(ceil(Slab width × 12 ÷ Bar spacing-0.000000001)+1) × Slab length+(ceil(Slab length × 12 ÷ Bar spacing-0.000000001)+1) × Slab width</code> = <strong>430 ft</strong></li><li><strong>Rebar weight</strong> = <code>((ceil(Slab width × 12 ÷ Bar spacing-0.000000001)+1) × Slab length+(ceil(Slab length × 12 ÷ Bar spacing-0.000000001)+1) × Slab width) × 0.668 × (Bar size ÷ 4)^2</code> = <strong>287.24 lb</strong></li></ul><p>With the numbers written into the formula, the first result is <code>ceil(10 × 12 ÷ 12-0.000000001)+1 = 11</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 20 × 10 ft slab at 12 in spacing: 11 bars one way and 21 the other, giving 11 × 20 + 21 × 10 = 430 ft of #4 bar, which weighs 287 lb — just over seven 60 ft sticks.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Check the steel against the slab: a typical driveway is #4 at 12 to 18 in each way, while a structural slab has a designed schedule. The weight per square foot is a useful cross-check — about 1.4 lb/ft² here.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Bars running lengthwise</th><th>Bars running crosswise</th><th>Total bar length</th><th>Rebar weight</th></tr></thead><tbody><tr><td><strong>Slab length</strong> +10 %</td><td>+0 %</td><td>+9.52 %</td><td>+9.77 %</td><td>+9.77 %</td></tr><tr><td><strong>Slab width</strong> +10 %</td><td>+9.09 %</td><td>+0 %</td><td>+9.53 %</td><td>+9.53 %</td></tr><tr><td><strong>Bar spacing</strong> +10 %</td><td>+0 %</td><td>−4.76 %</td><td>−2.33 %</td><td>−2.33 %</td></tr><tr><td><strong>Bar size</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+21 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Bar size</strong>: a ten per cent move there shifts the result by about 21 per cent. The least sensitive is <strong>Bar spacing</strong>, at 4.8 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Slab length = 40, Slab width = 20, Bar spacing = 18, Bar size = 4, the page reports <strong>Bars running lengthwise</strong> = 15, <strong>Bars running crosswise</strong> = 28, <strong>Total bar length</strong> = 1 160 ft, <strong>Rebar weight</strong> = 774.88 lb. A 40 × 20 driveway at 18 in: 1 160 ft of bar, 775 lb.</li><li>With Slab length = 10, Slab width = 10, Bar spacing = 12, Bar size = 5, the page reports <strong>Bars running lengthwise</strong> = 11, <strong>Bars running crosswise</strong> = 11, <strong>Total bar length</strong> = 220 ft, <strong>Rebar weight</strong> = 229.625 lb. A ten-foot pad in #5: 220 ft and 230 lb, since #5 is 1.56 times the weight of #4 per foot.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Edge bars left out.</strong> The plus one is a bar on each edge; skipping it leaves both ends unreinforced.</li><li><strong>Weight taken from the length of the longest bars.</strong> Rebar is sold in stock lengths and cut with waste, so order by the weight plus a few per cent.</li><li><strong>Spacing measured centre to centre and counted as gaps.</strong> Twelve-inch spacing means a bar every foot, not twelve bars in twelve feet.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Bars running lengthwise, Bars running crosswise, Total bar length (ft), Rebar weight (lb).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Length and width in feet, spacing in inches, bar size as the standard number. The length comes out in feet and the weight in pounds, using the standard 0.668 lb/ft for #4.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need slab length and slab width and bar spacing and bar size. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Bars running lengthwise and bars running crosswise and total bar length and rebar weight should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Slab length</strong> ×10</td><td>11</td><td>11</td><td>unchanged</td></tr><tr><td><strong>Slab width</strong> ×10</td><td>11</td><td>101</td><td>×9.182</td></tr><tr><td><strong>Bar spacing</strong> ×10</td><td>11</td><td>2</td><td>×0.182</td></tr><tr><td><strong>Bar size</strong> ×10</td><td>11</td><td>11</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A flat slab grid.</strong> Beams, footings and cranked bars need their own counts.</li><li><strong>No laps.</strong> Lap lengths at joints add five to ten per cent to the length on site.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering rebar for a slab.</li></li><li><li>Estimating the steel in a driveway.</li></li><li><li>Checking a reinforcement schedule against the geometry.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/concrete-slab">Concrete slab</a> <a href="/construction/steel-weight">Steel weight</a> <a href="/construction/concrete-weight">Concrete weight</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rebar calculator work out?', 'a' => <<<'TXT'
            It returns bars running lengthwise and bars running crosswise and total bar length and rebar weight from slab length and slab width and bar spacing and bar size. The relationship is ceil(Slab width × 12 ÷ Bar spacing-0.000000001)+1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Slab length (ft), Slab width (ft), Bar spacing (in), Bar size (#). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: slab length in ft; slab width in ft; bar spacing in in; bar size in #. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much does #4 rebar weigh?', 'a' => '0.668 lb per foot, which is 40 lb for a 60 ft stick. Every size scales by the square of its diameter.'],
            ['q' => 'What spacing should slab rebar be?', 'a' => 'Twelve to eighteen inches each way for a driveway or patio; a structural slab follows its engineer\'s schedule.'],
        ],
        'related' => [
            ['path' => '/construction/concrete-slab', 'name' => 'Concrete slab'],
            ['path' => '/construction/steel-weight', 'name' => 'Steel weight'],
            ['path' => '/construction/concrete-weight', 'name' => 'Concrete weight'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
