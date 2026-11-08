<?php

/**
 * Round pen
 * /construction/round-pen
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Round pen',
    'meta' => ['title' => 'Round Pen Calculator: Corral Panels Needed Tool', 'description' => 'Work out how many corral panels it takes to close a round pen of a given diameter, with the circumference and the cost of the set. The formula is shown.', 'h1' => 'Round pen', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'diameter',
                    'label' => 'Pen diameter',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '50',
                    'help' => 'Across the pen',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'panel_length',
                    'label' => 'Panel length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'Standard panels are 10 to 16 ft',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price per panel',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '180',
                    'help' => 'Delivered',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'circumference',
                    'label' => 'Circumference',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'panels',
                    'label' => 'Panels',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'actual_area',
                    'label' => 'Pen area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'cost',
                    'label' => 'Panel cost',
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
            'title' => 'Round pen',
            'results' => [
                'circumference' => 'pi*diameter',
                'panels' => 'ceil(pi*diameter/panel_length)',
                'actual_area' => 'pi/4*pow(diameter,2)',
                'cost' => 'ceil(pi*diameter/panel_length)*price',
                'diameter' => 'circumference/pi',
                'panel_length' => 'circumference/panels',
                'price' => 'cost/panels',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Panels = ceiling(π × diameter ÷ panel length)</strong>: the circumference divided by one panel, rounded up to a number you can actually build.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A round pen is bought in panels and measured in diameter, and the two do not divide into each other: a 50 ft pen is 157 ft round, which is thirteen panels of twelve with a foot left over. Ordering twelve leaves a gap; the thirteenth laps its neighbour slightly.</p><p>The page reports <strong>circumference and panels and pen area and panel cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Circumference</strong></td><td><code>pi × Pen diameter</code></td></tr><tr><td><strong>Panels</strong></td><td><code>ceil(pi × Pen diameter ÷ Panel length)</code></td></tr><tr><td><strong>Pen area</strong></td><td><code>pi ÷ 4 × (Pen diameter)^2</code></td></tr><tr><td><strong>Panel cost</strong></td><td><code>ceil(pi × Pen diameter ÷ Panel length) × Price per panel</code></td></tr><tr><td><strong>Pen diameter</strong></td><td><code>Circumference ÷ pi</code></td></tr><tr><td><strong>Panel length</strong></td><td><code>Circumference ÷ Panels</code></td></tr><tr><td><strong>Price per panel</strong></td><td><code>Panel cost ÷ Panels</code></td></tr></tbody></table><p><p>The panel count is rounded up, so the pen you build is a hair larger than the one you asked for — the panel ends overlap slightly, which is normal. The area shown is the circle of the diameter, not the panel polygon.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports circumference and panels and pen area and panel cost.</p><ul><li><strong>Pen diameter</strong> — in ft. Across the pen</li><li><strong>Panel length</strong> — in ft. Standard panels are 10 to 16 ft</li><li><strong>Price per panel</strong> — in $. Delivered</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Circumference</strong> — in ft</li><li><strong>Panels</strong></li><li><strong>Pen area</strong> — in ft²</li><li><strong>Panel cost</strong> — in $</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Pen diameter = 50 ft, Panel length = 12 ft, Price per panel = 180 $ — and the results panel reads:</p><ul><li><strong>Circumference</strong> = <code>pi × Pen diameter</code> = <strong>157.08 ft</strong></li><li><strong>Panels</strong> = <code>ceil(pi × Pen diameter ÷ Panel length)</code> = <strong>14</strong></li><li><strong>Pen area</strong> = <code>pi ÷ 4 × (Pen diameter)^2</code> = <strong>1 963.495 ft²</strong></li><li><strong>Panel cost</strong> = <code>ceil(pi × Pen diameter ÷ Panel length) × Price per panel</code> = <strong>2 520 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>pi × 50 = 157.08</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 50 ft pen takes 157.08 ft of rail, so 14 panels of 12 ft — the last one laps its neighbour a little. At $180 each the pen costs 2 520.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the panel count against the circumference: a 60 ft pen is 189 ft, which is sixteen panels of twelve. If the count seems high, the diameter is being measured as a radius.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Circumference</th><th>Panels</th><th>Pen area</th><th>Panel cost</th></tr></thead><tbody><tr><td><strong>Pen diameter</strong> +10 %</td><td>+10 %</td><td>+7.14 %</td><td>+21 %</td><td>+7.14 %</td></tr><tr><td><strong>Panel length</strong> +10 %</td><td>+0 %</td><td>−7.14 %</td><td>+0 %</td><td>−7.14 %</td></tr><tr><td><strong>Price per panel</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Pen diameter</strong>: a ten per cent move there shifts the result by about 21 per cent. The least sensitive is <strong>Panel length</strong>, at 7.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Pen diameter = 40, Panel length = 10, Price per panel = 150, the page reports <strong>Circumference</strong> = 125.664 ft, <strong>Panels</strong> = 13, <strong>Pen area</strong> = 1 256.637 ft², <strong>Panel cost</strong> = 1 950 $. A smaller training pen in shorter panels — easier to set up alone.</li><li>With Pen diameter = 60, Panel length = 16, Price per panel = 220, the page reports <strong>Circumference</strong> = 188.496 ft, <strong>Panels</strong> = 12, <strong>Pen area</strong> = 2 827.433 ft², <strong>Panel cost</strong> = 2 640 $. A large pen in long panels: fewer joints, heavier to handle.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Radius used as diameter.</strong> Half the panels arrive.</li><li><strong>Gate left out of the count.</strong> A gate panel replaces one rail panel.</li><li><strong>Ground anchors forgotten.</strong> Panels walk in soft ground.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Circumference (ft), Panels, Pen area (ft²), Panel cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Diameter and panel length in feet, circumference in feet, area in square feet, panels as a whole count and cost in dollars.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need pen diameter and panel length and price per panel. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Circumference and panels and pen area and panel cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Pen diameter</strong> ×10</td><td>157.08</td><td>1 570.796</td><td>ten times larger</td></tr><tr><td><strong>Panel length</strong> ×10</td><td>157.08</td><td>157.08</td><td>unchanged</td></tr><tr><td><strong>Price per panel</strong> ×10</td><td>157.08</td><td>157.08</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A closed circle.</strong> Pens with straight sides need their own perimeter.</li><li><strong>Level ground.</strong> Panels on a slope need longer posts.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Buying panels for a round pen.</li></li><li><li>Checking a pen's area against a training standard.</li></li><li><li>Estimating a set-up cost.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/fence">Fence</a> <a href="/construction/fence-perimeter">Fence perimeter</a> <a href="/construction/hoop-house">Hoop house</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Round pen calculator work out?', 'a' => 'It returns circumference and panels and pen area and panel cost from pen diameter and panel length and price per panel. The relationship is pi × Pen diameter.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Pen diameter (ft), Panel length (ft), Price per panel ($). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: pen diameter in ft; panel length in ft; price per panel in $. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many panels for a 50 foot round pen?', 'a' => 'Fourteen 12 ft panels, from a circumference of 157 ft.'],
            ['q' => 'How big should a round pen be?', 'a' => 'Forty to sixty feet across for groundwork; larger for lungeing a fit horse.'],
        ],
        'related' => [
            ['path' => '/construction/fence', 'name' => 'Fence'],
            ['path' => '/construction/fence-perimeter', 'name' => 'Fence perimeter'],
            ['path' => '/construction/hoop-house', 'name' => 'Hoop house'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
