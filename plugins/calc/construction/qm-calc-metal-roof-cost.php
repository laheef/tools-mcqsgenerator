<?php

/**
 * Metal roof cost
 * /construction/metal-roof-cost
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Metal roof cost',
    'meta' => ['title' => 'Metal Roof Cost Calculator: Panels and Price', 'description' => 'Work out the true roof area from the plan size and the pitch, the number of metal panels it takes, and the total cost with a waste allowance. Units shown.', 'h1' => 'Metal roof cost', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Roof length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '40',
                    'help' => 'Along the ridge',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Roof width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '24',
                    'help' => 'Eave to eave',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pitch',
                    'label' => 'Pitch',
                    'type' => 'number',
                    'suffix' => 'in/12',
                    'default' => '6',
                    'help' => 'Rise per 12 in of run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'panel_width',
                    'label' => 'Panel width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '36',
                    'help' => 'Cover width of a panel',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'panel_length',
                    'label' => 'Panel length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'Supplied length',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Waste',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Cuts and laps',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price per panel',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '85',
                    'help' => 'Delivered',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pitch_factor',
                    'label' => 'Pitch factor',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'roof_area',
                    'label' => 'Roof area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'panels',
                    'label' => 'Panels',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cost',
                    'label' => 'Cost',
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
            'title' => 'Metal roof cost',
            'results' => [
                'pitch_factor' => 'sqrt(1+pow(pitch/12,2))',
                'roof_area' => 'length*width*sqrt(1+pow(pitch/12,2))',
                'panels' => 'ceil(length*width*sqrt(1+pow(pitch/12,2))*(1+waste/100)/(panel_width/12*panel_length))',
                'cost' => 'ceil(length*width*sqrt(1+pow(pitch/12,2))*(1+waste/100)/(panel_width/12*panel_length))*price',
                'length' => 'roof_area/(width*sqrt(1+pow(pitch/12,2)))',
                'width' => 'roof_area/(length*sqrt(1+pow(pitch/12,2)))',
                'panel_width' => 'length*width*sqrt(1+pow(pitch/12,2))*(1+waste/100)/panels*12/panel_length',
                'panel_length' => 'length*width*sqrt(1+pow(pitch/12,2))*(1+waste/100)/panels/(panel_width/12)',
                'waste' => '(panels*(panel_width/12*panel_length)/roof_area-1)*100',
                'price' => 'cost/panels',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p><strong>Roof area = footprint × pitch factor</strong>, where the factor is √(1 + (rise ÷ 12)²), then <strong>panels = ceiling(area × (1 + waste) ÷ panel area)</strong>.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A metal roof is priced from the roof area, and the roof area is always larger than the plan: at a 6 in 12 pitch it is twelve per cent bigger, and at 12 in 12 it is forty-one per cent bigger. Ordering panels from the footprint is how a roofing job comes up short.</p><p>The page reports <strong>pitch factor and roof area and panels and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Pitch factor</strong></td><td><code>√(1+(Pitch ÷ 12)^2)</code></td></tr><tr><td><strong>Roof area</strong></td><td><code>Roof length × Roof width × √(1+(Pitch ÷ 12)^2)</code></td></tr><tr><td><strong>Panels</strong></td><td><code>ceil(Roof length × Roof width × √(1+(Pitch ÷ 12)^2) × (1+Waste ÷ 100) ÷ (Panel width ÷ 12 × Panel length))</code></td></tr><tr><td><strong>Cost</strong></td><td><code>ceil(Roof length × Roof width × √(1+(Pitch ÷ 12)^2) × (1+Waste ÷ 100) ÷ (Panel width ÷ 12 × Panel length)) × Price per panel</code></td></tr><tr><td><strong>Roof length</strong></td><td><code>Roof area ÷ (Roof width × √(1+(Pitch ÷ 12)^2))</code></td></tr><tr><td><strong>Roof width</strong></td><td><code>Roof area ÷ (Roof length × √(1+(Pitch ÷ 12)^2))</code></td></tr><tr><td><strong>Panel width</strong></td><td><code>Roof length × Roof width × √(1+(Pitch ÷ 12)^2) × (1+Waste ÷ 100) ÷ Panels × 12 ÷ Panel length</code></td></tr><tr><td><strong>Panel length</strong></td><td><code>Roof length × Roof width × √(1+(Pitch ÷ 12)^2) × (1+Waste ÷ 100) ÷ Panels ÷ (Panel width ÷ 12)</code></td></tr><tr><td><strong>Waste</strong></td><td><code>(Panels × (Panel width ÷ 12 × Panel length) ÷ Roof area-1) × 100</code></td></tr><tr><td><strong>Price per panel</strong></td><td><code>Cost ÷ Panels</code></td></tr></tbody></table><p><p>The pitch factor is the hypotenuse of a 12 in run and a rise equal to the pitch, so a 6 in 12 roof gives √(1 + 0.25) = 1.118. The panel count then divides the covered area by the cover width times the panel length, and rounds up.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 7 boxes and the page has everything it needs. It reports pitch factor and roof area and panels and cost.</p><ul><li><strong>Roof length</strong> — in ft. Along the ridge</li><li><strong>Roof width</strong> — in ft. Eave to eave</li><li><strong>Pitch</strong> — in in/12. Rise per 12 in of run</li><li><strong>Panel width</strong> — in in. Cover width of a panel</li><li><strong>Panel length</strong> — in ft. Supplied length</li><li><strong>Waste</strong> — in %. Cuts and laps</li><li><strong>Price per panel</strong> — in $. Delivered</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Pitch factor</strong></li><li><strong>Roof area</strong> — in ft²</li><li><strong>Panels</strong></li><li><strong>Cost</strong> — in $</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Roof length = 40 ft, Roof width = 24 ft, Pitch = 6 in/12, Panel width = 36 in, Panel length = 12 ft, Waste = 10 %, Price per panel = 85 $ — and the results panel reads:</p><ul><li><strong>Pitch factor</strong> = <code>√(1+(Pitch ÷ 12)^2)</code> = <strong>1.118</strong></li><li><strong>Roof area</strong> = <code>Roof length × Roof width × √(1+(Pitch ÷ 12)^2)</code> = <strong>1 073.313 ft²</strong></li><li><strong>Panels</strong> = <code>ceil(Roof length × Roof width × √(1+(Pitch ÷ 12)^2) × (1+Waste ÷ 100) ÷ (Panel width ÷ 12 × Panel length))</code> = <strong>33</strong></li><li><strong>Cost</strong> = <code>ceil(Roof length × Roof width × √(1+(Pitch ÷ 12)^2) × (1+Waste ÷ 100) ÷ (Panel width ÷ 12 × Panel length)) × Price per panel</code> = <strong>2 805 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>sqrt(1+pow(6 ÷ 12,2)) = 1.118</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 40 by 24 roof at 6 in 12 has a pitch factor of 1.118 and a true area of 1 073.313 ft². In 36 in by 12 ft panels that is 33 panels and 2 805.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the pitch factor against the pitch: 3 in 12 gives 1.03, 6 in 12 gives 1.12, 12 in 12 gives 1.41. A factor of 1.0 means the pitch is being ignored.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Pitch factor</th><th>Roof area</th><th>Panels</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Roof length</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+12.12 %</td><td>+12.12 %</td></tr><tr><td><strong>Roof width</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+12.12 %</td><td>+12.12 %</td></tr><tr><td><strong>Pitch</strong> +10 %</td><td>+2.08 %</td><td>+2.08 %</td><td>+3.03 %</td><td>+3.03 %</td></tr><tr><td><strong>Panel width</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td><td>−9.09 %</td></tr><tr><td><strong>Panel length</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td><td>−9.09 %</td></tr><tr><td><strong>Waste</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+3.03 %</td><td>+3.03 %</td></tr><tr><td><strong>Price per panel</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Roof length</strong>: a ten per cent move there shifts the result by about 12.1 per cent. The least sensitive is <strong>Waste</strong>, at 3 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Roof length = 30, Roof width = 20, Pitch = 4, Panel width = 24, Panel length = 10, Waste = 12, Price per panel = 60, the page reports <strong>Pitch factor</strong> = 1.054, <strong>Roof area</strong> = 632.456 ft², <strong>Panels</strong> = 36, <strong>Cost</strong> = 2 160 $. A low pitch in narrow panels: less waste on the slope, more panels.</li><li>With Roof length = 60, Roof width = 30, Pitch = 12, Panel width = 36, Panel length = 16, Waste = 10, Price per panel = 120, the page reports <strong>Pitch factor</strong> = 1.414, <strong>Roof area</strong> = 2 545.584 ft², <strong>Panels</strong> = 59, <strong>Cost</strong> = 7 080 $. A steep roof: the pitch factor alone adds forty per cent to the area.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Footprint used as roof area.</strong> The pitch always adds.</li><li><strong>Cover width used as panel width.</strong> Laps are excluded from the cover.</li><li><strong>Ridge and trim left out.</strong> They are separate line items.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Pitch factor, Roof area (ft²), Panels, Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Roof dimensions in feet, pitch in inches of rise per 12 in of run, panel width in inches, panel length in feet, area in square feet and cost in dollars.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need roof length and roof width and pitch and panel width and panel length and waste and price per panel. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Pitch factor and roof area and panels and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Roof length</strong> ×10</td><td>1.118</td><td>1.118</td><td>unchanged</td></tr><tr><td><strong>Roof width</strong> ×10</td><td>1.118</td><td>1.118</td><td>unchanged</td></tr><tr><td><strong>Pitch</strong> ×10</td><td>1.118</td><td>5.099</td><td>×4.561</td></tr><tr><td><strong>Panel width</strong> ×10</td><td>1.118</td><td>1.118</td><td>unchanged</td></tr><tr><td><strong>Panel length</strong> ×10</td><td>1.118</td><td>1.118</td><td>unchanged</td></tr><tr><td><strong>Waste</strong> ×10</td><td>1.118</td><td>1.118</td><td>unchanged</td></tr><tr><td><strong>Price per panel</strong> ×10</td><td>1.118</td><td>1.118</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A gable or a single slope.</strong> Hips and valleys waste more.</li><li><strong>Panels only.</strong> Fasteners, ridge, trim and underlay are extra.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Pricing a metal roof.</li></li><li><li>Checking a roofer's panel count.</li></li><li><li>Comparing pitches by area.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/roof-pitch">Roof pitch</a> <a href="/construction/roofing">Roofing</a> <a href="/construction/roof-shingle">Roof shingle</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Metal roof cost calculator work out?', 'a' => <<<'TXT'
            It returns pitch factor and roof area and panels and cost from roof length and roof width and pitch and panel width and panel length and waste and price per panel. The relationship is √(1+(Pitch ÷ 12)^2).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Roof length (ft), Roof width (ft), Pitch (in/12), Panel width (in), Panel length (ft), Waste (%), Price per panel ($). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: roof length in ft; roof width in ft; pitch in in/12; panel width in in; panel length in ft; waste in %; price per panel in $. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much bigger is a roof than its footprint?', 'a' => 'About twelve per cent at a 6 in 12 pitch, and forty-one per cent at 12 in 12.'],
            ['q' => 'How do I work out the pitch factor?', 'a' => 'The square root of one plus the pitch over twelve, squared.'],
        ],
        'related' => [
            ['path' => '/construction/roof-pitch', 'name' => 'Roof pitch'],
            ['path' => '/construction/roofing', 'name' => 'Roofing'],
            ['path' => '/construction/roof-shingle', 'name' => 'Roof shingle'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
