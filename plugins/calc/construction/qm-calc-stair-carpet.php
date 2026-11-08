<?php

/**
 * Stair carpet
 * /construction/stair-carpet
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Stair carpet',
    'meta' => ['title' => 'Stair Carpet Calculator: Run and Area Guide', 'description' => 'Work out the carpet run and area for a flight of stairs from the number of steps, the riser height, the tread and the nosing, with the cost per square foot.', 'h1' => 'Stair carpet', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'steps',
                    'label' => 'Number of steps',
                    'type' => 'number',
                    'default' => '13',
                    'help' => 'Count the treads',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'riser',
                    'label' => 'Riser height',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '7.5',
                    'help' => 'Floor to floor divided by steps',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'tread',
                    'label' => 'Tread depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '10',
                    'help' => 'Going, without the nosing',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'nosing',
                    'label' => 'Nosing',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '1',
                    'help' => 'The lip over the riser',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Stair width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '3',
                    'help' => 'Wall to wall',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Waste',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Pattern match and cuts',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'suffix' => '$/ft²',
                    'default' => '3.5',
                    'help' => 'Supplied and laid',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'per_step',
                    'label' => 'Carpet per step',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'run',
                    'label' => 'Carpet run',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'area_ft2',
                    'label' => 'Area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
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
            'title' => 'Stair carpet',
            'results' => [
                'per_step' => 'riser+tread+nosing',
                'run' => 'steps*(riser+tread+nosing)/12',
                'area_ft2' => 'steps*(riser+tread+nosing)/12*width',
                'cost' => 'steps*(riser+tread+nosing)/12*width*(1+waste/100)*price',
                'steps' => 'run*12/per_step',
                'riser' => 'per_step-tread-nosing',
                'tread' => 'per_step-riser-nosing',
                'nosing' => 'per_step-riser-tread',
                'width' => 'area_ft2/run',
                'price' => 'cost/(area_ft2*(1+waste/100))',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Each step takes riser + tread + nosing</strong>, so the run is that times the number of steps, and <strong>area = run × stair width</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Stairs are where a carpet estimate goes wrong: the floor area of a flight is tiny, but the carpet has to fold over every tread and drop down every riser, so the run is roughly double the plan length. A fitter measuring the stairwell footprint will under-order by half.</p><p>The page reports <strong>carpet per step and carpet run and area and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Carpet per step</strong></td><td><code>Riser height+Tread depth+Nosing</code></td></tr><tr><td><strong>Carpet run</strong></td><td><code>Number of steps × (Riser height+Tread depth+Nosing) ÷ 12</code></td></tr><tr><td><strong>Area</strong></td><td><code>Number of steps × (Riser height+Tread depth+Nosing) ÷ 12 × Stair width</code></td></tr><tr><td><strong>Cost</strong></td><td><code>Number of steps × (Riser height+Tread depth+Nosing) ÷ 12 × Stair width × (1+Waste ÷ 100) × Price</code></td></tr><tr><td><strong>Number of steps</strong></td><td><code>Carpet run × 12 ÷ Carpet per step</code></td></tr><tr><td><strong>Riser height</strong></td><td><code>Carpet per step-Tread depth-Nosing</code></td></tr><tr><td><strong>Tread depth</strong></td><td><code>Carpet per step-Riser height-Nosing</code></td></tr><tr><td><strong>Nosing</strong></td><td><code>Carpet per step-Riser height-Tread depth</code></td></tr><tr><td><strong>Stair width</strong></td><td><code>Area ÷ Carpet run</code></td></tr><tr><td><strong>Price</strong></td><td><code>Cost ÷ (Area × (1+Waste ÷ 100))</code></td></tr></tbody></table><p><p>Each step is unrolled into a flat length of riser plus tread plus the nosing that laps the riser. Multiply by the number of steps for the run, then by the stair width for the area, and allow for the pattern match at the top of the flight.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 7 boxes and the page has everything it needs. It reports carpet per step and carpet run and area and cost.</p><ul><li><strong>Number of steps</strong>. Count the treads</li><li><strong>Riser height</strong> — in in. Floor to floor divided by steps</li><li><strong>Tread depth</strong> — in in. Going, without the nosing</li><li><strong>Nosing</strong> — in in. The lip over the riser</li><li><strong>Stair width</strong> — in ft. Wall to wall</li><li><strong>Waste</strong> — in %. Pattern match and cuts</li><li><strong>Price</strong> — in $/ft². Supplied and laid</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Carpet per step</strong> — in in</li><li><strong>Carpet run</strong> — in ft</li><li><strong>Area</strong> — in ft²</li><li><strong>Cost</strong> — in $</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Number of steps = 13, Riser height = 7.5 in, Tread depth = 10 in, Nosing = 1 in, Stair width = 3 ft, Waste = 10 %, Price = 3.5 $/ft² — and the results panel reads:</p><ul><li><strong>Carpet per step</strong> = <code>Riser height+Tread depth+Nosing</code> = <strong>18.5 in</strong></li><li><strong>Carpet run</strong> = <code>Number of steps × (Riser height+Tread depth+Nosing) ÷ 12</code> = <strong>20.042 ft</strong></li><li><strong>Area</strong> = <code>Number of steps × (Riser height+Tread depth+Nosing) ÷ 12 × Stair width</code> = <strong>60.125 ft²</strong></li><li><strong>Cost</strong> = <code>Number of steps × (Riser height+Tread depth+Nosing) ÷ 12 × Stair width × (1+Waste ÷ 100) × Price</code> = <strong>231.481 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>7.5+10+1 = 18.5</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A flight of 13 steps with a 7.5 in riser, a 10 in tread and an inch of nosing needs 18.5 in of carpet per step — 20.042 ft in total, or 60.125 ft² at 3 ft wide. That is 231.481 at $3.50 a square foot.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the run against the staircase: a floor-to-floor height of about eight feet is a run near fifteen feet once the treads are counted. If the run equals the plan length of the stairs, the risers have been left out.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Carpet per step</th><th>Carpet run</th><th>Area</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Number of steps</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Riser height</strong> +10 %</td><td>+4.05 %</td><td>+4.05 %</td><td>+4.05 %</td><td>+4.05 %</td></tr><tr><td><strong>Tread depth</strong> +10 %</td><td>+5.41 %</td><td>+5.41 %</td><td>+5.41 %</td><td>+5.41 %</td></tr><tr><td><strong>Nosing</strong> +10 %</td><td>+0.54 %</td><td>+0.54 %</td><td>+0.54 %</td><td>+0.54 %</td></tr><tr><td><strong>Stair width</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Waste</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0.91 %</td></tr><tr><td><strong>Price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Number of steps</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Nosing</strong>, at 0.5 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Number of steps = 15, Riser height = 7, Tread depth = 11, Nosing = 1.25, Stair width = 3.5, Waste = 15, Price = 4, the page reports <strong>Carpet per step</strong> = 19.25 in, <strong>Carpet run</strong> = 24.062 ft, <strong>Area</strong> = 84.219 ft², <strong>Cost</strong> = 387.406 $. A wider flight with deeper treads: the run grows with every dimension.</li><li>With Number of steps = 4, Riser height = 7.5, Tread depth = 10, Nosing = 1, Stair width = 3, Waste = 5, Price = 3, the page reports <strong>Carpet per step</strong> = 18.5 in, <strong>Carpet run</strong> = 6.167 ft, <strong>Area</strong> = 18.5 ft², <strong>Cost</strong> = 58.275 $. A short porch flight, where the area is small and the waste allowance can be tight.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Floor area measured instead of the run.</strong> The stairwell footprint is half the carpet.</li><li><strong>Nosing counted twice.</strong> It laps the riser, so it adds one lip, not two.</li><li><strong>Landings ignored.</strong> Each landing is a separate rectangle.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Carpet per step (in), Carpet run (ft), Area (ft²), Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Riser, tread and nosing in inches, stair width in feet, the run in feet, area in square feet and cost in dollars per square foot.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need number of steps and riser height and tread depth and nosing and stair width and waste and price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Carpet per step and carpet run and area and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Number of steps</strong> ×10</td><td>18.5</td><td>18.5</td><td>unchanged</td></tr><tr><td><strong>Riser height</strong> ×10</td><td>18.5</td><td>86</td><td>×4.649</td></tr><tr><td><strong>Tread depth</strong> ×10</td><td>18.5</td><td>108.5</td><td>×5.865</td></tr><tr><td><strong>Nosing</strong> ×10</td><td>18.5</td><td>27.5</td><td>×1.486</td></tr><tr><td><strong>Stair width</strong> ×10</td><td>18.5</td><td>18.5</td><td>unchanged</td></tr><tr><td><strong>Waste</strong> ×10</td><td>18.5</td><td>18.5</td><td>unchanged</td></tr><tr><td><strong>Price</strong> ×10</td><td>18.5</td><td>18.5</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A straight flight.</strong> Winders and spirals need a template.</li><li><strong>One price per square foot.</strong> Fitting stairs costs more than fitting a room.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Buying carpet for a staircase.</li></li><li><li>Checking a fitter's run measurement.</li></li><li><li>Estimating a runner.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/carpet">Carpet</a> <a href="/construction/stairs">Stairs</a> <a href="/construction/flooring">Flooring</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Stair carpet calculator work out?', 'a' => <<<'TXT'
            It returns carpet per step and carpet run and area and cost from number of steps and riser height and tread depth and nosing and stair width and waste and price. The relationship is Riser height+Tread depth+Nosing.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Number of steps, Riser height (in), Tread depth (in), Nosing (in), Stair width (ft), Waste (%), Price ($/ft²). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: riser height in in; tread depth in in; nosing in in; stair width in ft; waste in %; price in $/ft². The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much carpet for 13 stairs?', 'a' => 'About 20 ft of run and 60 ft² at 3 ft wide, before waste.'],
            ['q' => 'Do you measure stairs by the tread only?', 'a' => 'No — each step takes the tread plus the riser plus the nosing, roughly twice the tread.'],
        ],
        'related' => [
            ['path' => '/construction/carpet', 'name' => 'Carpet'],
            ['path' => '/construction/stairs', 'name' => 'Stairs'],
            ['path' => '/construction/flooring', 'name' => 'Flooring'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
