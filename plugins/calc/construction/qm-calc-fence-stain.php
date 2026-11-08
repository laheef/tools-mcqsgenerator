<?php

/**
 * Fence stain
 * /construction/fence-stain
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fence stain',
    'meta' => ['title' => 'Fence Stain Calculator: Gallons and Cost Tool', 'description' => 'Work out how much stain a fence needs from its length, height and the number of faces you are coating, with coats, coverage and the cost per gallon. With units.', 'h1' => 'Fence stain', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Fence length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '100',
                    'help' => 'Total run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'height',
                    'label' => 'Fence height',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '6',
                    'help' => 'Above ground',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'faces',
                    'label' => 'Faces to stain',
                    'type' => 'number',
                    'default' => '2',
                    'help' => 'Two for a boundary fence',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'coats',
                    'label' => 'Coats',
                    'type' => 'number',
                    'default' => '2',
                    'help' => 'Two on bare timber',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'coverage',
                    'label' => 'Coverage',
                    'type' => 'number',
                    'suffix' => 'ft²/gal',
                    'default' => '200',
                    'help' => '200 on rough sawn',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'suffix' => '$/gal',
                    'default' => '42',
                    'help' => 'Per gallon',
                    'rounding' => ['omni', '0.0001'],
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
                    'name' => 'gallons',
                    'label' => 'Stain',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'gal',
                ],
                [
                    'name' => 'cans',
                    'label' => 'Cans to buy',
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
            'title' => 'Fence stain',
            'results' => [
                'area_ft2' => 'length*height*faces',
                'gallons' => 'length*height*faces*coats/coverage',
                'cans' => 'ceil(length*height*faces*coats/coverage)',
                'cost' => 'ceil(length*height*faces*coats/coverage)*price',
                'length' => 'area_ft2/(height*faces)',
                'height' => 'area_ft2/(length*faces)',
                'faces' => 'area_ft2/(length*height)',
                'coats' => 'gallons*coverage/area_ft2',
                'coverage' => 'area_ft2*coats/gallons',
                'price' => 'cost/cans',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Area = length × height × faces</strong>, and <strong>gallons = area × coats ÷ coverage</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A hundred feet of six-foot fence is six hundred square feet a side, and a boundary fence has to be done both sides or it looks unfinished from the neighbour's garden. That doubling is the difference between two gallons and four.</p><p>The page reports <strong>area and stain and cans to buy and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Area</strong></td><td><code>Fence length × Fence height × Faces to stain</code></td></tr><tr><td><strong>Stain</strong></td><td><code>Fence length × Fence height × Faces to stain × Coats ÷ Coverage</code></td></tr><tr><td><strong>Cans to buy</strong></td><td><code>ceil(Fence length × Fence height × Faces to stain × Coats ÷ Coverage)</code></td></tr><tr><td><strong>Cost</strong></td><td><code>ceil(Fence length × Fence height × Faces to stain × Coats ÷ Coverage) × Price</code></td></tr><tr><td><strong>Fence length</strong></td><td><code>Area ÷ (Fence height × Faces to stain)</code></td></tr><tr><td><strong>Fence height</strong></td><td><code>Area ÷ (Fence length × Faces to stain)</code></td></tr><tr><td><strong>Faces to stain</strong></td><td><code>Area ÷ (Fence length × Fence height)</code></td></tr><tr><td><strong>Coats</strong></td><td><code>Stain × Coverage ÷ Area</code></td></tr><tr><td><strong>Coverage</strong></td><td><code>Area × Coats ÷ Stain</code></td></tr><tr><td><strong>Price</strong></td><td><code>Cost ÷ Cans to buy</code></td></tr></tbody></table><p><p>Length times height gives one face; the faces box multiplies it. Rough sawn timber takes about 200 ft² a gallon, planed timber nearer 300, so the coverage figure is the one input worth checking against the tin.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs. It reports area and stain and cans to buy and cost.</p><ul><li><strong>Fence length</strong> — in ft. Total run</li><li><strong>Fence height</strong> — in ft. Above ground</li><li><strong>Faces to stain</strong>. Two for a boundary fence</li><li><strong>Coats</strong>. Two on bare timber</li><li><strong>Coverage</strong> — in ft²/gal. 200 on rough sawn</li><li><strong>Price</strong> — in $/gal. Per gallon</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Area</strong> — in ft²</li><li><strong>Stain</strong> — in gal</li><li><strong>Cans to buy</strong></li><li><strong>Cost</strong> — in $</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Fence length = 100 ft, Fence height = 6 ft, Faces to stain = 2, Coats = 2, Coverage = 200 ft²/gal, Price = 42 $/gal — and the results panel reads:</p><ul><li><strong>Area</strong> = <code>Fence length × Fence height × Faces to stain</code> = <strong>1 200 ft²</strong></li><li><strong>Stain</strong> = <code>Fence length × Fence height × Faces to stain × Coats ÷ Coverage</code> = <strong>12 gal</strong></li><li><strong>Cans to buy</strong> = <code>ceil(Fence length × Fence height × Faces to stain × Coats ÷ Coverage)</code> = <strong>12</strong></li><li><strong>Cost</strong> = <code>ceil(Fence length × Fence height × Faces to stain × Coats ÷ Coverage) × Price</code> = <strong>504 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>100 × 6 × 2 = 1 200</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A hundred feet of 6 ft fence stained both sides is 1 200 ft². Two coats at 200 ft² a gallon is 12 gallons — 12 cans and 504.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the gallons against the fence: a hundred feet of six-foot fence takes about three gallons a coat per side. If the total is under two, one face has been counted.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Area</th><th>Stain</th><th>Cans to buy</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Fence length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+16.67 %</td><td>+16.67 %</td></tr><tr><td><strong>Fence height</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+16.67 %</td><td>+16.67 %</td></tr><tr><td><strong>Faces to stain</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+16.67 %</td><td>+16.67 %</td></tr><tr><td><strong>Coats</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+16.67 %</td><td>+16.67 %</td></tr><tr><td><strong>Coverage</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>−8.33 %</td><td>−8.33 %</td></tr><tr><td><strong>Price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Fence length</strong>: a ten per cent move there shifts the result by about 16.7 per cent. The least sensitive is <strong>Coverage</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Fence length = 60, Fence height = 4, Faces to stain = 1, Coats = 1, Coverage = 300, Price = 38, the page reports <strong>Area</strong> = 240 ft², <strong>Stain</strong> = 0.8 gal, <strong>Cans to buy</strong> = 1, <strong>Cost</strong> = 38 $. A low fence with one good side and a single refresher coat.</li><li>With Fence length = 200, Fence height = 6, Faces to stain = 2, Coats = 2, Coverage = 175, Price = 48, the page reports <strong>Area</strong> = 2 400 ft², <strong>Stain</strong> = 27.429 gal, <strong>Cans to buy</strong> = 28, <strong>Cost</strong> = 1 344 $. A long boundary in rough sawn timber: the coverage drops and the order grows.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>One face counted.</strong> A boundary fence is stained both sides.</li><li><strong>Coverage from a smooth-timber tin.</strong> Rough sawn takes a third more.</li><li><strong>Posts and rails left out.</strong> Add ten per cent for the edges and ends.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Area (ft²), Stain (gal), Cans to buy, Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Length and height in feet, faces and coats as counts, area in square feet, coverage in square feet per gallon and cost in dollars.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need fence length and fence height and faces to stain and coats and coverage and price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Area and stain and cans to buy and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Fence length</strong> ×10</td><td>1 200</td><td>12 000</td><td>ten times larger</td></tr><tr><td><strong>Fence height</strong> ×10</td><td>1 200</td><td>12 000</td><td>ten times larger</td></tr><tr><td><strong>Faces to stain</strong> ×10</td><td>1 200</td><td>12 000</td><td>ten times larger</td></tr><tr><td><strong>Coats</strong> ×10</td><td>1 200</td><td>1 200</td><td>unchanged</td></tr><tr><td><strong>Coverage</strong> ×10</td><td>1 200</td><td>1 200</td><td>unchanged</td></tr><tr><td><strong>Price</strong> ×10</td><td>1 200</td><td>1 200</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A flat run.</strong> Slatted and lattice panels have far more surface.</li><li><strong>One product.</strong> Clear and solid stains cover differently.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Buying stain for a fence.</li></li><li><li>Comparing one side with two.</li></li><li><li>Pricing a fence maintenance job.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/fence">Fence</a> <a href="/construction/deck-stain">Deck stain</a> <a href="/construction/paint">Paint</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fence stain calculator work out?', 'a' => <<<'TXT'
            It returns area and stain and cans to buy and cost from fence length and fence height and faces to stain and coats and coverage and price. The relationship is Fence length × Fence height × Faces to stain.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Fence length (ft), Fence height (ft), Faces to stain, Coats, Coverage (ft²/gal), Price ($/gal). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: fence length in ft; fence height in ft; coverage in ft²/gal; price in $/gal. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much stain for 100 feet of 6 ft fence?', 'a' => 'About 3 gallons per face per coat at 200 ft² a gallon.'],
            ['q' => 'Should I stain both sides of a fence?', 'a' => 'Yes — an untreated back face weathers faster and the fence lasts longer when both are sealed.'],
        ],
        'related' => [
            ['path' => '/construction/fence', 'name' => 'Fence'],
            ['path' => '/construction/deck-stain', 'name' => 'Deck stain'],
            ['path' => '/construction/paint', 'name' => 'Paint'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
