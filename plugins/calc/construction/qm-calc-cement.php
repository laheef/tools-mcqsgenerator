<?php

/**
 * Cement
 * /construction/cement
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cement',
    'meta' => ['title' => 'Cement Calculator: Bags, Sand and Aggregate', 'description' => 'Work out the cement, sand and aggregate a volume of concrete needs from the mix ratio, and how many 94 lb bags of cement that comes to for the whole pour.', 'h1' => 'Cement', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'volume',
                    'label' => 'Concrete volume',
                    'type' => 'number',
                    'suffix' => 'ft³',
                    'default' => '27',
                    'help' => 'One cubic yard is 27 ft³',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cement_parts',
                    'label' => 'Cement parts',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'One part in a 1:2:3 mix',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'sand_parts',
                    'label' => 'Sand parts',
                    'type' => 'number',
                    'default' => '2',
                    'help' => 'Two parts',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'aggregate_parts',
                    'label' => 'Aggregate parts',
                    'type' => 'number',
                    'default' => '3',
                    'help' => 'Three parts',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Allowance',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '33',
                    'help' => 'Dry mix bulks; a third is the usual allowance',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cement_ft3',
                    'label' => 'Cement volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'sand_ft3',
                    'label' => 'Sand volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'aggregate_ft3',
                    'label' => 'Aggregate volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'cement_bags',
                    'label' => 'Bags of cement (94 lb)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Cement',
            'results' => [
                'cement_ft3' => 'volume*cement_parts/(cement_parts+sand_parts+aggregate_parts)*(1+waste/100)',
                'sand_ft3' => 'volume*sand_parts/(cement_parts+sand_parts+aggregate_parts)*(1+waste/100)',
                'aggregate_ft3' => 'volume*aggregate_parts/(cement_parts+sand_parts+aggregate_parts)*(1+waste/100)',
                'cement_bags' => 'ceil(volume*cement_parts/(cement_parts+sand_parts+aggregate_parts)*(1+waste/100))',
                'volume' => 'cement_ft3*(cement_parts+sand_parts+aggregate_parts)/(cement_parts*(1+waste/100))',
                'waste' => '(cement_ft3*(cement_parts+sand_parts+aggregate_parts)/(volume*cement_parts)-1)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A 1:2:3 mix is one part cement, two sand and three aggregate by volume. For <strong>V</strong> cubic feet of concrete, cement takes <strong>V ÷ (1 + 2 + 3)</strong> of the total — plus a third for bulking and waste.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Mixing on site is all about parts: a 1:2:3 mix is the general-purpose concrete everyone knows, 1:1½:3 is stronger and 1:3:6 is mass concrete for footings. The parts are by volume, and the allowance for bulking is what makes the bags come out right.</p><p>The page reports <strong>cement volume and sand volume and aggregate volume and bags of cement (94 lb)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Cement volume</strong></td><td><code>Concrete volume × Cement parts ÷ (Cement parts+Sand parts+Aggregate parts) × (1+Allowance ÷ 100)</code></td></tr><tr><td><strong>Sand volume</strong></td><td><code>Concrete volume × Sand parts ÷ (Cement parts+Sand parts+Aggregate parts) × (1+Allowance ÷ 100)</code></td></tr><tr><td><strong>Aggregate volume</strong></td><td><code>Concrete volume × Aggregate parts ÷ (Cement parts+Sand parts+Aggregate parts) × (1+Allowance ÷ 100)</code></td></tr><tr><td><strong>Bags of cement (94 lb)</strong></td><td><code>ceil(Concrete volume × Cement parts ÷ (Cement parts+Sand parts+Aggregate parts) × (1+Allowance ÷ 100))</code></td></tr><tr><td><strong>Concrete volume</strong></td><td><code>Cement volume × (Cement parts+Sand parts+Aggregate parts) ÷ (Cement parts × (1+Allowance ÷ 100))</code></td></tr><tr><td><strong>Allowance</strong></td><td><code>(Cement volume × (Cement parts+Sand parts+Aggregate parts) ÷ (Concrete volume × Cement parts)-1) × 100</code></td></tr></tbody></table><p><p>The cement fraction is its share of the total parts. A 94 lb bag of cement is one cubic foot, which is why the cement volume and the bag count are the same number rounded up.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports cement volume and sand volume and aggregate volume and bags of cement (94 lb).</p><ul><li><strong>Concrete volume</strong> — in ft³. One cubic yard is 27 ft³</li><li><strong>Cement parts</strong>. One part in a 1:2:3 mix</li><li><strong>Sand parts</strong>. Two parts</li><li><strong>Aggregate parts</strong>. Three parts</li><li><strong>Allowance</strong> — in %. Dry mix bulks; a third is the usual allowance</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Cement volume</strong> — in ft³</li><li><strong>Sand volume</strong> — in ft³</li><li><strong>Aggregate volume</strong> — in ft³</li><li><strong>Bags of cement (94 lb)</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Concrete volume = 27 ft³, Cement parts = 1, Sand parts = 2, Aggregate parts = 3, Allowance = 33 % — and the results panel reads:</p><ul><li><strong>Cement volume</strong> = <code>Concrete volume × Cement parts ÷ (Cement parts+Sand parts+Aggregate parts) × (1+Allowance ÷ 100)</code> = <strong>5.985 ft³</strong></li><li><strong>Sand volume</strong> = <code>Concrete volume × Sand parts ÷ (Cement parts+Sand parts+Aggregate parts) × (1+Allowance ÷ 100)</code> = <strong>11.97 ft³</strong></li><li><strong>Aggregate volume</strong> = <code>Concrete volume × Aggregate parts ÷ (Cement parts+Sand parts+Aggregate parts) × (1+Allowance ÷ 100)</code> = <strong>17.955 ft³</strong></li><li><strong>Bags of cement (94 lb)</strong> = <code>ceil(Concrete volume × Cement parts ÷ (Cement parts+Sand parts+Aggregate parts) × (1+Allowance ÷ 100))</code> = <strong>6</strong></li></ul><p>With the numbers written into the formula, the first result is <code>27 × 1 ÷ (1+2+3) × (1+33 ÷ 100) = 5.985</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>One cubic yard at 1:2:3 with a third allowance: cement 27 × ⅙ × 1.33 = 6 ft³, sand 12 ft³, aggregate 18 ft³ — six bags of cement, 12 ft³ of sand and 18 ft³ of gravel.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Check the mix against the job: 1:2:3 is about 3 500 psi, 1:1½:3 about 4 500, and 1:3:6 nearer 2 000. A mix richer than the job needs wastes cement and makes the concrete shrink more.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Cement volume</th><th>Sand volume</th><th>Aggregate volume</th><th>Bags of cement (94 lb)</th></tr></thead><tbody><tr><td><strong>Concrete volume</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+16.67 %</td></tr><tr><td><strong>Cement parts</strong> +10 %</td><td>+8.2 %</td><td>−1.64 %</td><td>−1.64 %</td><td>+16.67 %</td></tr><tr><td><strong>Sand parts</strong> +10 %</td><td>−3.23 %</td><td>+6.45 %</td><td>−3.23 %</td><td>+0 %</td></tr><tr><td><strong>Aggregate parts</strong> +10 %</td><td>−4.76 %</td><td>−4.76 %</td><td>+4.76 %</td><td>+0 %</td></tr><tr><td><strong>Allowance</strong> +10 %</td><td>+2.48 %</td><td>+2.48 %</td><td>+2.48 %</td><td>+16.67 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Concrete volume</strong>: a ten per cent move there shifts the result by about 16.7 per cent. The least sensitive is <strong>Aggregate parts</strong>, at 4.8 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Concrete volume = 8, Cement parts = 1, Sand parts = 2, Aggregate parts = 3, Allowance = 33, the page reports <strong>Cement volume</strong> = 1.773 ft³, <strong>Sand volume</strong> = 3.547 ft³, <strong>Aggregate volume</strong> = 5.32 ft³, <strong>Bags of cement (94 lb)</strong> = 2. A small slab: 1.8 ft³ of cement — two bags — with 3.6 ft³ of sand and 5.3 of aggregate.</li><li>With Concrete volume = 54, Cement parts = 1, Sand parts = 1.5, Aggregate parts = 3, Allowance = 10, the page reports <strong>Cement volume</strong> = 10.8 ft³, <strong>Sand volume</strong> = 16.2 ft³, <strong>Aggregate volume</strong> = 32.4 ft³, <strong>Bags of cement (94 lb)</strong> = 11. Two yards of a richer 1:1½:3 mix: 10.8 ft³ of cement, 11 bags, and 16.2 ft³ of sand.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Parts read as weights.</strong> The ratio is by volume; weighing the sand and calling it a part changes the mix.</li><li><strong>The bulking allowance left out.</strong> Dry sand and aggregate bulk up when shovelled, and a mix without the allowance comes out short.</li><li><strong>Cement bags counted as concrete bags.</strong> A 94 lb bag of cement is not an 80 lb bag of premixed concrete.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Cement volume (ft³), Sand volume (ft³), Aggregate volume (ft³), Bags of cement (94 lb).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Volumes in cubic feet, and the bag count is whole 94 lb bags — one per cubic foot of cement. The parts are plain numbers and carry no units themselves.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need concrete volume and cement parts and sand parts and aggregate parts and allowance. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Cement volume and sand volume and aggregate volume and bags of cement (94 lb) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Concrete volume</strong> ×10</td><td>5.985</td><td>59.85</td><td>ten times larger</td></tr><tr><td><strong>Cement parts</strong> ×10</td><td>5.985</td><td>23.94</td><td>×4</td></tr><tr><td><strong>Sand parts</strong> ×10</td><td>5.985</td><td>1.496</td><td>×0.25</td></tr><tr><td><strong>Aggregate parts</strong> ×10</td><td>5.985</td><td>1.088</td><td>×0.182</td></tr><tr><td><strong>Allowance</strong> ×10</td><td>5.985</td><td>19.35</td><td>×3.233</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Volume batching only.</strong> Weight batching is more accurate and is what a plant does.</li><li><strong>No water.</strong> The water-cement ratio is the single biggest factor in strength, and it is not in this ratio.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering sand, aggregate and cement for a site mix.</li></li><li><li>Scaling a known mix to a bigger pour.</li></li><li><li>Checking a contractor's materials list.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/concrete-slab">Concrete slab</a> <a href="/construction/sand">Sand</a> <a href="/construction/gravel">Gravel</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cement calculator work out?', 'a' => <<<'TXT'
            It returns cement volume and sand volume and aggregate volume and bags of cement (94 lb) from concrete volume and cement parts and sand parts and aggregate parts and allowance. The relationship is Concrete volume × Cement parts ÷ (Cement parts+Sand parts+Aggregate parts) × (1+Allowance ÷ 100).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Concrete volume (ft³), Cement parts, Sand parts, Aggregate parts, Allowance (%). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: concrete volume in ft³; allowance in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What does a 1:2:3 mix mean?', 'a' => 'One part cement, two parts sand and three parts coarse aggregate, by volume. It is the standard general-purpose mix, around 3 500 psi.'],
            ['q' => 'How many bags of cement are in a yard of concrete?', 'a' => 'About six 94 lb bags at a 1:2:3 mix including the bulking allowance — a little over one bag per 4½ cubic feet.'],
        ],
        'related' => [
            ['path' => '/construction/concrete-slab', 'name' => 'Concrete slab'],
            ['path' => '/construction/sand', 'name' => 'Sand'],
            ['path' => '/construction/gravel', 'name' => 'Gravel'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
