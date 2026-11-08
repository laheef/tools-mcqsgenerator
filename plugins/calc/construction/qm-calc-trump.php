<?php

/**
 * Border wall cost
 * /construction/trump
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Border wall cost',
    'meta' => ['title' => 'Border Wall Cost Calculator: Panels and Concrete', 'description' => 'Model the cost of a long border wall from its length, height and panel size, with concrete for the footing, steel and a panel price you supply. Units shown.', 'h1' => 'Border wall cost', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Wall length',
                    'type' => 'number',
                    'suffix' => 'mi',
                    'default' => '1000',
                    'help' => 'Miles of wall',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'height',
                    'label' => 'Wall height',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '30',
                    'help' => 'Above ground',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'panel_length',
                    'label' => 'Panel length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '30',
                    'help' => 'Precast or steel panel',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'panel_price',
                    'label' => 'Panel cost',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '9000',
                    'help' => 'Supplied and set',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'concrete_price',
                    'label' => 'Concrete',
                    'type' => 'number',
                    'suffix' => '$/yd³',
                    'default' => '150',
                    'help' => 'Footing concrete',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'panels',
                    'label' => 'Panels',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'wall_area',
                    'label' => 'Wall face',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'concrete_yd3',
                    'label' => 'Footing concrete',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd³',
                ],
                [
                    'name' => 'total_cost',
                    'label' => 'Total cost',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Border wall cost',
            'results' => [
                'panels' => 'ceil(length*5280/panel_length)',
                'wall_area' => 'length*5280*height',
                'concrete_yd3' => 'length*5280*2*2/27',
                'total_cost' => 'ceil(length*5280/panel_length)*panel_price+length*5280*2*2/27*concrete_price',
                'length' => 'panels*panel_length/5280',
                'height' => 'wall_area/(length*5280)',
                'panel_price' => '(total_cost-length*5280*2*2/27*concrete_price)/panels',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Panels come from the length and the panel size: <strong>panels = ceiling(length × 5 280 ÷ panel length)</strong>, and the cost is panels times the price, plus the footing.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A border wall is a long, simple structure, which makes it a good exercise in order-of-magnitude costing: the panel count drives everything, and at a thousand miles the numbers stop being intuitive. The model is deliberately plain — rectangular panels on a continuous footing — so each input can be argued with on its own.</p><p>The page reports <strong>panels and wall face and footing concrete and total cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Panels</strong></td><td><code>ceil(Wall length × 5280 ÷ Panel length)</code></td></tr><tr><td><strong>Wall face</strong></td><td><code>Wall length × 5280 × Wall height</code></td></tr><tr><td><strong>Footing concrete</strong></td><td><code>Wall length × 5280 × 2 × 2 ÷ 27</code></td></tr><tr><td><strong>Total cost</strong></td><td><code>ceil(Wall length × 5280 ÷ Panel length) × Panel cost+Wall length × 5280 × 2 × 2 ÷ 27 × Concrete</code></td></tr><tr><td><strong>Wall length</strong></td><td><code>Panels × Panel length ÷ 5280</code></td></tr><tr><td><strong>Wall height</strong></td><td><code>Wall face ÷ (Wall length × 5280)</code></td></tr><tr><td><strong>Panel cost</strong></td><td><code>(Total cost-Wall length × 5280 × 2 × 2 ÷ 27 × Concrete) ÷ Panels</code></td></tr></tbody></table><p><p>The length is converted to feet once and used for both the panel count and the footing. The footing is taken as two feet wide by two feet deep throughout, which is a plausible continuous strip for a thirty-foot wall and is the largest single unknown in the model.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports panels and wall face and footing concrete and total cost.</p><ul><li><strong>Wall length</strong> — in mi. Miles of wall</li><li><strong>Wall height</strong> — in ft. Above ground</li><li><strong>Panel length</strong> — in ft. Precast or steel panel</li><li><strong>Panel cost</strong> — in $. Supplied and set</li><li><strong>Concrete</strong> — in $/yd³. Footing concrete</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Panels</strong></li><li><strong>Wall face</strong> — in ft²</li><li><strong>Footing concrete</strong> — in yd³</li><li><strong>Total cost</strong> — in $</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Wall length = 1 000 mi, Wall height = 30 ft, Panel length = 30 ft, Panel cost = 9 000 $, Concrete = 150 $/yd³ — and the results panel reads:</p><ul><li><strong>Panels</strong> = <code>ceil(Wall length × 5280 ÷ Panel length)</code> = <strong>176 000</strong></li><li><strong>Wall face</strong> = <code>Wall length × 5280 × Wall height</code> = <strong>1.584 × 10<sup>8</sup> ft²</strong></li><li><strong>Footing concrete</strong> = <code>Wall length × 5280 × 2 × 2 ÷ 27</code> = <strong>782 222.222 yd³</strong></li><li><strong>Total cost</strong> = <code>ceil(Wall length × 5280 ÷ Panel length) × Panel cost+Wall length × 5280 × 2 × 2 ÷ 27 × Concrete</code> = <strong>1.701 × 10<sup>9</sup> $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>ceil(1 000 × 5280 ÷ 30) = 176 000</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A thousand miles of thirty-foot wall in thirty-foot panels needs 176 000 panels and presents 1.584 × 10<sup>8</sup> ft² of face. On a 2 by 2 ft footing that is 782 222.222 yd³ of concrete, and at the prices entered the total is 1.701 × 10<sup>9</sup> $.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the footing cost against the panel cost: at these defaults the footing is under a tenth of the panels. Where the two are closer than that, the ground is carrying more than the model assumes.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Panels</th><th>Wall face</th><th>Footing concrete</th><th>Total cost</th></tr></thead><tbody><tr><td><strong>Wall length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Wall height</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Panel length</strong> +10 %</td><td>−9.09 %</td><td>+0 %</td><td>+0 %</td><td>−8.46 %</td></tr><tr><td><strong>Panel cost</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+9.31 %</td></tr><tr><td><strong>Concrete</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0.69 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Wall length</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Concrete</strong>, at 0.7 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Wall length = 700, Wall height = 18, Panel length = 20, Panel cost = 6 500, Concrete = 150, the page reports <strong>Panels</strong> = 184 800, <strong>Wall face</strong> = 6.653 × 10<sup>7</sup> ft², <strong>Footing concrete</strong> = 547 555.556 yd³, <strong>Total cost</strong> = 1.283 × 10<sup>9</sup> $. A shorter run at a lower height: the panel count, not the face area, drives the cost.</li><li>With Wall length = 2 000, Wall height = 30, Panel length = 40, Panel cost = 12 000, Concrete = 160, the page reports <strong>Panels</strong> = 264 000, <strong>Wall face</strong> = 3.168 × 10<sup>8</sup> ft², <strong>Footing concrete</strong> = 1.564 × 10<sup>6</sup> yd³, <strong>Total cost</strong> = 3.418 × 10<sup>9</sup> $. A longer run in bigger panels: fewer joints, heavier lifts.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Prices treated as facts.</strong> They are inputs; change them to match a real bid.</li><li><strong>Length in miles typed as feet.</strong> The panel count collapses by 5 280.</li><li><strong>Footing assumed constant.</strong> Ground conditions change it more than anything else in the model.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Panels, Wall face (ft²), Footing concrete (yd³), Total cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Length in miles, height and panel length in feet, prices in dollars and dollars per cubic yard, wall face in square feet and footing in cubic yards.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need wall length and wall height and panel length and panel cost and concrete. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Panels and wall face and footing concrete and total cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Wall length</strong> ×10</td><td>176 000</td><td>1.76 × 10<sup>6</sup></td><td>ten times larger</td></tr><tr><td><strong>Wall height</strong> ×10</td><td>176 000</td><td>176 000</td><td>unchanged</td></tr><tr><td><strong>Panel length</strong> ×10</td><td>176 000</td><td>17 600</td><td>ten times smaller</td></tr><tr><td><strong>Panel cost</strong> ×10</td><td>176 000</td><td>176 000</td><td>unchanged</td></tr><tr><td><strong>Concrete</strong> ×10</td><td>176 000</td><td>176 000</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A parametric model.</strong> It is not a cost estimate for any real project.</li><li><strong>No land, access or maintenance.</strong> Those are separate lines.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Exploring how length and panel size drive cost.</li></li><li><li>Comparing a twenty-foot wall with a thirty.</li></li><li><li>Testing a price assumption against a bid.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/fence">Fence</a> <a href="/construction/retaining-wall">Retaining wall</a> <a href="/construction/concrete-slab">Concrete slab</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Border wall cost calculator work out?', 'a' => <<<'TXT'
            It returns panels and wall face and footing concrete and total cost from wall length and wall height and panel length and panel cost and concrete. The relationship is ceil(Wall length × 5280 ÷ Panel length).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Wall length (mi), Wall height (ft), Panel length (ft), Panel cost ($), Concrete ($/yd³). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: wall length in mi; wall height in ft; panel length in ft; panel cost in $; concrete in $/yd³. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many panels for a thousand miles of wall?', 'a' => '176 000 panels of thirty feet.'],
            ['q' => 'What drives the cost most?', 'a' => 'The panel count and the footing: at these defaults the panels are about four fifths of the total.'],
        ],
        'related' => [
            ['path' => '/construction/fence', 'name' => 'Fence'],
            ['path' => '/construction/retaining-wall', 'name' => 'Retaining wall'],
            ['path' => '/construction/concrete-slab', 'name' => 'Concrete slab'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
