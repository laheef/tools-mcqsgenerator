<?php

/**
 * Concrete stairs
 * /construction/concrete-stairs
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Concrete stairs',
    'meta' => ['title' => 'Concrete Stairs Calculator: Steps and Volume', 'description' => 'Work out the concrete a flight of steps takes, from the rise, the tread, the waist slab under it and the landing, in cubic feet, yards and bags. All shown.', 'h1' => 'Concrete stairs', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'steps',
                    'label' => 'Number of steps',
                    'type' => 'number',
                    'default' => '6',
                    'help' => 'Risers in the flight',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rise',
                    'label' => 'Riser height',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '7',
                    'help' => '4 to 7¾ in by code',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'run',
                    'label' => 'Tread depth',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '11',
                    'help' => '10 in minimum, 11 is comfortable',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Stair width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '3.5',
                    'help' => 'Clear width between walls',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'landing',
                    'label' => 'Top landing depth',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '4',
                    'help' => 'Zero for a flight that ends at a door',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waist',
                    'label' => 'Waist slab thickness',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '6',
                    'help' => 'The sloped slab under the steps',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Over-order',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'help' => 'Spillage and an uneven subgrade',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'total_rise',
                    'label' => 'Total rise',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'footprint',
                    'label' => 'Footprint',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'flight_length',
                    'label' => 'Sloped length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'volume_ft3',
                    'label' => 'Concrete volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'volume_yd3',
                    'label' => 'Concrete volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd³',
                ],
                [
                    'name' => 'bags_80lb',
                    'label' => 'Bags of 80 lb',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Concrete stairs',
            'results' => [
                'total_rise' => 'steps*rise',
                'footprint' => 'steps*run/12*width',
                'flight_length' => 'sqrt(pow(steps*run/12,2)+pow(steps*rise/12,2))',
                'volume_ft3' => '(steps*(rise/24)*(run/12)*width+(sqrt(pow(steps*run/12,2)+pow(steps*rise/12,2))+landing)*width*waist/12)*(1+waste/100)',
                'volume_yd3' => 'volume_ft3/27',
                'bags_80lb' => 'ceil(volume_ft3/0.6)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A cast flight is three volumes: the <strong>step wedges</strong>, the <strong>sloped waist slab</strong> under them, and the <strong>landing</strong>. The waist is usually the largest part of the pour and the part most estimates forget.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A stair pour is the one place in domestic concrete work where the geometry is genuinely three-dimensional: every step is a wedge on a sloping slab, and the volume is neither the footprint times a thickness nor a plain box. The waist slab is what carries the flight, and it is usually bigger than all the wedges added together.</p><p>The page reports <strong>total rise and footprint and sloped length and concrete volume (ft³) and concrete volume (yd³) and bags of 80 lb</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Total rise</strong></td><td><code>Number of steps × Riser height</code></td></tr><tr><td><strong>Footprint</strong></td><td><code>Number of steps × Tread depth ÷ 12 × Stair width</code></td></tr><tr><td><strong>Sloped length</strong></td><td><code>√((Number of steps × Tread depth ÷ 12)^2+(Number of steps × Riser height ÷ 12)^2)</code></td></tr><tr><td><strong>Concrete volume (ft³)</strong></td><td><code>(Number of steps × (Riser height ÷ 24) × (Tread depth ÷ 12) × Stair width+(√((Number of steps × Tread depth ÷ 12)^2+(Number of steps × Riser height ÷ 12)^2)+Top landing depth) × Stair width × Waist slab thickness ÷ 12) × (1+Over-order ÷ 100)</code></td></tr><tr><td><strong>Concrete volume (yd³)</strong></td><td><code>Concrete volume (ft³) ÷ 27</code></td></tr><tr><td><strong>Bags of 80 lb</strong></td><td><code>ceil(Concrete volume (ft³) ÷ 0.6)</code></td></tr></tbody></table><p><p>Each step contributes half a riser over its tread — the wedge between the nosing line and the tread — and the riser is converted to feet as the wedges are summed. The waist is a slab of the entered thickness over the sloped length of the flight plus the landing, and that length comes from Pythagoras on the total run and the total rise.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 7 boxes and the page has everything it needs. It reports total rise and footprint and sloped length and concrete volume (ft³) and concrete volume (yd³) and bags of 80 lb.</p><ul><li><strong>Number of steps</strong>. Risers in the flight</li><li><strong>Riser height</strong> — in in. 4 to 7¾ in by code</li><li><strong>Tread depth</strong> — in in. 10 in minimum, 11 is comfortable</li><li><strong>Stair width</strong> — in ft. Clear width between walls</li><li><strong>Top landing depth</strong> — in ft. Zero for a flight that ends at a door</li><li><strong>Waist slab thickness</strong> — in in. The sloped slab under the steps</li><li><strong>Over-order</strong> — in %. Spillage and an uneven subgrade</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Total rise</strong> — in in</li><li><strong>Footprint</strong> — in ft²</li><li><strong>Sloped length</strong> — in ft</li><li><strong>Concrete volume</strong> — in ft³</li><li><strong>Concrete volume</strong> — in yd³</li><li><strong>Bags of 80 lb</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Number of steps = 6, Riser height = 7 in, Tread depth = 11 in, Stair width = 3.5 ft, Top landing depth = 4 ft, Waist slab thickness = 6 in, Over-order = 10 % — and the results panel reads:</p><ul><li><strong>Total rise</strong> = <code>Number of steps × Riser height</code> = <strong>42 in</strong></li><li><strong>Footprint</strong> = <code>Number of steps × Tread depth ÷ 12 × Stair width</code> = <strong>19.25 ft²</strong></li><li><strong>Sloped length</strong> = <code>√((Number of steps × Tread depth ÷ 12)^2+(Number of steps × Riser height ÷ 12)^2)</code> = <strong>6.519 ft</strong></li><li><strong>Concrete volume</strong> = <code>(Number of steps × (Riser height ÷ 24) × (Tread depth ÷ 12) × Stair width+(√((Number of steps × Tread depth ÷ 12)^2+(Number of steps × Riser height ÷ 12)^2)+Top landing depth) × Stair width × Waist slab thickness ÷ 12) × (1+Over-order ÷ 100)</code> = <strong>26.426 ft³</strong></li><li><strong>Concrete volume</strong> = <code>Concrete volume (ft³) ÷ 27</code> = <strong>0.979 yd³</strong></li><li><strong>Bags of 80 lb</strong> = <code>ceil(Concrete volume (ft³) ÷ 0.6)</code> = <strong>45</strong></li></ul><p>With the numbers written into the formula, the first result is <code>6 × 7 = 42</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Six steps of 7 in rise and 11 in tread, 3.5 ft wide, with a 6 in waist and a 4 ft landing: the flight rises 42 in, covers 19.3 ft² and runs 6.52 ft along the slope. The wedges take 5.6 ft³ and the waist and landing 20.8, so the pour is 26.4 ft³ with ten per cent — 0.98 yd³, or 45 bags.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Check the riser against the code: between 4 and 7¾ in, with every riser in the flight equal to within ⅜ in. The tread should be at least 10 in, and one riser plus one tread is usually kept near 17½ in. The waist is a structural decision: 6 in for a garden flight, 8 in where the flight spans or carries a wall.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Total rise</th><th>Footprint</th><th>Sloped length</th><th>Concrete volume</th><th>Concrete volume</th><th>Bags of 80 lb</th></tr></thead><tbody><tr><td><strong>Number of steps</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+7.09 %</td><td>+7.09 %</td><td>+6.67 %</td></tr><tr><td><strong>Riser height</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+2.98 %</td><td>+3.75 %</td><td>+3.75 %</td><td>+2.22 %</td></tr><tr><td><strong>Tread depth</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+7.21 %</td><td>+5.76 %</td><td>+5.76 %</td><td>+4.44 %</td></tr><tr><td><strong>Stair width</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+8.89 %</td></tr><tr><td><strong>Top landing depth</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+2.91 %</td><td>+2.91 %</td><td>+2.22 %</td></tr><tr><td><strong>Waist slab thickness</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+7.66 %</td><td>+7.66 %</td><td>+6.67 %</td></tr><tr><td><strong>Over-order</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0.91 %</td><td>+0.91 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Stair width</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Over-order</strong>, at 0.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Number of steps = 14, Riser height = 7.5, Tread depth = 10, Stair width = 4, Top landing depth = 4, Waist slab thickness = 8, Over-order = 10, the page reports <strong>Total rise</strong> = 105 in, <strong>Footprint</strong> = 46.667 ft², <strong>Sloped length</strong> = 14.583 ft, <strong>Concrete volume</strong> = 70.553 ft³, <strong>Concrete volume</strong> = 2.613 yd³, <strong>Bags of 80 lb</strong> = 118. A full storey: 105 in of rise, 46.7 ft² of footprint and 2.61 yd³ — 118 bags, which is a truck rather than a mixer.</li><li>With Number of steps = 3, Riser height = 6, Tread depth = 12, Stair width = 5, Top landing depth = 0, Waist slab thickness = 6, Over-order = 10, the page reports <strong>Total rise</strong> = 18 in, <strong>Footprint</strong> = 15 ft², <strong>Sloped length</strong> = 3.354 ft, <strong>Concrete volume</strong> = 13.349 ft³, <strong>Concrete volume</strong> = 0.494 yd³, <strong>Bags of 80 lb</strong> = 23. Three entry steps: 18 in of rise, 0.49 yd³ and 23 bags — an easy morning's mixing.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The waist slab forgotten.</strong> The wedges alone are about a fifth of the pour; a flight formed without its waist is a flight with no slab under it.</li><li><strong>Riser and tread swapped.</strong> The rise is vertical and the run horizontal, and swapping them changes both the geometry and the volume.</li><li><strong>Riser heights not equal.</strong> A first riser measured from an uneven slab throws every step out; set out from the finished floor.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Total rise (in), Footprint (ft²), Sloped length (ft), Concrete volume (ft³), Concrete volume (yd³), Bags of 80 lb.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Riser, tread and waist in inches, width and landing in feet, volume in cubic feet and cubic yards, and the bag count in 80 lb bags of premixed concrete at 0.6 ft³ each.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need number of steps and riser height and tread depth and stair width and top landing depth and waist slab thickness and over-order. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Total rise and footprint and sloped length and concrete volume (ft³) and concrete volume (yd³) and bags of 80 lb should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Number of steps</strong> ×10</td><td>42</td><td>420</td><td>ten times larger</td></tr><tr><td><strong>Riser height</strong> ×10</td><td>42</td><td>420</td><td>ten times larger</td></tr><tr><td><strong>Tread depth</strong> ×10</td><td>42</td><td>42</td><td>unchanged</td></tr><tr><td><strong>Stair width</strong> ×10</td><td>42</td><td>42</td><td>unchanged</td></tr><tr><td><strong>Top landing depth</strong> ×10</td><td>42</td><td>42</td><td>unchanged</td></tr><tr><td><strong>Waist slab thickness</strong> ×10</td><td>42</td><td>42</td><td>unchanged</td></tr><tr><td><strong>Over-order</strong> ×10</td><td>42</td><td>42</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A straight flight.</strong> Winder and curved stairs need their own geometry.</li><li><strong>No footing or side walls.</strong> Both are separate pours with their own reinforcement.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering concrete for an entry flight.</li></li><li><li>Sizing a bag mix for a garden stair.</li></li><li><li>Checking a waist thickness against the pour.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/concrete-slab">Concrete slab</a> <a href="/construction/stairs">Stairs</a> <a href="/construction/concrete-weight">Concrete weight</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Concrete stairs calculator work out?', 'a' => <<<'TXT'
            It returns total rise and footprint and sloped length and concrete volume (ft³) and concrete volume (yd³) and bags of 80 lb from number of steps and riser height and tread depth and stair width and top landing depth and waist slab thickness and over-order. The relationship is Number of steps × Riser height.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Number of steps, Riser height (in), Tread depth (in), Stair width (ft), Top landing depth (ft), Waist slab thickness (in), Over-order (%). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: riser height in in; tread depth in in; stair width in ft; top landing depth in ft; waist slab thickness in in; over-order in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How thick should a concrete stair waist be?', 'a' => 'Six inches for a short garden flight, eight where the flight spans or carries a wall.'],
            ['q' => 'How much concrete do three steps take?', 'a' => 'About half a cubic yard with a six-inch waist and no landing — 23 bags of 80 lb mix.'],
        ],
        'related' => [
            ['path' => '/construction/concrete-slab', 'name' => 'Concrete slab'],
            ['path' => '/construction/stairs', 'name' => 'Stairs'],
            ['path' => '/construction/concrete-weight', 'name' => 'Concrete weight'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
